<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleStatus extends Model
{
    protected $guarded = [];
    protected $table = 'vehicle_status';
    public function vehicles()
    {
        return $this->belongsTo(Vehicles::class);
    }
}
