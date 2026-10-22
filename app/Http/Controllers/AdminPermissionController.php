<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class AdminPermissionController extends Controller
{
    // Tampilkan daftar semua pengajuan izin untuk Guru/Admin
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('admin.permission', compact('permissions'));
    }

    // Update status (approved / rejected)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }
}