<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    use HasFactory;
    protected $fillable = ['nomdeposeur','moto_model', 'color','num_plaque', 'description'];
    

}
