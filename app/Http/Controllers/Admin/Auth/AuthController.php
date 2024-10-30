<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AdminLoginRequest;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View|RedirectResponse
    {
        // dd('here');/
        if(Auth::guard('admin')->check()) {
            return redirect()->back();
        }

        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        // dd($request->all());

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard.index', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}
