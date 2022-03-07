<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Automovil extends Model
{
    use HasFactory;
    protected $fillable = ['placa', 'marca', 'color', 'observaciones'];
    protected $table = 'automovil';
    

}
