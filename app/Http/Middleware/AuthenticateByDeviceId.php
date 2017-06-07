<?php

namespace App\Http\Middleware;

use App\Language;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthenticateByDeviceId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($device_id = $request->header('device_id')) {
            $language = Language::where('abbreviation', 'en')->first();
            $user = User::firstOrCreate(['device_id' => $device_id],
                [
                    'name' => $device_id,
                    'email' => $device_id . '@example.com',
                    'password' => 'password',
                    'device_id' => $device_id,
                    'role_id' => 2,
                    'language_id' => $language->id
                ]
            );
            $user = User::findOrFail($user->id);
            Auth::login($user);
        } else {
            throw new BadRequestHttpException('you should send "device-id" in your request headers');
        }
        return $next($request);
    }

}
