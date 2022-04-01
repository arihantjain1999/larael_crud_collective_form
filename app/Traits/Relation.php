<?php
namespace App\Traits;
use App\Models\Contact;
use App\Models\Account;
use Illuminate\support\Str;
use Illuminate\Support\Facades\DB;


    trait Relation {
       
        protected static function bootRelation(){
            static::saved(function($model){
                // reciving model name from the form submission
                    $fieldarr = array_keys(request()->all());
                    // dd($fieldarr);
                    // dd(request()->all());
                    // dd($model->getkey());
                    $field = last($fieldarr);
                    // dd($field);
                    $relation_name=trim($field, "_id");
                    $model_name=class_basename($model);
                    $relation_model_name=config('relation.'.$model_name);
                    $value=config('relation.'.$model_name.'.'.$relation_name.'.relation_with_function');
                    $relation_id=config('relation.'.$model_name.'.'.$relation_name.'.relation_id');
                    $relation_with_id=config('relation.'.$model_name.'.'.$relation_name.'.relation_with_id');
                    $pivot_table_name=config('relation.'.$model_name.'.'.$relation_name.'.pivot');
                    // dd($pivot_table_name);
                    // storeing the related datas id into a variale 
                    // dd(request()->all($relation_with_id));
                    $model_id =$model->getkey() ;
                    $relation_id_lower = Str::lower($relation_id);
                    // $relation_with_id_lower = Str::lower($relation_with_id);
                    if(DB::table($pivot_table_name)
                    ->where( $relation_id_lower , request()->all($relation_id))
                    ->where( $relation_with_id , $model_id)
                    ->count() < 1
                    )
                    {
                        $all=request()->all($relation_id);
                        $model->$value()->attach($all);
                    }
                // }
            });
        }
    }