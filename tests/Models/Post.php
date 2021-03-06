<?php

namespace Sourcefli\LaravelRest\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    const ID = 'id';
    const CONTENT = 'content';
    const FK_USER = 'user_id';
    const TABLE = 'posts';
    const TITLE = 'title';
    const SLUG = 'slug';

    protected $table = self::TABLE;

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            self::FK_USER,
            User::ID
        );
    }

    public function comments(): BelongsToMany
    {
        return $this->belongsToMany(
            Comment::class,
            Comment::TABLE,
            Comment::FK_POST,
            self::ID
        );
    }
}
