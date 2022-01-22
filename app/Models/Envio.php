<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Envio extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $table = "envios";
    protected $guarded=['id'];

    public function cliete(){
        return $this->belongsTo(Cliente::class);
    }

    public function repartidor(){
        return $this->belongsTo(Repartidor::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
