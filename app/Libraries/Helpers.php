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