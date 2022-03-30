<?php
    namespace App\Traits;
    use Illuminate\support\Str;
    trait Relation{
        protected static function bootRelation(){
            static::saved(function($model){
               
            });
    }