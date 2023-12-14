<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomersBannersPlan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customers_banners_plans';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
}
