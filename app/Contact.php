<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    //
    protected $fillable = [
        'phoneNumber',
        'whatsapp',
        'twitter',
        'instagram',
        'country',
        'city',
        'neighborhood',
        'lat',
        'lan',
    ];

    use SoftDeletes;
    protected $table = 'contact';

    public function order() {
        return $this->hasOne(Adoption::class);
    }
    public function user() {
        return $this->hasOne(User::class);
    }

    public function rescue() {
        return $this->hasOne(Rescue::class);
    }
    public function lost() {
        return $this->hasOne(Lost::class);
    }
}
