<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class CustomerBanner extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customers_banners';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
}
