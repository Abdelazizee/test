<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserbankRequest;
use App\Http\Requests\StoreUserbankRequest;
use App\Http\Requests\UpdateUserbankRequest;
use App\Models\Userbank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserbanksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('userbank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userbanks = Userbank::all();

        return view('admin.userbanks.index', compact('userbanks'));
    }

    public function create()
    {
        abort_if(Gate::denies('userbank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userbanks.create');
    }

    public function store(StoreUserbankRequest $request)
    {
        $userbank = Userbank::create($request->all());

        return redirect()->route('admin.userbanks.index');
    }

    public function edit(Userbank $userbank)
    {
        abort_if(Gate::denies('userbank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userbanks.edit', compact('userbank'));
    }

    public function update(UpdateUserbankRequest $request, Userbank $userbank)
    {
        $userbank->update($request->all());

        return redirect()->route('admin.userbanks.index');
    }

    public function show(Userbank $userbank)
    {
        abort_if(Gate::denies('userbank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userbanks.show', compact('userbank'));
    }

    public function destroy(Userbank $userbank)
    {
        abort_if(Gate::denies('userbank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userbank->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserbankRequest $request)
    {
        Userbank::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
