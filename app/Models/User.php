<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles; // use Role

use BasementChat\Basement\Contracts\User as BasementUserContract; // chat
use BasementChat\Basement\Traits\HasPrivateMessages;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements BasementUserContract
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles; // role
    use HasPrivateMessages; // chat

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }


    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class);
    }
    public function tarks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function getNameAttribute(): string
    {
        return str($this->attributes['name'])->explode(' ')->last() . '  ' . str($this->getRoleNames()[0]);
    }

    public function getName() {
        return $this->name;
    }
}
