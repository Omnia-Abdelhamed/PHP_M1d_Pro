<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $primaryKey = 'dept_num';
    public function students(){
        return $this->hasMany(student::class,'dept_id','dept_num');
    }
}
