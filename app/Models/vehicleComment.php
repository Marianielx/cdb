<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class VehicleComment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'vehicle_comments';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function vehicle_data()
    {
        return $this->belongsTo(Vehicle::class, 'fk_vehicleId');
    }

    public function users_name()
    {
        return $this->belongsTo(User::class, 'fk_userId');
    }
}
