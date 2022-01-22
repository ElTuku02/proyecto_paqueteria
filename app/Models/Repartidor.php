<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repartidor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $table = "repartidores";
    protected $guarded=['id'];

    public function clietes(){
        return $this->hasMany(Cliente::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }

    public function envios(){
        return $this->hasMany(Envio::class);
    }
    
}
