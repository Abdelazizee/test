<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles', 'country', 'city'])->get());
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

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles', 'country', 'city']));
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

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
