<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user && $user->is_admin) {
            $redirectTo = '/admin/dashboard'; // Change this to your admin panel route
        } else {
            $redirectTo = config('fortify.home', '/dashboard');
        }

        return $request->wantsJson()
            ? new JsonResponse('', 204)
            : redirect()->intended($redirectTo);
    }
}
