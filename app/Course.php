<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'courses';
    public $timestamps = false;

    public function parent() {
        return $this->belongsTo('App\Course', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\Course', 'parent_id');
    }
}
