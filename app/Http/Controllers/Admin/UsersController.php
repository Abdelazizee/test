<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles', 'country', 'city', 'media'])->get();

        $roles = Role::get();

        $countries = Country::get();

        $cities = City::get();

        return view('admin.users.index', compact('users', 'roles', 'countries', 'cities'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('roles', 'countries', 'cities'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('company_logo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('company_logo'))))->toMediaCollection('company_logo');
        }

        if ($request->input('image', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('tax_card', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('tax_card'))))->toMediaCollection('tax_card');
        }

        if ($request->input('sailing_permit', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('sailing_permit'))))->toMediaCollection('sailing_permit');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'country', 'city');

        return view('admin.users.edit', compact('roles', 'countries', 'cities', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('company_logo', false)) {
            if (!$user->company_logo || $request->input('company_logo') !== $user->company_logo->file_name) {
                if ($user->company_logo) {
                    $user->company_logo->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('company_logo'))))->toMediaCollection('company_logo');
            }
        } elseif ($user->company_logo) {
            $user->company_logo->delete();
        }

        if ($request->input('image', false)) {
            if (!$user->image || $request->input('image') !== $user->image->file_name) {
                if ($user->image) {
                    $user->image->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($user->image) {
            $user->image->delete();
        }

        if ($request->input('tax_card', false)) {
            if (!$user->tax_card || $request->input('tax_card') !== $user->tax_card->file_name) {
                if ($user->tax_card) {
                    $user->tax_card->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('tax_card'))))->toMediaCollection('tax_card');
            }
        } elseif ($user->tax_card) {
            $user->tax_card->delete();
        }

        if ($request->input('sailing_permit', false)) {
            if (!$user->sailing_permit || $request->input('sailing_permit') !== $user->sailing_permit->file_name) {
                if ($user->sailing_permit) {
                    $user->sailing_permit->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('sailing_permit'))))->toMediaCollection('sailing_permit');
            }
        } elseif ($user->sailing_permit) {
            $user->sailing_permit->delete();
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'country', 'city');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
