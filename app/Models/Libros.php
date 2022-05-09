<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    protected $fillable=['nombre','resumen','noPaginas','edicion','autor','precio'];
    public $timestamps = false;
}
