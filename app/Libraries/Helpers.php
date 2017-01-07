<?php

use App\User;

// Function for flashing messages to Session
function flash($type, $message) {
	Session::flash('flash_message', $message);
    Session::flash('flash_status', $type);
}

// Function for get days
function getDays(Carbon\Carbon $date) {
	return $date->diffInDays() + 1;
}

// Function for generate short link with domain
function getShortLink($short_url) {
	return Request::getHttpHost() . '/s/' . $short_url;
}

// Function for counting clicks for user
function getUserClicksCount(User $user) {
	$clicks = [];

	foreach ($user->links as $link) {
		foreach ($link->clicks as $click) {
			$clicks[] = $click;
		}
	}

	return count($clicks);
}

// Function for getting 3 top links
function getThreeTopLinks($links) {
	return $links->sortByDesc(
		function ($link, $key) { 
			return count($link['clicks']); 
		}
	)->splice(0,3);
}