<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    public $table = "data";
    //Untuk mematikan kolom updated_at atau created_at
    public $timestamps = false;
    protected $fillable = ['name', 'productname', 'country'];
}
