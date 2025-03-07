<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class UserAccessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('userAccess', function () {
            return function ($access_code = null, $user_id = null) {
                if ($user_id) {
                    $role_id = DB::table('users')->where('id', $user_id)->value('role');
                } else {
                    $role_id = auth()->user()->role;
                }
                
                $query = DB::table('user_access')->whereRaw("FIND_IN_SET(?, user_types)", [$role_id]);

                if ($access_code) {
                    $query = $query->where('code', $access_code);
                }

                return $query->pluck('code')->toArray();
            };
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
