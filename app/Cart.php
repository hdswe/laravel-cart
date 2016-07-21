<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class Cart extends Model{

    protected $table ='cart';

    public function item(){
        return $this->hasOne(Item::class,'id','item_id');
    }

}