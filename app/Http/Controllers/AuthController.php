<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        // Account not found
        if (!$user) {
            return back()->with('toast', [
                'type' => 'error',
                'message' => 'Account not found',
            ]);
        }

        // Invalid password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('toast', [
                'type' => 'error',
                'message' => 'Invalid data. Please check your username and password!',
            ]);
        }

        // Login success
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect based on role
        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'supplier' => redirect()->route('supplier.dashboard'),
            'customer' => redirect()->route('customer.dashboard'),
            default => redirect('/'),
        };
    }

    /**
     * Handle registration request (Customer only).
     */
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:25',
            'username' => 'required|string|max:25|regex:/^[a-zA-Z0-9_]{3,25}$/',
            'email' => 'required|email|max:30',
            'address' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        // Check if username already exists
        if (User::where('username', $request->username)->exists()) {
            return back()->with('toast', [
                'type' => 'info',
                'message' => 'Account already exists',
            ]);
        }

        // Check if email already exists
        if (User::where('email', $request->email)->exists()) {
            return back()->with('toast', [
                'type' => 'info',
                'message' => 'Account already exists',
            ]);
        }

        // Create account in m_data_akun
        $user = User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
<<<<<<< HEAD
            'address' => $request->address,
=======
>>>>>>> 612bddbaa9f4a18412e012a7b92ffa32e7ddd4b6
            'password' => $request->password,
            'role' => 'customer',
        ]);

        // Create entry in m_data_customer
        DataCustomer::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'akun_id' => $user->id,
        ]);

        return redirect('/')->with('toast', [
            'type' => 'success',
            'message' => 'Data saved. Account created successfully!',
        ])->with('show_login', true);
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
