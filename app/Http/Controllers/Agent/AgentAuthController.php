<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AgentAuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->guard('agent')->check()) {
            return redirect()->route('agent.dashboard');
        }
        return view('agent.login');
    }

    /**
     * Handle agent login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the agent
        if (Auth::guard('agent')->attempt($credentials)) {
            // Authentication successful, redirect to the agent dashboard
            $agent = Auth::guard('agent')->user();

           
            session(['agent' => $agent]);
            return redirect()->route('agent.dashboard');
            
        }

        // Authentication failed, redirect back with errors
        return redirect()->back()->withInput()->withErrors(['login' => 'Invalid credentials, Kindly Check Your Username & Password, Password is Case Sensitive']);
    }

    /**
     * Logout the authenticated agent.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('agent')->logout();

        return redirect()->route('agent.login');
    }

    /**
     * Show the agent dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $agent = session('agent');

        if (!$agent) {
            
            return redirect()->back()->withInput()->withErrors(['login' => 'Session Expired Kindly Re-login']);
        }
    
        return view('agent.dashboard', compact('agent'));
       
    }
}
