<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $fillable=['titulo', 'contenido'];
    public function comentarios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comentario::class);
    }
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
