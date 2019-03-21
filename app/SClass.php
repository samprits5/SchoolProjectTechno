<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
	protected $table = 'sclass';
    
    public function sections()
    {
        return $this->belongsToMany('App\Section', 'sclass_section','class_id','section_id');
    }
}
