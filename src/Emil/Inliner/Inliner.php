<?php namespace Emil\Inliner;


use Illuminate\Support\Facades\View;

require_once('vendor/PHP-Premailer/Premailer.class.php');

class Inliner extends \Premailer  {

	public function markup($html)
	{
		$this->_markup = $html;
	}

	public function argument($name, $value)
	{
		return $this->setArgument($name, $value);
	}

	public function view($view, $data = [])
	{
		$this->_markup = View::make($view, $data);
	}

}
