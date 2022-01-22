<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $table = "ciudades";
    protected $guarded=['id'];

    public function clietes(){
        return $this->hasMany(Cliente::class);
    }

    public function repartidores(){
        return $this->hasMany(Repartidor::class);
    }

    public function envios(){
        return $this->hasMany(Envio::class);
    }
}
