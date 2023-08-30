<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
     use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const PERMISSION_CATEGORY_CREATE = 'category create';
    const PERMISSION_CATEGORY_UPDATE = 'category edit';
    const PERMISSION_CATEGORY_DELETE = 'category delete';


    const PERMISSION_BLOCK_CREATE = 'block create';
    const PERMISSION_BLOCK_UPDATE = 'block edit';
    const PERMISSION_BLOCK_DELETE = 'block delete';

    const PERMISSION_POSITION_CREATE = 'position create';
    const PERMISSION_POSITION_UPDATE = 'position edit';
    const PERMISSION_POSITION_DELETE = 'position delete';

    const PERMISSION_USER_LIST = 'user list';
    const PERMISSION_USER_SHOW = 'user show';
    const PERMISSION_USER_CREATE = 'user create';
    const PERMISSION_USER_UPDATE = 'user edit';
    const PERMISSION_USER_DELETE = 'user delete';

    const PERMISSION_ROLE_LIST = 'role list';
    const PERMISSION_ROLE_SHOW = 'role show';
    const PERMISSION_ROLE_CREATE = 'role create';
    const PERMISSION_ROLE_UPDATE = 'role edit';
    const PERMISSION_ROLE_DELETE = 'role delete';

    const PERMISSION_TAG_CREATE = 'tag create';
    const PERMISSION_TAG_UPDATE = 'tag edit';
    const PERMISSION_TAG_DELETE = 'tag delete';

    const PERMISSION_POST_LIST = 'post list';
    const PERMISSION_POST_CREATE = 'post create';
    const PERMISSION_POST_UPDATE = 'post edit';
    const PERMISSION_POST_DELETE = 'post delete';

    const PERMISSION_SERVICE_LIST = 'service list';
    const PERMISSION_SERVICE_CREATE = 'service create';
    const PERMISSION_SERVICE_UPDATE = 'service edit';
    const PERMISSION_SERVICE_DELETE = 'service delete';

    const PERMISSION_PROJECT_LIST = 'project list';
    const PERMISSION_PROJECT_CREATE = 'project create';
    const PERMISSION_PROJECT_UPDATE = 'project edit';
    const PERMISSION_PROJECT_DELETE = 'project delete';

    const PERMISSION_COMMENT_CREATE = 'comment create';
    const PERMISSION_COMMENT_UPDATE = 'comment edit';
    const PERMISSION_COMMENT_DELETE = 'comment delete';

    const PERMISSION_ATTACHMENT_DELETE = 'attachment delete';

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
     * User roles
     */
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function findByEmail(string $email): User
    {
        return self::where('email', $email)->firstOrFail();
    }
}
