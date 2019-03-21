<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

	protected $table = 'sections';
    
    public function class()
    {
        return $this->belongsToMany('App\SClass',  'sclass_section','class_id','section_id');
    }
}
