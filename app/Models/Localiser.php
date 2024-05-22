<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localiser extends Model
{
    use HasFactory;
    protected $fillable = ['chasis','longitude', 'latitude'];
}
