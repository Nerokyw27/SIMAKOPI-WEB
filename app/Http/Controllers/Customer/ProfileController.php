<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('customer.profile.show', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('customer.profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'full_name' => 'required|string|max:25',
            'username' => 'required|string|max:25|unique:m_data_akun,username,' . $user->id,
            'email' => 'required|email|max:30|unique:m_data_akun,email,' . $user->id,
<<<<<<< HEAD
            'address' => 'nullable|string|max:100',
=======
>>>>>>> 612bddbaa9f4a18412e012a7b92ffa32e7ddd4b6
            'district' => 'nullable|string|max:30',
            'city' => 'nullable|string|max:30',
            'province' => 'nullable|string|max:30',
            'country' => 'nullable|string|max:30',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

<<<<<<< HEAD
        $data = $request->only(['full_name', 'username', 'email', 'address', 'district', 'city', 'province', 'country']);
=======
        $data = $request->only(['full_name', 'username', 'email', 'district', 'city', 'province', 'country']);
>>>>>>> 612bddbaa9f4a18412e012a7b92ffa32e7ddd4b6

        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $data['password'] = $request->password;
        }

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $data['profile_picture'] = $path;
        }

        $user->update($data);

        return redirect()->route('customer.profile.show')->with('toast', [
            'type' => 'success',
            'message' => 'Changes saved successfully',
        ]);
    }
}
