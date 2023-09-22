<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation_produit',
        'description_produit',
        'prix',
        'categorie_id',
        'disponibilite',
        'image',
    ];    
}
