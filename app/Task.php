<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['subject','time','due_date','message','user_id','type_id','status' ];




    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
