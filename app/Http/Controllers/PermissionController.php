<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        // Ambil semua data izin dari DB, urutkan dari yang terbaru
        $permissions = Permission::latest()->get();

        return view('permission', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'       => 'required',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
            'reason'     => 'required|string',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('permissions', 'public');
        }

        Permission::create([
            'type'       => $request->type,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'reason'     => $request->reason,
            'image'      => $imagePath,
            'status'     => 'pending',
        ]);

        return back()->with('success', 'Pengajuan izin berhasil dikirim!');
    }
}