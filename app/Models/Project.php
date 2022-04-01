<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use App\Traits\Relation;
class Project extends Model
{
    use HasFactory , HasUuid ,Relation;
    public $table = "projects";
    protected $fillable = ['p_name','company','country','s_date'];
    protected $primaryKey='id';
    protected $keyType = "string";
    public $incrementing = false;
    public function contacts(){
        return $this->belongsToMany(Contact::class);
    }
}
