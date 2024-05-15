<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements LocalizedUrlRoutable
{
    use HasFactory, HasTranslations, HasTranslatableSlug;

    protected static $unguarded = false;

    public $fillable = ['name', 'slug',];

    public array $translatable = ['name', 'slug',];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::createWithLocales(['uk', 'en', 'ru'])
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->getTranslation('slug', $locale);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return static::findBySlug($value) ?? abort(404);
    }
}
