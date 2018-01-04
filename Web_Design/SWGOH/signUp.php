<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    /* registration page */
  .registerHead {
    width: 30%;
    margin: 50px auto 0;
    color: yellow;
    background: black;
    text-align: center;
    border: 1px solid black;
    border-bottom: none;
    border-radius: 10px 10px 0 0;
    padding: 20px;
  }
  form {
    width: 30%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid black;
    background: white;
    border-radius: 0 0 10px 10px;
    margin-bottom: 50px;
  }
  .input-reg {
    margin: 10px 0 10px 0;
  }
  .input-reg label {
    display: block;
    text-align: left;
    margin: 3px;
  }
  .input-reg input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid grey;
  }
  .regButton {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: black;
    border: none;
    border-radius: 5px;
    text-align: center;
    margin: auto;
    margin-bottom: 5px;
  }
  .regButton:hover {
    background-color: #5B5B5B;
  }
  </style>
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
            <li><a href="calendar.html">Calendar</a></li>
          </ul>
        </li>
        <li><a href="applyNow.html">Podcast</a></li>
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

<!--Registration box -->
<div class="registerHead">
  <h2>Register</h2>
</div>

<form method="post" action="register.php">
  <!-- display validation errors here -->
  <?php include('errors.php'); ?>
  <div class="input-reg">
    <label>Username: </label>
    <input type="text" name="username">    
  </div>
  <div class="input-reg">
    <label>Email: </label>
    <input type="text" name="email">
  </div>
  <div class="input-reg">
    <label>Password: </label>
    <input type="text" name="password1">
  </div>
  <div class="input-reg">
    <label>Confirm Password: </label>
    <input type="text" name="password2">
  </div>
  <div class="input-group">
    <button type="submit" name="register" class="regButton">Register</button>
  </div>
  <p>
    Already a member? <a href="login.php">Sign in</a>
  </p>
</form>

<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-md-2 col-sm-4 col-xs-6">
					<h3>Community</h3>
                    <ul>
						<li><a href="aboutGID.html">About GiD</a></li>
                        <li><a href="guilds.html">Guilds</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                </div>
                <div class="row">
                <div class="col-lg-4  col-md-2 col-sm-4 col-xs-6">
                    <h3> About Us </h3>
                    <ul>
                        <li> <a href="applyNow.html">Podcast</a> </li>
                        <li> <a href="#"> News </a> </li>
                        <li> <a href="#"> GiD Merch </a> </li>
                        <li> <a href="#"> CubsFanHan </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Join Us </h3>
					<li>
						<div class="input-append newsletter-box text-center">
							<button class="btnDiscord  bg-gray" type="button"><a href="https://discord.gg/mYRGWAH"> Discord </a><i class="fa fa-long-arrow-right"> </i> </button>
						</div>
					</li>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
  </div>
</footer>

</body>



</html>
