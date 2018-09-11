<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = ["title","hash","description","user_id","slug","description","cover_url"];

    public function findByHash($hash) {
        return Show::where('hash','=',$hash)->first();
    }

    public function hasReminders() {
        if(count($this->reminders) > 0) {
            return true;
        }
        return false;
    }
    public function reminders() {
        return $this->hasMany('App\Reminder');
    }
}
