<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContJur extends Model
{
    use HasFactory;
    protected $table='pmjucont';
    public $timestamps=false;
}
