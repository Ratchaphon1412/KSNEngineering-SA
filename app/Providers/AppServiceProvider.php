<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\Chats\AllContacts;
use App\Actions\Chats\SendPrivateMessage;
use BasementChat\Basement\Basement;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // Override the default action with your customized AllContacts action.

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Basement::allContactsUsing(AllContacts::class);
        Basement::sendPrivateMessagesUsing(SendPrivateMessage::class);
    }
}
