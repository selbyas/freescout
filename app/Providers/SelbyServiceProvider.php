<?php

namespace App\Providers;

use App\Customer;
use App\User;
use Illuminate\Support\ServiceProvider;
use function blank;
use function data_get;
use function data_set;

class SelbyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        User::retrieved(function (User $user) {
            if(blank(data_get($user, 'photo_url'))) {
                data_set($user, 'photo_url', $user->getGravatarPhoto());
            }
        });

        Customer::retrieved(function (Customer $customer) {
            if(blank(data_get($customer, 'photo_url'))) {
                data_set($customer, 'photo_url', $customer->getGravatarPhoto());
            }
        });
    }

    public function register()
    {

    }
}
