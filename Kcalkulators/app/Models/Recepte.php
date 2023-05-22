<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepte extends Model
{
    protected $table = 'receptes';

    public function recepteProdukts()
    {
        return $this->hasMany(RecepteProdukts::class, 'recepte_id');
    }
}
