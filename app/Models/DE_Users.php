<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DE_Users extends Model
{
    use HasFactory;

    public $table='de_users';

    protected $fillable = [
       'name',
       'email'
    ];



}
