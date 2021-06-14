<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risposta extends Model
{
    use HasFactory;
    protected $table = 'risposta';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
