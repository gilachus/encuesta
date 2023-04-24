<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Professor
 *
 * @property $id
 * @property $name
 * @property $faculty
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Professor extends Model
{
    
    static $rules = [
		'name' => 'required',
		'faculty' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','faculty'];



}
