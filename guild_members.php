<?php
// connect to mysql
include('connect_mysql.php');
// make sure the webservice returns plain text
header( 'Content-Type: text/plain; charset=utf-8' );
// include 3rd party parsing utility
require './vendor/querypath/qp.php';
$gidURL = $_SERVER['REQUEST_URI'];

// figure out which guild to scrape info for
// MAKE SURE TO CHANGE TO EXACT URLS ONCE PAGES ARE COMPLETE
if(strpos($gidURL, '1-800-Druidia') !== false) {
	$url = 'https://swgoh.gg/g/21284/gid-1-800-druidia/';
}else if(strpos($gidURL, 'liquid-schwartz') !== false) {
	$url = 'https://swgoh.gg/g/19528/gid-liquid-schwartz/';
}else if(strpos($gidURL, 'spaceballsdeep') !== false) {
	$url = 'https://swgoh.gg/g/14280/gid-spaceballsdeep/';
}else if(strpos($gidURL, 'chapter-eleven') !== false) {
	$url = 'https://swgoh.gg/g/41958/gid-chapter-eleven/';
}else if(strpos($gidURL, 'my-own-best-friend') !== false) {
	$url = 'https://swgoh.gg/g/4736/gid-my-own-best-friend/';
}else if(strpos($gidURL, 'gone-to-plaid') !== false) {
	$url = 'https://swgoh.gg/g/363/gid-gone-to-plaid/';
}else if(strpos($gidURL, 'my-schwartz-is-bigger') !== false) {
	$url = 'https://swgoh.gg/g/27827/gid-my-schwartz-is-bigger/';
}else if(strpos($gidURL, 'ludicrousspeed') !== false) {
	$url = 'https://swgoh.gg/g/19538/gid-ludicrousspeed/';
}else if(strpos($gidURL, 'lone-starr') !== false) {
	$url = 'https://swgoh.gg/g/32650/gid-lone-starr/';
}else {
	echo "No guild was found in the URL.\n";
}

// get the HTML page into the parser
$guild_page = htmlqp( $url );
// $guild_page = htmlqp( './test-druidia.html' ); // for testing if you don't want to hit swgoh.gg
function guild_info_data() {
	// init empty array that will hold our data later
	$guild_members = [];
	global $guild_page;
	// loop through table rows
	foreach ( $guild_page -> find( '.character-list tbody tr' ) as $row ) {
		// init empty array for individual player
		$guild_member = [];

		// store data in temporary array
		$guild_member[ 'name' ] = preg_replace( "/\r|\n/", "", trim( $row -> branch( 'td' ) -> eq( 0 ) -> text() ) );
		$guild_member[ 'gp' ] = $row -> branch( 'td' ) -> eq( 1 ) -> text();
		$guild_member[ 'collection_score' ] = $row -> branch( 'td' ) -> eq( 2 ) -> text();
		$guild_member[ 'arena_rank' ] = $row -> branch('td') -> eq(3) -> text();
		$guild_member[ 'arena_average' ] = $row -> branch( 'td' ) -> eq( 4 ) -> text();

		// add player array to full response array
		$guild_members[] = $guild_member;
	}

	return $guild_members;

}

$member_name = [];
$member_gp = [];
$member_cs = [];
$member_rank = [];
$member_rank_avg = [];

$guildInfo = guild_info_data();
for($i = 0; $i < sizeof($guildInfo); $i++){
	$member_name = ($guildInfo[$i]['name']);
}
for($i = 0; $i < sizeof($guildInfo); $i++){
	$member_gp = ($guildInfo[$i]['gp']);
}
for($i = 0; $i < sizeof($guildInfo); $i++){
	$member_cs = ($guildInfo[$i]['collection_score']);
}
for($i = 0; $i < sizeof($guildInfo); $i++){
	$member_rank = ($guildInfo[$i]['arena_rank']);
}
for($i = 0; $i < sizeof($guildInfo); $i++){
	$member_rank_avg = ($guildInfo[$i]['arena_average']);
}


// let's get out of here
exit;

?>