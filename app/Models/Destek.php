<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destek extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $table='destek';
    protected $fillable = [
        'dkategori',
        'dbaslik',
        'dmesaj',
        'dstatus',
        'user_id',
        'dcevap',
    ];
}
