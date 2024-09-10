<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table='students';
    protected $primaryKey = 'code';
    // protected $keyType = 'string';
    // public $incrementing = false;
    protected $fillable=['code','std_name','email','phone','dept_id','photo'];

    public function tablet(){
        return $this->hasOne(Tablet::class,'std_id','code')->withDefault(['tablet_name'=>'no tablet']);
    }

    public function department(){
        return $this->belongsTo(Department::class,'dept_id','dept_num')->withDefault(['dept_name'=>'unkown']);
    }

    public function courses(){
        return $this->belongsToMany(Course::class,'students_courses','std_id','crs_id','code','course_id')->withPivot('degree')->orderByPivot('degree','desc');
    }
}
