<?php

namespace App\Actions\Chats;

use App\Models\User;
use BasementChat\Basement\Actions\AllContacts as BasementAllContactsAction;
use BasementChat\Basement\Data\ContactData;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class AllContacts extends BasementAllContactsAction
{
    /**
     * Extend and override the default method for getting all contacts.
     * Only users with the administrator role will appear in the contact list.
     */
    public function all(Authenticatable $user): Collection
    {


        if ($user->hasRole('sale')) {
            /** @var EloquentCollection<int,User> $contacts */
            $contacts = User::addSelectLastPrivateMessageId($user)
                ->addSelectUnreadMessages($user)
                ->whereHas('roles', function (EloquentBuilder $query): void {
                    $query->where('name', ['user', 'admin', 'sale', 'technician']);
                })

                ->get();
        } elseif ($user->hasRole('user')) {
            $contacts = User::addSelectLastPrivateMessageId($user)
                ->addSelectUnreadMessages($user)
                ->whereHas('roles', function (EloquentBuilder $query): void {
                    $query->where('name', 'sale');
                })
                ->get();
        } elseif ($user->hasRole('admin')) {
            $contacts = User::addSelectLastPrivateMessageId($user)
                ->addSelectUnreadMessages($user)
                ->whereHas('roles', function (EloquentBuilder $query): void {
                    $query->where('name', ['admin', 'sale', 'technician', 'user']);
                })

                ->get();
        } elseif ($user->hasRole('technician')) {
            $contacts = User::addSelectLastPrivateMessageId($user)
                ->addSelectUnreadMessages($user)
                ->whereHas('roles', function (EloquentBuilder $query): void {
                    $query->where('name', ['admin', 'technician',  'sale']);
                })

                ->get();
        }



        $contacts->append('avatar');
        $contacts->load('lastPrivateMessage');

        return $contacts
            ->sortByDesc('lastPrivateMessage.id')
            ->values()
            ->map(fn (Authenticatable $contact): ContactData => $this->convertToContactData($contact));
    }
}
