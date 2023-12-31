<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function images(){

        return $this->hasMany(CustomerBanner::class, 'fk_customId');
    }
}
