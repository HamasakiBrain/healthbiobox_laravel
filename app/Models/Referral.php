<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Referral extends Model
{
    use HasFactory;
    protected $table = 'user_users';

    public function owner() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
