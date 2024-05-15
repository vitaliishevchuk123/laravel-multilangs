<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements LocalizedUrlRoutable
{
    use HasFactory, HasTranslations, HasTranslatableSlug;

    protected static $unguarded = false;

    public $fillable = ['name', 'slug', 'category_id'];

    public array $translatable = ['name', 'slug',];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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
