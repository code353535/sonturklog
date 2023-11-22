<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bot extends Model
{
    use HasFactory;
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }
    public function feed(): BelongsTo
    {
        return $this->belongsTo(Feed::class, 'id');
    }
    public function category(): HasOne
    {
        return $this->HasOne(Category::class,'id','kategori');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $table='bot';
    protected $fillable = [
        'site_id',
        'user_id',
        'kategori',
        'anakategori',
        'aciklama',
        'url',
        'baslik',
        'image',
    ];

}
