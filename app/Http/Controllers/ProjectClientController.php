<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\ProjectClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = ProjectClient::orderByDesc('id')->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('avatar') && $request->hasFile('logo')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $logoPath = $request->file('logo')->store('logos', 'public');

                $validated['avatar'] = $avatarPath;
                $validated['logo'] = $logoPath;
            }

            $newRecordData = ProjectClient::create($validated);
        });

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectClient $projectClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectClient $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, ProjectClient $client)
    {
        DB::transaction(function () use ($request, $client) {
            $validated = $request->validated();

            if ($request->hasFile('avatar') && $request->hasFile('logo')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $logoPath = $request->file('logo')->store('logos', 'public');

                $validated['avatar'] = $avatarPath;
                $validated['logo'] = $logoPath;
            }

            $client->update($validated);
        });

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectClient $client)
    {
        DB::transaction(function() use ($client) {
            $client->delete();
        });

        return redirect()->route('admin.clients.index');
    }
}
