<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    public function anacategory(): BelongsTo
    {
        return $this->belongsTo(Anacategory::class, 'anacategory_id' ,'id');
    }

    protected $table='category';
    protected $fillable = [
        'ad',
        'slug',
        'aciklama',
        'anacategory_id',
    ];
}
