<?php

// Formats the timestamp in different standard types 
class DateFormat {
	static public function toNewsDate( $timestamp ) {
		return date( 'j F Y', $timestamp );
	}
}