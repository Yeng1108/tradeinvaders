<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = [
        'unit',
        'plateno',
        'brand',
        'variant',
        'yearmodel',
        'tvalue',
        'customerprice',
        'mp',
        'grm',
        'carimage',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class)->orderBy('created_at','DESC');
    }
    public function VehicleStatus()
    {
        return $this->hasOne(VehicleStatus::class);
    }
}
