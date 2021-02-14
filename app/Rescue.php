<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rescue extends Model
{
    //
    protected $table = 'rescue';
    use SoftDeletes;
    protected $fillable = [
        'details',
        'need_degree',
        'healthStatues',
        'violent',
        'statues',
        'user_id',
        'contact_id',
    ];



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
