<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

/*    public function chat()
    {
        return $this->hasMany('App\Chat', 'to');
    } */
    public static function chat($user, $id)
    {
    return DB::table('chats')->where([
        ['to', $user],
        ['from', $id],
        ])->orWhere([
        ['to', $id],
        ['from', $user],
    ])->get();
    }

    public function send($id, $message)
    {

    }
}
