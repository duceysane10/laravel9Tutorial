<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    // hoos waxaan ku abuuranay labo function oo ah Mutator: wuxuu badalayaa xogta intaana database ka lagu safe gareen sida aad udalbato labada function hoose midna magaca ayaan dhahay ka hor mari
    // Eng midka labaadna waxaan dhahay addreska ku dar somalia
    public function setNameAttribute($value){
        $this->attributes['name']= 'Eng '.$value;
    }

    public function setAddressAttribute($value){
        $this->attributes['Address']= $value.' Somalia';
    }

      // hoos waxaan ku abuuranay hal function oo ah Mutator Accessors: wuxuu soo bandhigayaa xogta sada aad uqaabeestaid iyadoona database ka shuqul ku laheen waxaa xogtaas ka qaabeesay tusaale
    //    functionka hoose waxaan dhahay ii soo bandhig xogta adigoo clomka name magacyda ku jiro aad kadhigeesid xarafka u horeeyo capital
      public function getNameAttribute($value){
        return ucfirst($value);    }

    // one To One Relation ship
    public function getCompany(){
        return $this->hasOne('App\Models\Company');
    }
      // one To Many relation ship
      public function getCompanyMany(){
        return $this->hasMany('App\Models\Company');
    }
}
