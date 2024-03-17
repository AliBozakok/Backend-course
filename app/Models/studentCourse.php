<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentCourse extends Model
{
    use HasFactory;
    protected $fillable=[
        'studentId',
        'courseId',
        'mark'
    ];

    public function student ()
    {
        $this->belongsTo(Student::class,'studentId','id');
    }

    public function course()
    {
        $this->belongsTo(Course::class,'courseId','id');
    }

    protected $appends=['avg'];

    public function getAvgAttribute()
    {
        $count=studentCourse::where('studentId',$this->studentId)->count();
        $sum=studentCourse::where('studentId',$this->studentId)->sum('mark');
        $avg=$sum/$count;
        if($count>0)
        {
            return $avg;
        }
        else
        {
        return 0;
        }
    }

}
