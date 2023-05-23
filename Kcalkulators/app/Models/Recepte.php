<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produkt;

class Recepte extends Model
{
    protected $table = 'receptes';

    protected $fillable = ['nosaukums', 'apraksts'];

    public function produkts()
    {
    return $this->belongsToMany(Produkt::class, 'recepte_produkts', 'recepte_id', 'produkt_id')->withPivot('svars');
    }
}
