<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    //
    protected $fillable = [
      'petType',
      'petName',
      'sex',
      'family',
      'age',
      'castration',
      'vaccinated',
        'litterBox',
      'behavior',
      'reason',
      'healthStatues',
    ];
    use SoftDeletes;
    public function order() {
        return $this->hasOne(Adoption::class);
    }

}
