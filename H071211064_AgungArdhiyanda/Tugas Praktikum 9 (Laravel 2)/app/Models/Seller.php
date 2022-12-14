<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable=["nama", "gender", "address", "no_hp", "status"];
    use HasFactory;
}
