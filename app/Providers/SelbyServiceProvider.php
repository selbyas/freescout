<?php

namespace App\Providers;

use App\Customer;
use App\User;
use Config;
use Eventy;
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

        /** @noinspection PhpUndefinedMethodInspection */
        Eventy::addFilter('footer.text', function() {
            return  '<a href="https://selby.no">'
                    . '<img src="https://cdn.selby.as/brand/selby-logo-icon-180x180.png" width="64" alt="Selby Logo Icon"><br>'
                    . Config::get('app.name')
                    . '</a>';
        });

        /** @noinspection PhpUndefinedMethodInspection */
        Eventy::addFilter('login.banner', function() {
            return 'https://cdn.selby.as/brand/selby-logo-banner-320x89.png';
        });
    }

    public function register()
    {

    }
}
