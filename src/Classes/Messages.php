<?php

namespace Eelcol\LaravelHelpers\Classes;

use Illuminate\Support\Facades\Session;

class Messages {

	/**
	* Error messages
	*/
	protected $errors = [];

	/**
	* Success messages
	*/
	protected $success = [];

	/**
	* Get array from flash data
	*/
	public function __construct()
	{
		$this->errors 	= request()->session()->pull('msg_errors', []);
		$this->success 	= request()->session()->pull('msg_success', []);
	}

	/**
	* Add a error message
	*/
	public function addError($text)
	{
		$this->errors[] = $text;

		Session::flash('msg_errors', $this->errors);
	}

	/**
	* Add a success message
	*/
	public function addSuccess($text)
	{
		$this->success[] = $text;

		Session::flash('msg_success', $this->success);
	}

	/**
	* Return view
	*/
	public function view()
	{
		return view("laravel-helpers::messages.view", ['Errors' => $this->errors, 'Success' => $this->success]);
	}

	/**
	* Return view
	*/
	public function displaySuccess($text)
	{
		return view("laravel-helpers::messages.view", ['Success' => [$text], 'Errors' => []]);
	}

	/**
	* Return view
	*/
	public function displayError($text)
	{
		return view("laravel-helpers::messages.view", ['Errors' => [$text], 'Errors' => []]);
	}

}