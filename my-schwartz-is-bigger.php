<?php
	// include 3rd party parsing utility
	require './vendor/querypath/qp.php';
	$gidURL = $_SERVER['REQUEST_URI'];
	$url = 'https://swgoh.gg/g/27827/gid-my-schwartz-is-bigger/';

	// get the HTML page into the parser
	$guild_page = htmlqp( $url );
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



	$guildInfo = guild_info_data();

?><!DOCTYPE html>
<html lang="en">
<head>
  <title>GiD My Schwartz Is Bigger</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.html"><img src="images/gidLogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="guilds.html">Community<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aboutGID.html">About GiD</a></li>
            <li><a href="guilds.html">Guilds</a></li>
          </ul>
        </li>
        <li><a href="tools.html">Tools</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">GiD Merch</a></li>
        <li><a href="#">CubsFanHan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="guildHeader">
	<img src="images/guildsBanner.png" class="guildHeader col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">	
</div>

<!-- Guild Info -->
<div class="row">
<div class="col-lg-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<div class="well sch-well">
		<h2><center>GiD My Schwartz Is Bigger</center></h2>
		<img src="images/guildSCH.png" height="300" class="sch-center"><br />
		<h4><center>Leaders:</center></h4>
		<p><center>OnurbKol and Toyogurt</center></p>
	</div>
	<div class="row">
	<div class="col-lg-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=7dj7r41rf129brnr1gtpfbdo98%40group.calendar.google.com&amp;color=%2329527A&amp;ctz=America%2FChicago" style="border-width:0" frameborder="0" scrolling="no" class="calendar"></iframe>
	</div>	
	</div>
</div>

<!-- Guild Info Table -->
<div class="table-body col-xl-6 col-lg-6 col-md-6 col-sm-8 col-xs-12">
	<table class="sch-guild-info-table" id="sch-table">
		<tr class="sch-guild-info-row">
			<th onclick="sortTable(0)"><center>Member:</center></th>
			<th onclick="sortTable(1)"><center>GP:</center></th>
			<th onclick="sortTable(2)"><center>CS:</center></th>
			<th onclick="sortTable(3)"><center>Arena Rank:</center></th>
			<th onclick="sortTable(4)"><center>Arena Avg:</center></th>
		</tr>
	<?php
		for($i = 0; $i < sizeof($guildInfo); $i++){
			print "<tr><td>".$guildInfo[$i]['name']."</td><td>".$guildInfo[$i]['gp']."</td><td>".$guildInfo[$i]['collection_score']."</td><td>".$guildInfo[$i]['arena_rank']."</td><td>".$guildInfo[$i]['arena_average']."</td></tr>";
		}
	?>
	</table>
	<!-- script used to sort the table based on the different headers -->
	<script type="text/javascript">
		function sortTable(n){
			var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
			table = document.getElementById("sch-table");
			switching = true;
			// set sorting direction to ascending
			dir = "asc";

			while (switching) {
				switching = false;
				rows = table.getElementsByTagName("TR");

				for (i = 1; i < (rows.length - 1); i++) {
					shouldSwitch = false;
					x = rows[i].getElementsByTagName("TD")[n];
      				y = rows[i + 1].getElementsByTagName("TD")[n];

      				// check if the two rows should switch place, based on the direction, asc or desc:
      				if (dir == "asc") {
        				if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          					//if so, mark as a switch and break the loop:
          					shouldSwitch= true;
          					break;
        				}
      				} else if (dir == "desc") {
        				if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          					//if so, mark as a switch and break the loop:
          					shouldSwitch = true;
          					break;
        				}
      				}// end of if/else statement
				}// end of for loop
				if (shouldSwitch) {
      				rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      				switching = true;
      				switchcount ++;      
    			} else {
      				if (switchcount == 0 && dir == "asc") {
        				dir = "desc";
        				switching = true;
      				}
    			}
			}// end of while loop
		}// end of function
	</script>
</div>
</div>

<!-- footer -->
<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4  col-md-2 col-sm-4 col-xs-6">
					<h3>Community</h3>
                    <ul>
						<li><a href="aboutGID.html">About GiD</a></li>
                        <li><a href="guilds.html">Guilds</a></li>
                    </ul>
                </div>
                <div class="row">
                <div class="col-lg-4  col-md-2 col-sm-4 col-xs-6">
                    <h3> About Us </h3>
                    <ul>
                        <li> <a href="tools.html">Tools</a> </li>
                        <li> <a href="#"> News </a> </li>
                        <li> <a href="#"> GiD Merch </a> </li>
                        <li> <a href="#"> CubsFanHan </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Join Us </h3>
						<div class="input-append newsletter-box text-center">
							<button class="btnDiscord  bg-gray" type="button"><a href="https://discord.gg/mYRGWAH"> Discord </a><i class="fa fa-long-arrow-right"> </i> </button>
						</div>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
</footer>

</body>

<style>
	.sch-guild-info-table{
		margin-bottom: 30px;
		background-color: #F5F5F5;
		border: 2px solid #F5F5F5;
		margin-left: 10px;
		margin-right: 15px;
	}
	tr{
		text-align: center;
		padding: 8px;
	}
	tr:nth-child(2n){
		background-color: white;
	}
	td{
		padding: 8px;
	}
	th{
		padding: 8px;
		width: 20%;
		cursor: pointer;
	}
	.sch-well{
		margin-left: 15px;
		margin-right: 10px;
	}
	.sch-center{
		margin-left: auto;
		margin-right: auto;
		display: block;
		border-radius: 5px;
	}
	.calendar{
		margin-left: 15px;
		margin-right: 1px;
		width: 202%;
		margin-bottom: 20px;
		height: 600px;
	}
</style>


</html>