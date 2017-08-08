<?php

function set_active($path, $active = ' is-active')
{
	return Request::is($path) ? $active : '';
}

function set_shown($path, $hidden = ' is-hidden')
{
	return Request::is($path) ? '' : $hidden;
}

function set_hidden($path, $hidden = ' is-hidden')
{
	return Request::is($path) ? $hidden : '';
}