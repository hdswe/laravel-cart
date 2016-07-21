<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function type(){
        return $this->hasOne(Type::class,'id','type_id');
    }

}
