<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'type',
        'statues',
        'likes',
        'dislikes',
        'user_id',
        'admin_id',
    ];

    use SoftDeletes;



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
