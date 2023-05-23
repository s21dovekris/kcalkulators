<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProduktKategorijaEnum;
use App\Enums\ProduktMervienibaEnum;
use App\Enums\ProduktAlergijaEnum;
use App\Models\Recepte;



class Produkt extends Model
{
    use HasFactory;

    protected $table = 'produkts';

    public function receptes()
    {
        return $this->belongsToMany(Recepte::class)
                    ->withPivot('svars')
                    ->withTimestamps();
    }

    protected $fillable = [
        'nosaukums', 'mervieniba', 'kaloritate', 'kategorija', 'vegan', 'alergija'
    ];


    protected $casts = [
        'mervieniba' => ProduktMervienibaEnum::class,
        'kategorija' => ProduktKategorijaEnum::class,
        'alergija' => ProduktAlergijaEnum::class,
    ];
}
