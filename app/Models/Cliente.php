<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $guarded=['id'];

    public function envios(){
        return $this->hasMany(Envio::class);
    }

    protected $casts = [
        'f_nacimiento' => 'datetime:Y-m-d',
    ];
}
