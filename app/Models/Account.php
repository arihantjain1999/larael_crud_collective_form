<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\HasUuid;

class Account extends Model
{
    use HasFactory,HasUuid;
    public $table = "accounts";
    protected $fillable = ['f_name','l_name','dob','phone','email','address','hobby','gender','country'];
    public function sethobbyattribute($value){
        $this->attributes['hobby']=implode(',' , $value);
    }
    protected $primaryKey='id';
    protected $keyType = "string";
    public $incrementing = false;
    public function contacts(){
        return $this->belongsToMany(Contact::class);
    }
}
