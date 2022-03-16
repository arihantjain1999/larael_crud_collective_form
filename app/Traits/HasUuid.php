<?php
    namespace App\Traits;
    use Illuminate\support\Str;
    trait HasUuid{
        protected static function bootHasUuid(){
            static::creating(function($model){
                if(empty($model->id)){
                    $model->id=Str::uuid();
                }
            });
        }
    }