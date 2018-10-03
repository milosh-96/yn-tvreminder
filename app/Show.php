<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Show extends Model
{
    protected $fillable = ["title","hash","description","user_id","slug","description","cover_url"];

    public function getUser() {
        return $this->hasOne('App\User','id','user_id');
    }

    public function findByHash($hash) {
        return Show::where('hash','=',$hash)->first();
    }
    public function isPublic() {
        if($this->public == 1) {
            return true;
        }
        return false;


    }
    public function hasReminders() {
        if(count($this->reminders) > 0) {
            return true;
        }
        return false;
    }

    //filtered by authenticated user //
    public function reminders() {
        return $this->hasMany('App\Reminder')->where('user_id','=',$this->user_id);
    }

    // not filtered by authenticated user //
    public function allReminders() {
        return $this->hasMany('App\Reminder');
    }
}
