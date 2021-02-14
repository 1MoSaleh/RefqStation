<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lost extends Model
{
    //

    protected $fillable = [
        'dateOfLost',
        'details',
        'catName',
        'catAge',
        'catSex',
        'catDetails',
        'statues',
        'user_id',
        'contact_id',
    ];




    use SoftDeletes;
    protected $table = 'lost';

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
