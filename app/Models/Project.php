<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
class Project extends Model
{
    use HasFactory , HasUuid;
    public $table = "projects";
    protected $fillable = ['p_name','company','country','s_date'];
    protected $primaryKey='id';
    protected $keyType = "string";
    public $incrementing = false;
    public function contacts(){
        return $this->belongsToMany(Contact::class);
    }
}
