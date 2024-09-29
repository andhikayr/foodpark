<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (User $user, string $token) {
            $userAdmin = User::where('role', 'admin')->where('email', $user->email)->first();
            $userNormal = User::where('role', 'user')->where('email', $user->email)->first();

            if ($userAdmin) {
                return 'http://127.0.0.1:8000/admin/reset-password/'.$token.'?email='.$userAdmin->email;
            } else if ($userNormal) {
                return 'http://127.0.0.1:8000/reset-password/'.$token.'?email='.$userNormal->email;
            }
        });
    }
}
