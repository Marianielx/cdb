<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class vehicleGallery extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'vehicle_galleries';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function vehicle_data()
    {
        return $this->belongsTo(vehicle::class, 'fk_idvehicle');
    }
}
