<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
protected $guarded = [];

    public function profileimage()
    {
        $imagePath = ($this->image)? $this->image : 'profile/pPDD562J2JE73bhm8BtN0Jeus0qXfVLHwVokYFXF.png';
        return '/storage/' .$imagePath;
    }
    public function following()
    {
        return $this->belongsToMany(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class); //belongsTo anak
    }
}
