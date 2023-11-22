<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Anacategory extends Model
{
    use HasFactory;

    public function category(): HasOne
    {
        return $this->HasOne(Category::class,'anacategory_id');
    }

    protected $table='anacategory';
    protected $fillable = [
        'ad',
        'slug',
        'aciklama',

    ];
}
