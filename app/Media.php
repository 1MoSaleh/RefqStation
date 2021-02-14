<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    //
    protected $fillable = [
        'src',
        'type',
        'path',
        'name',
        'user_id',
        'article_id',
        'order_id',
        'rescue_id',
        'lost_id',
    ];

    use SoftDeletes;

    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function article() {
        return $this->belongsTo(Article::class , 'article_id');
    }
    public function order() {
        return $this->belongsTo(Adoption::class , 'order_id');
    }

    public function rescue() {
        return $this->belongsTo(Rescue::class , 'rescue_id');
    }
    public function lost() {
        return $this->belongsTo(Lost::class , 'lost_id');
    }
}
