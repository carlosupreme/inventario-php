<?php

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Builder::macro('matching', function ($value, ...$fields) {
            if (!$value || !count($fields)) {
                return $this;
            }

            foreach ($fields as $field) {
                $this->orWhere($field, 'like', '%' . $value . '%');
            }
        });

        Builder::macro('matchingStrict', function ($value, ...$fields) {
            foreach ($fields as $field) {
                $this->where($field, 'like', '%' . $value . '%');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
