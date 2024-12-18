<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PharmacyStaff;
use Illuminate\Support\Facades\Hash;

class PharmacyStaffAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.staff.login');
    }

    public function login(Request $request)
    {
        $validData = $request->validate([
            'password' => 'required|min:6',
            'email' => 'required|email|exists:pharmacy_staff,email',
        ]);
        $attempt = Auth::guard('pharmacy_staff')->attempt([
            'email' => $validData['email'],
            'password' => $validData['password'],
        ]);



        if ($attempt) {
            $request->session()->regenerate();
            Auth::guard('pharmacy_staff')->user();
            return redirect()->route('home');
        } else {
            return back()->withErrors(['error' => 'Invalid credentials.']);
        }
    }

    public function showRegisterForm()
    {
        return view('auth.staff.register');
    }



    public function register(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'Fname' => 'required|string|max:255',
            'Lname' => 'required|string|max:255',
            'email' => 'required|email|unique:pharmacy_staff,email',
            'Phone' => 'required|string',
            'address' => 'required|string|nullable',
            'password' => 'required|min:6|confirmed',
        ]);

        // Combine Fname and Lname into one 'name' field for the PharmacyStaff model
        $validatedData['name'] = $validatedData['Fname'] . ' ' . $validatedData['Lname'];

        // Hash the password before saving
        $validatedData['password'] = Hash::make($request->password);

        // Create the new PharmacyStaff record
        PharmacyStaff::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['Phone'],
            'email' => $validatedData['email'],
            'address'=>$validatedData['address'],
            'password' => $validatedData['password'],
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('staff.login')->with('success', 'Account created successfully.');
    }



    public function logout(Request $request)
    {
        // Destroy the session
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token to avoid session fixation attacks

        // Log the user out
        Auth::guard('pharmacy_staff')->logout();

        // Redirect to the login page
        return redirect()->route('staff.login');
    }
}
