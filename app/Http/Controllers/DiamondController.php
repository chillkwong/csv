<?php

namespace App\Http\Controllers;

use App\Diamond;
use Illuminate\Http\Request;

class DiamondController extends Controller
{	
	public $diamonds = [];

	public $rate = '';

	public function selector()
	{	 
		// var_dump($this->diamonds);

		$this->rate = 7.78;
		$diamonds = Diamond::where([
			['color', $this->diamonds['color']],
			['cut', $this->diamonds['cut']]
			])->paginate(15);
		return view('diamonds.selector', compact('diamonds', 'rate'));
	}

	public function match()
	{
		// var_dump(request('d'));
		$this->diamonds['color'] = request('color');
		$this->diamonds['cut'] = request('cut');
		return $this->selector();
	}
}
