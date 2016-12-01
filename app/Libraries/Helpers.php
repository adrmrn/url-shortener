<?php

// Function for flashing messages to Session
function flash($type, $message) {
	Session::flash('flash_message', $message);
    Session::flash('flash_status', $type);
}

// Function for get days
function getDays(Carbon\Carbon $date) {
	return $date->diffInDays();
}

// Function for generate short link with domain
function getShortLink($short_url) {
	return Request::getHttpHost() . '/s/' . $short_url;
}