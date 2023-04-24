<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyAnswer
 *
 * @property $id
 * @property $student_email
 * @property $student_name
 * @property $student_code
 * @property $faculty
 * @property $program
 * @property $funniest_professor_id
 * @property $most_demading_professor_id
 * @property $most_inspiring_professor_id
 * @property $most_supportive_professor_id
 * @property $most_innovative_professor_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SurveyAnswer extends Model
{

    static $rules = [
		'student_email' => 'required',
		'student_name' => 'required',
		'student_code' => 'required',
		'faculty' => 'required',
		'program' => 'required',
		'funniest_professor_id' => 'required',
		'most_demading_professor_id' => 'required',
		'most_inspiring_professor_id' => 'required',
		'most_supportive_professor_id' => 'required',
		'most_innovative_professor_id' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['student_email','student_name','student_code','faculty','program','funniest_professor_id','most_demading_professor_id','most_inspiring_professor_id','most_supportive_professor_id','most_innovative_professor_id'];



}
