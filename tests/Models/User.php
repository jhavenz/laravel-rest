<?php

namespace Sourcefli\LaravelRest\Tests\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use Authenticatable
        , HasFactory;

    const ID = 'id';
    const EMAIL = 'email';
    const TABLE = 'users';
    const USERNAME = 'username';

    protected $table = self::TABLE;

    public function posts(): HasMany
    {
        return $this->hasMany(
            Post::class,
            Post::FK_USER,
            self::ID
        );
    }

    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(
            Comment::class,
            Comment::TABLE,
            Comment::FK_USER,
            self::ID
        );
    }
}
