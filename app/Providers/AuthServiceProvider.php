<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    //     // アクセストークンの制限時間を15日に設定している
    //    Passport::tokensExpireIn(Carbon::now()->addDays(15));

    // //    // リフレッシュトークンの制限時間を30日に設定している
    //    Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

    // //     Passport::tokensExpireIn(Carbon::now()->addHours(2));
    // // Passport::refreshTokensExpireIn(Carbon::now()->addHours(3));
    Passport::personalAccessTokensExpireIn(now()->addHour(2));
    }
}
