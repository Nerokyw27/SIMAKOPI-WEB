<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('admin.profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'full_name' => 'required|string|max:25',
            'username' => 'required|string|max:25|unique:m_data_akun,username,' . $user->id,
            'email' => 'required|email|max:30|unique:m_data_akun,email,' . $user->id,
            'phone_number' => 'nullable|string|max:13',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['full_name', 'username', 'email', 'phone_number']);

        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $data['password'] = $request->password;
        }

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $data['profile_picture'] = $path;
        }

        $user->update($data);

        return redirect()->route('admin.profile.show')->with('toast', [
            'type' => 'success',
            'message' => 'Changes saved successfully',
        ]);
    }
}
