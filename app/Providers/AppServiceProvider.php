<?php

namespace App\Providers;

use App\Models\Support;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Hekmatinasser\Verta\Verta;

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
        $support_count = Support::where('visited','=',0)->get();
        View::share(['support_count'=>$support_count]);
    }
}
