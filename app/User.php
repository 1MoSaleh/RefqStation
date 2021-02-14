<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'statues', 'role' , 'organizationName', 'contact_id' , 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        return $this->hasMany(Adoption::class);
    }
    public function articles() {
        return $this->hasMany(Article::class);
    }
    public function rescue() {
        return $this->hasMany(Rescue::class);
    }
    public function lost() {
        return $this->hasMany(Lost::class);
    }

   /* // relations for admin to manage it
    public function adminOrders() {
        return $this->hasMany(Order::class);
    }
    public function adminArticles() {
        return $this->hasMany(Article::class);
    }
    public function adminRescues() {
        return $this->hasMany(Rescue::class);
    }
    public function adminLost() {
        return $this->hasMany(Lost::class);
    }
*/
    public function contact() {
        return $this->belongsTo(Contact::class , 'contact_id');
    }
    public function reports() {
        return $this->hasMany(Report::class);
    }
    public function media() {
        return $this->hasMany(Media::class);
    }

}
