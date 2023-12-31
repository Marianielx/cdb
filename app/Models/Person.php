<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Person extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'people';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
}
