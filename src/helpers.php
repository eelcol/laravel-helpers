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