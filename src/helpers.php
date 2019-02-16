<?php 

use Eelcol\LaravelHelpers\Facade\Messages;

if(!function_exists('success'))
{
	function success($text)
	{
		Messages::addSuccess($text);
	}
}

if(!function_exists('error'))
{
	function error($text)
	{
		Messages::addError($text);
	}
}

if(!function_exists('display_messages'))
{
	function display_messages()
	{
		return Messages::view();
	}
}

if(!function_exists('safe_array'))
{
	/**
	* Retrieve a key from an array when not known if the array is set
	*/
	function safe_array($array, ...$params)
	{
		if(!is_array($array))
		{
			return NULL;
		}

		$firstParam = array_shift($params);
		if(!isset($array[$firstParam]))
		{
			return NULL;
		}

		if(count($params) > 0)
		{
			/**
			* Value not found yet
			*/
			return call_user_func_array("safe_array", array_merge([$array[$firstParam]], $params));
		}

		return $array[$firstParam];
	}
}