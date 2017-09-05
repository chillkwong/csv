<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
	public $fillable = [ 'stock', 'netPrice', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry' ,'fluroscence' ,'lab' ,'location' ,'imageLink' ,'videoLink'] ;
	
	public function vendor()
	{
		$this->belongsTo(Vendor::class);
	}
}
