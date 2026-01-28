<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'logo' => 'required|image|max:1024',
        ]);

        $data['logo'] = $request->file('logo')
            ->store('clients', 'public');

        Client::create($data);

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client berhasil ditambahkan');
    }

    public function edit(Client $home_client)
    {
        return view('admin.clients.edit', [
            'client' => $home_client
        ]);
    }

    public function update(Request $request, Client $home_client)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'logo' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('clients', 'public');
        }

        $home_client->update($data);

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client berhasil diupdate');
    }

    public function destroy(Client $home_client)
    {
        $home_client->delete();
        return back()->with('success', 'Client dihapus');
    }
}
