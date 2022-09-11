<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = 'posts';
    protected $fillable = ['categories_id', 'title', 'slug', 'content', 'is_published'];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function categories(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function authors(): belongsTo
    {
        return $this->belongsTo(Author::class);
    }


}
