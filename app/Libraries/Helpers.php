<?php

// Function for flashing messages to Session
function flash($type, $message) {
	Session::flash('flash_message', $message);
    Session::flash('flash_status', $type);
}
