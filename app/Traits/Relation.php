<?php
namespace App\Traits;
use App\Models\Contact;
use App\Models\Account;
use Illuminate\support\Str;
use Illuminate\Support\Facades\DB;


    trait Relation {
       
        protected static function bootRelation(){
            static::saved(function($model){
                    $fieldarr = array_keys(request()->all());
                    // getting all the keys from the request feom the form submitted 
                    $filed_2nd_last =  array_slice($fieldarr , -2 , 1);
                    // getting 2nd last element from the array which is the name of selected id , to have relation with 
                    $field_last = last($fieldarr);
                    // dd(request()->all($field_last));
                    // getting the last element which is the name of the selected id which is to detached 
                    $relation_name=trim($filed_2nd_last[0], "_id");
                    // removing the _id from the delected id ,  to have relation with to get the module name 
                    $model_name=class_basename($model);
                    // getting the model from which the from was subbmitted 
                    // $relation_model_name=config('relation.'.$model_name);
                    $value=config('relation.'.$model_name.'.'.$relation_name.'.relation_with_function');
                    // getting the function name from config to attache with 
                    $relation_id=config('relation.'.$model_name.'.'.$relation_name.'.relation_id');
                    // getting the name of the relation id from config (it is the associated _id which has relation with model)
                    $relation_with_id=config('relation.'.$model_name.'.'.$relation_name.'.relation_with_id');
                    // getting the name of the related id of the realtion
                    $pivot_table_name=config('relation.'.$model_name.'.'.$relation_name.'.pivot');
                    // getting the relateed table name
                    $model_id =$model->getkey();
                    $relation_id_lower = Str::lower($relation_id);
                    // contact_id Account model form
                    // dd(request()->all($field_last));
                    if(request()->all($filed_2nd_last) != "null"){
                        if(DB::table($pivot_table_name)
                        ->where( $relation_id_lower , request()->all($field_last))
                        // ->where("" , "uuid")
                        ->where( $relation_with_id , $model_id)
                        // ->where( "account_id" , "uuid")
                        ){
                            // dd('comming in ');
                            $all=request()->all($field_last);
                            $model->$value()->detach($all);
                        }
                    }
                    // for attach
                    if(request()->all($field_last) != "null"){
                        if(DB::table($pivot_table_name)
                        ->where( $relation_id_lower , request()->all($relation_id))
                        ->where( $relation_with_id , $model_id)
                        ->count() < 1
                        )
                        {
                            $all=request()->all($filed_2nd_last);
                            $model->$value()->attach($all);
                        }
                    }
            });
        }
    }