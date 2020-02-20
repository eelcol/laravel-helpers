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

if(!function_exists('display_success'))
{
	function display_success($text)
	{
		return Messages::displaySuccess($text);
	}
}

if(!function_exists('display_error'))
{
	function display_error($text)
	{
		return Messages::displayError($text);
	}
}

if(!function_exists('safe_array'))
{
	/**
	* Retrieve a key from an array when not known if the array is set
	* Usage: safe_array(['test' => ['m' => 'v']], 'test', 'm');
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

if(!function_exists('safe_in_array'))
{
	/**
	* Check if a value is in array
	*/
	function safe_in_array($val, $array)
	{
		if(!is_array($array))
		{
			return NULL;
		}

		return in_array($val, $array);
	}
}

if(!function_exists('id_in_collection'))
{
	/**
	* Check if an id is present in a collection
	*/
	function id_in_collection($id, $collection)
	{
		if(is_null($collection) || !is_object($collection))
		{
			return false;
		}

		return !is_null($collection->firstWhere('id', $id));
	}
}