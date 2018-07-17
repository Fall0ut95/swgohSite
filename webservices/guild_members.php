<?php

// make sure the webservice returns plain text
header( 'Content-Type: text/plain' );

// include 3rd party parsing utility
require './vendor/querypath/qp.php';

// example url string: ?url=%2F21284%2Fgid-1-800-druidia%2F
	// in the real world, this should be a post value, not a query parameter
	// either way, it will have to be decoded before getting posted to the service

// for testing, if there is no request parameter, it will default to GiD DR
if ( $_REQUEST[ 'url' ] ) {
	$decoded_url_value = strip_tags( urldecode( $_REQUEST[ 'url' ] ) );
} else {
	$decoded_url_value = '/21284/gid-1-800-druidia/';
}

$url = 'https://swgoh.gg/g' . $decoded_url_value;

// get the HTML page into the parser
$guild_page = htmlqp( $url );
// $guild_page = htmlqp( './test-druidia.html' ); // for testing if you don't want to hit swgoh.gg


// init empty array that will hold our data later
$guild_members = [];


// loop through table rows
foreach ( $guild_page -> find( '.character-list tbody tr' ) as $row ) {
	// init empty array for individual player
	$guild_member = [];

	// store data in temporary array
	$guild_member[ 'name' ] = preg_replace( "/\r|\n/", "", trim( $row -> branch( 'td' ) -> eq( 0 ) -> text() ) );
	$guild_member[ 'gp' ] = $row -> branch( 'td' ) -> eq( 1 ) -> text();
	$guild_member[ 'collection_score' ] = $row -> branch( 'td' ) -> eq( 2 ) -> text();
	$guild_member[ 'arena_average' ] = $row -> branch( 'td' ) -> eq( 4 ) -> text();

	// add player array to full response array
	$guild_members[] = $guild_member;
}


// encode array as json and print
print json_encode( $guild_members );


// let's get out of here
exit;

?>
