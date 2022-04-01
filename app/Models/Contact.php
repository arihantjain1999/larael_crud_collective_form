<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use App\Traits\Relation;
class Contact extends Model
{
    use HasFactory ,HasUuid ,Relation;
    public $table = "contacts";
    protected $fillable = ['name','phone','email'];
    protected $primaryKey='id';
    protected $keyType = "string";
    public $incrementing = false;
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public function account(){
        return $this->belongsToMany(Account::class);
    }
}
