<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">

<style>
  
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section,
summary {
    display: block;
}

audio,
canvas,
video {
    display: inline-block;
}

audio:not([controls]) {
    display: none;
    height: 0;
}

[hidden] {
    display: none;
}

html {
    font-family: sans-serif; /* 1 */
    -ms-text-size-adjust: 100%; /* 2 */
    -webkit-text-size-adjust: 100%; /* 2 */
}


body {
    margin: 0;
}


a:focus {
    outline: thin dotted;
}


a:active,
a:hover {
    outline: 0;
}

h1 {
    font-size: 2em;
    margin: 0.67em 0;
}



abbr[title] {
    border-bottom: 1px dotted;
}



b,
strong {
    font-weight: bold;
}


dfn {
    font-style: italic;
}



hr {
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 0;
}



mark {
    background: #ff0;
    color: #000;
}



code,
kbd,
pre,
samp {
    font-family: monospace, serif;
    font-size: 1em;
}



pre {
    white-space: pre-wrap;
}



q {
    quotes: "\201C" "\201D" "\2018" "\2019";
}


small {
    font-size: 80%;
}


sub,
sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
}

sup {
    top: -0.5em;
}

sub {
    bottom: -0.25em;
}



img {
    border: 0;
}


svg:not(:root) {
    overflow: hidden;
}



figure {
    margin: 0;
}


fieldset {
    border: 1px solid #c0c0c0;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em;
}



legend {
    border: 0; /* 1 */
    padding: 0; /* 2 */
}



button,
input,
select,
textarea {
    font-family: inherit; /* 1 */
    font-size: 100%; /* 2 */
    margin: 0; /* 3 */
}



button,
input {
    line-height: normal;
}


button,
select {
    text-transform: none;
}



button,
html input[type="button"], /* 1 */
input[type="reset"],
input[type="submit"] {
    -webkit-appearance: button; /* 2 */
    cursor: pointer; /* 3 */
}


button[disabled],
html input[disabled] {
    cursor: default;
}



input[type="checkbox"],
input[type="radio"] {
    box-sizing: border-box; /* 1 */
    padding: 0; /* 2 */
}


input[type="search"] {
    -webkit-appearance: textfield; /* 1 */
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box; /* 2 */
    box-sizing: content-box;
}



input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
    -webkit-appearance: none;
}



button::-moz-focus-inner,
input::-moz-focus-inner {
    border: 0;
    padding: 0;
}



textarea {
    overflow: auto; /* 1 */
    vertical-align: top; /* 2 */
}



table {
    border-collapse: collapse;
    border-spacing: 0;
}
</style>

    <style>
@import "https://fonts.googleapis.com/css?family=Ubuntu:400,700italic";
@import "https://fonts.googleapis.com/css?family=Cabin:400";
* {
  box-sizing: border-box;
}

html {
  background: #000;
  background-size: cover;
  font-size: 10px;
  height: 100%;
  overflow: hidden;
  position: absolute;
  text-align: center;
  width: 100%;
}


#logo {
  animation: logo-entry 4s ease-in;
  width: 500px;
  margin: 0 auto;
  position: relative;
  z-index: 40;
}

h1 {
  animation: text-glow 2s ease-out infinite alternate;
  font-family: 'Ubuntu', sans-serif;
  color: #74ebe6;
  font-size: 48px;
  font-size: 4.8rem;
  font-weight: bold;
  position: absolute;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 40px #000, 0 0 50px #000, 0 0 60px #000, 0 0 70px #000;
  top: 50px;
}
h1:before {
  animation: before-glow 2s ease-out infinite alternate;
  border-left: 535px solid transparent;
  border-bottom: 10px solid #74ebe6;
  content: ' ';
  height: 0;
  position: absolute;
  right: -74px;
  top: -10px;
  width: 0;
}
h1:after {
  animation: after-glow 2s ease-out infinite alternate;
  border-left: 100px solid transparent;
  border-top: 16px solid #74ebe6;
  content: ' ';
  height: 0;
  position: absolute;
  right: -85px;
  top: 24px;
  transform: rotate(-47deg);
  width: 0;
}


#fade-box {
  animation: input-entry 3s ease-in;
  z-index: 4;
}

.stark-login form {
  animation: form-entry 3s ease-in-out;
  background: #111;
  background: linear-gradient(#74ebe6, #74ebe6);
  border: 6px solid #74ebe6;
  box-shadow: 0 0 15px #74ebe6;
  border-radius: 5px;
  display: inline-block;
  height: 220px;
  margin: 270px auto 0;
  position: relative;
  z-index: 4;
  width: 500px;
  transition: 1s all;
}
.stark-login form:hover {
  border: 6px solid #74ebe6;
  box-shadow: 0 0 25px #74ebe6;
  transition: 1s all;
}
.stark-login input {
  background: #222;
  background: linear-gradient(#333333, #222222);
  border: 1px solid #444;
  border-radius: 5px;
  box-shadow: 0 2px 0 #000;
  color: #888;
  display: block;
  font-family: 'Cabin', helvetica, arial, sans-serif;
  font-size: 13px;
  font-size: 1.3rem;
  height: 40px;
  margin: 20px auto 10px;
  padding: 0 10px;
  text-shadow: 0 -1px 0 #000;
  width: 400px;
}
.stark-login input:focus {
  animation: box-glow 1s ease-out infinite alternate;
  background: #0B4252;
  background: linear-gradient(#333933, #222922);
  border-color: #00fffc;
  box-shadow: 0 0 5px rgba(0, 255, 253, 0.2), inset 0 0 5px rgba(0, 255, 253, 0.1), 0 2px 0 black;
  color: #efe;
  outline: none;
}
.stark-login input:invalid {
  border: 2px solid  #00fffc;
  box-shadow: 0 0 5px rgba(255, 0, 0, 0.2), inset 0 0 5px rgba(255, 0, 0, 0.1), 0 2px 0 black;
}
.stark-login button {
  animation: input-entry 3s ease-in;
  background: #222;
  background: linear-gradient(#333333, #222222);
  box-sizing: content-box;
  border: 1px solid #444;
  border-left-color: #000;
  border-radius: 5px;
  box-shadow: 0 2px 0 #000;
  color: #fff;
  display: block;
  font-family: 'Cabin', helvetica, arial, sans-serif;
  font-size: 13px;
  font-weight: 400;
  height: 40px;
  line-height: 40px;
  margin: 20px auto;
  padding: 0;
  position: relative;
  text-shadow: 0 -1px 0 #000;
  width: 400px;
  transition: 1s all;
}
.stark-login button:hover,
.stark-login button:focus {
  background: #0C6125;
  background: linear-gradient(#393939, #292929);
  color: #00fffc;
  outline: none;
  transition: 1s all;
}
.stark-login button:active {
  background: #292929;
  background: linear-gradient(#393939, #292929);
  box-shadow: 0 1px 0 #000, inset 1px 0 1px #222;
  top: 1px;
}


#circle1 {
  animation: circle1 4s linear infinite, circle-entry 6s ease-in-out;
  background: #74ebe6;
  border-radius: 100%;
  border: 10px solid #74ebe6;
  box-shadow: 0 0 0 2px black, 0 0 0 6px #74ebe6;
  height: 500px;
  width: 500px;
  position: absolute;
  top: 120px;
  left: 50%;
  margin-left: -250px;
  overflow: hidden;
  opacity: 1.5;
  z-index: -3;
}

#inner-cirlce1 {
  background: #000;
  border-radius: 100%;
  border: 36px solid #74ebe6;
  height: 460px;
  width: 460px;
  margin: 10px;
}
#inner-cirlce1:before {
  content: ' ';
  width: 240px;
  height: 480px;
  background: #000;
  position: absolute;
  top: 0;
  left: 0;
}
#inner-cirlce1:after {
  content: ' ';
  width: 480px;
  height: 240px;
  background: #000;
  position: absolute;
  top: 0;
  left: 0;
}



.hexagons {
  animation: logo-entry 4s ease-in;
  /*background:url(http://fc03.deviantart.net/fs71/i/2012/237/c/7/jarvis_rainmeter_skin_by_ingwey-d5cc571.png);*/
  color: #000;
  font-size: 52px;
  font-size: 5.1rem;
  letter-spacing: -0.2em;
  line-height: 0.7;
  position: absolute;
  text-shadow: 0 0 6px #74ebe6;
  top: 1px;
  width: 100%;
  /*transform: perspective(60px)  scale(2.4);*/
  z-index: -3;
}


@keyframes logo-entry {
  0% {
    opacity: 0;
  }

  80% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@keyframes circle-entry {
  0% {
    opacity: 0;
  }

  20% {
    opacity: 0;
  }

  100% {
    opacity: 0.4;
  }
}

@keyframes input-entry {
  0% {
    opacity: 0;
  }

  90% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@keyframes form-entry {
  0% {
    height: 0;
    width: 0;
    opacity: 0;
    padding: 0;
  }

  20% {
    height: 0;
    border: 1px solid #00a4a2;
    width: 0;
    opacity: 0;
    padding: 0;
  }

  40% {
    width: 0;
    height: 220px;
    border: 6px solid #00a4a2;
    opacity: 1;
    padding: 0;
  }

  100% {
    height: 220px;
    width: 500px;
  }
}

@keyframes box-glow {
  0% {
    border-color: #00b8b6;
    box-shadow: 0 0 5px rgba(0, 255, 253, 0.2), inset 0 0 5px rgba(0, 255, 253, 0.1), 0 2px 0 black;
  }

  100% {
    border-color: #00fffc;
    box-shadow: 0 0 20px rgba(0, 255, 253, 0.6), inset 0 0 10px rgba(0, 255, 253, 0.4), 0 2px 0 black;
  }
}

@keyframes text-glow {
  0% {
    color: #00a4a2;
    text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 40px #000, 0 0 50px #000, 0 0 60px #000, 0 0 70px #000;
  }

  100% {
    color: #00fffc;
    text-shadow: 0 0 20px rgba(0, 255, 253, 0.6), 0 0 10px rgba(0, 255, 253, 0.4), 0 2px 0 black;
  }
}

@keyframes before-glow {
  0% {
    border-bottom: 10px solid #00a4a2;
  }

  100% {
    border-bottom: 10px solid #00fffc;
  }
}

@keyframes after-glow {
  0% {
    border-top: 16px solid #00a4a2;
  }

  100% {
    border-top: 16px solid #00fffc;
  }
}

@keyframes circle1 {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}



</style>
<head>
    <title>Admin-Login</title>  
  <meta charset="UTF-8">
<script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div id="logo"> 
  <h1><i> E-HEALTH CARE SYSTEM </i></h1>

</div> 
<section class="stark-login">

  <form class="form-login" method="post">
    <div id="fade-box">
    <fieldset>
              
              <div class="form-group">
                <span class="input-icon">
                  <input type="text" class="form-control" name="username" placeholder="Username">
                  <i class="fa fa-user"></i> </span>
              </div>
              <div class="form-group form-actions">
                <span class="input-icon">
                  <input type="password" class="form-control password" name="password" placeholder="Password"><i class="fa fa-lock"></i>
                   </span>
              </div>
              <div class="form-actions">
                
                <button type="submit" class="btn btn-primary pull-right" name="submit">
                  Login <i class="fa fa-arrow-circle-right"></i>
                </button>
              </div>

          
            </fieldset>
         </div>
            
        
      </form>





      <div class="hexagons">
        
                 <img src="https://www.pixelstalk.net/wp-content/uploads/images1/Images-Medical-Download.jpg" height="1000px" width="1950px"/> 
              </div>      
            </section> 

            <div id="circle1">
              <div id="inner-cirlce1">
                <h2> </h2>
              </div>
            </div>

            <ul>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>

  <script src='https://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>