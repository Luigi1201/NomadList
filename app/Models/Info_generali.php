<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_generali extends Model
{
    use HasFactory;
    protected $table = 'info_generali';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
