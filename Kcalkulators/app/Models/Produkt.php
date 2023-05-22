<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProduktKategorijaEnum;
use App\Enums\ProduktMervienibaEnum;
use App\Enums\ProduktAlergijaEnum;



class Produkt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nosaukums', 'mervieniba', 'kaloritate', 'kategorija', 'vegan', 'alergija'
    ];


    protected $casts = [
        'mervieniba' => ProduktMervienibaEnum::class,
        'kategorija' => ProduktKategorijaEnum::class,
        'alergija' => ProduktAlergijaEnum::class,
    ];
}
