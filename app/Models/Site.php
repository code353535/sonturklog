<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Site extends Model
{
    use HasFactory;

    public function feed(): HasOne
    {
        return $this->hasOne(Feed::class,'site_id');
    }
    public function bot(): HasOne
    {
        return $this->HasOne(Bot::class, 'site_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function anacategory(): HasOne
    {
        return $this->HasOne(Anacategory::class,'id','anakategori');
    }

    protected $table='site';
    protected $fillable = [
        'ad',
        'url',
        'user_id',
        'kategori',
        'anakategori',
        'aciklama',
        'logo',
        'sahip',
        'durum',
        'yayin',
        'rednedeni',
    ];
}
