<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class vehicle extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'vehicles';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function images()
    {
        return $this->hasMany(vehicleGallery::class, 'fk_idvehicle');
    }
}
