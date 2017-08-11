<?php

function set_active($path, $except = array(''), $active = ' is-active')
{
	return Request::is($path) && !in_array(Request::path(),$except) ? $active : '';
}

function set_shown($path, $except = array(''), $hidden = ' is-hidden')
{
	return Request::is($path) && !in_array(Request::path(),$except) ? '' : $hidden;
}

function set_hidden($path, $except = array(''), $hidden = ' is-hidden')
{
	return Request::is($path) && !in_array(Request::path(),$except) ? $hidden : '';
}