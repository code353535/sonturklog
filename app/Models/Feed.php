<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Feed extends Model
{
    use HasFactory;

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'id');
    }
    public function bot(): HasOne
    {
        return $this->HasOne(Bot::class,'feed_id');
    }
    public function category(): HasOne
    {
        return $this->HasOne(Category::class,'id','kategori');
    }

    protected $table='feed';
    protected $fillable = [
        'site_id',
        'kategori',
        'anakategori',
        'katlink',
        'user_id',
    ];
}

