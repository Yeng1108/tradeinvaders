<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

  
  
    public function user()
    {
     
        
        return $this->belongsTo(User::class);

    }
    public function vehicles()
    {
        return $this->hasOne(Vehicles::class)->orderBy('created_at','DESC');
    }
}
