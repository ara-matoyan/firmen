<?php

namespace Firmen;

use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    
        public function mystatus()
    {
        return $this->hasOne('Firmen\Status','id','status_id');
    }
    
   public function state()
    {
        return $this->hasOne('Firmen\State','id','state_id');
    }
    
    public function city()
    {
        return $this->belongsToMany('Firmen\City');
    }
    
    public function job()
    {
        return $this->hasOne('Firmen\Job','id','job_id');
    }
    

    public function bdepartment()
    {
        return $this->hasOne('Firmen\Bdepartment','id','bdepartment_id');
    }


    public function contact () {
        return $this->hasMany(Contact::class);
    }
    	
}
