<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adoption extends Model
{
    //
    protected $table = 'adoption';
    protected $fillable = [
        'type',
        'title',
        'details',
        'conditions',
        'statues',
        'user_id',
        'pet_id',
        'contact_id',
        'updated_at',
        'created_at',
    ];

    use SoftDeletes;

    public function pet() {
        return $this->belongsTo(Pet::class , 'pet_id');
    }
    public function contact() {
        return $this->belongsTo(Contact::class , 'contact_id');
    }
    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function admin() {
        return $this->belongsTo(User::class , 'admin_id');
    }
    public function reports() {
        return $this->hasMany(Report::class);
    }
    public function media() {
        return $this->hasMany(Media::class);
    }

}
