<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data;
use Carbon\Carbon;

class DataLifecycleProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Data::creating(function (Data $data) {
            if (!$data->expires_at) {
                $data->expires_at = Carbon::now()->addDays(48);
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
