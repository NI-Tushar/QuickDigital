<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
        'what_will_i_learn' => 'array',
        'tageted_audience' => 'array',
        'materials_included' => 'array',
        'requirements' => 'array',

    ];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }

    public function topics()
    {
        return $this->hasMany(CourseTopic::class, 'course_id');
    }


    public function lessons()
    {
        return $this->hasManyThrough(
            CourseLesson::class,
            CourseTopic::class,
            'course_id', // Foreign key on CourseTopic
            'topic_id', // Foreign key on CourseLesson
            'id', // Local key on Course
            'id' // Local key on CourseTopic
        );
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function getTotalDuration()
    {
        return $this->lessons()->sum('lesson_duration');
    }
}
