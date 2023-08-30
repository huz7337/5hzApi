<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'content', 'active'
    ];

    protected $translatable = [
        'name', 'description', 'content'
    ];

    /**
     * Find user by email or return an error
     * @param string $slug
     * @return Service
     * @throws ModelNotFoundException
     */
    public static function findBySlug(string $slug): Service
    {
        $service = self::whereHas('meta', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        return $service;
    }

    /**
     * Get post meta.
     */
    public function meta(): MorphOne
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

    /**
     * Get attachment
     */
    public function attachment(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}
