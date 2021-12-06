<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'delivery',
        'balance',
        'referral_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsToMany
     */
    public function role(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id')
            ->withPivot('id')->withTimestamps();
    }

    /**
     * @return BelongsTo|BelongsToMany
     */
    public function referral()
    {
        return $this->belongsToMany(User::class, 'user_users', 'referral_id', 'user_id')
            ->withPivot('id')->withTimestamps();

    }
    public function owner() {
        return $this->hasOne(Referral::class, 'user_id', 'id');
    }

    /**
     * @param array $roles
     * @return bool
     */
    public function hasPermission(array $roles): bool
    {
        $r = [];
        foreach ($this->role as $role) {
            array_push($r, $role->name);
        }
        return count(array_intersect($r, $roles)) > 0;
    }
}
