<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depenses extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
}
