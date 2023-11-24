<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class CustomerContact extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customer_contacts';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
}
