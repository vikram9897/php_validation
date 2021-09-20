<?php
  session_start();
  if(!$_SESSION['username']){
    header('location:login.php');
  }
  ?>
<!DOCTYPE html>
<html>
    
    <head>
    <title>Home page</title>
        <?php include 'links.php' ?>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
    <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="#">WebSiteName</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#">Home  </a></li>
                    <li class="nav-item"><a href="#">Page 1  </a></li>
                    <li class="nav-item"><a href="#">Page 2  </a></li>
                    <li class="nav-item"><a href="logout.php">Logout</a></li>
                    </ul>
                    </div>
                </div>
            </nav>
    </header>
        <div id="container">
        <div id="content">
            <div id="about">
                <h1>
                <div style='float:left; margin-bottom:20px;'>
                Welcome...!
                </div>
                <div class="stage">
                <div class="pyramid3d">
                    <div class="triangle side1"></div>
                    <div class="triangle side2"></div>
                    <div class="triangle side3"></div>
                    <div class="triangle side4"></div>
                </div>
                </div> 
            </h1>
            <h5 style='clear:both' class="subhead">
                <a href="https://plus.google.com/108495471566196018473/posts"><?php echo $_SESSION['username']; ?></a> is an enthusiastic, young, self-taught web applications developer currently studying at the University of Georgia.
            </h5>
            <p id='pleft'>
                He does freelance work, writes for <a href="https://css-tricks.com/css-animation-tricks/">CSS</a> <a href="https://css-tricks.com/controlling-css-animations-transitions-javascript/">Tricks</a>, worked at <a href="http://deltadatasoft.com/">Delta Data Software</a> as a front-end developer, and is continuously working on personal projects to up his game.
            </p>
            <p id='pright'>
                Look for some of his work &amp; experiments on <a href="https://codepen.io/Zeaklous">CodePen</a>, <a href="http://stackoverflow.com/users/2065702/zeaklous">StackOverflow</a>, <a href="https://cssdeck.com/user/Zeaklous">CSS Deck</a>, or a bit of his recent work below.
            </p>
            <ul>
                <li><a href="https://cssdeck.com/labs/css-only-full-page-slider">CSS Only Full Page Slider</a></li>
                <li><a href="https://codepen.io/Zeaklous/pen/alpEm">CSS3 Circular Questionnaire (Plugin in development)</a></li>
                <li><a href="https://zachsaucier.com/TumblrBook.html">TumblrBook</a></li>
            </ul>
            <p>
                Feel free to contact him at zachsaucier[at]gmail.com if you'd like for him to work for you!
            </p>
            </div>
        </div>
        </div>
    </body>
</html>
