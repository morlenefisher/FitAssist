<!DOCTYPE html>
<?php
require_once "../inc/uuid.php";
$uuid =  UUID::v4();

if ($_POST) {

  require_once "../inc/uuid.php";
  require_once "../inc/fitassist.php";
  $cal = new FitAssist($_POST['challenge'], $_POST['start_date']);

}
?>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>FitAssist | Workouts on your phone</title>
  <meta name="description" content="Get your daily workouts in your own phone, tablet or computer calendar">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }
  </style>

  <link href="css/datepicker.css" rel="stylesheet">
  <style>
    .container {
      background: #fff;
    }

    #alert {
      display: none;
    }
  </style>
  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">FitAssist | BlueDragon</a>
    </div>
    <div class="navbar-collapse collapse">
      <form class="navbar-form navbar-right" role="form">
        <div class="form-group">
          <input type="text" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
      </form>
    </div>
    <!--/.navbar-collapse -->
  </div>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1>Welcome to FitAssist!</h1>

    <h2>Your workouts in Your diary, take your workouts anywhere</h2>

    <p>It's as easy as 1-2-3.</p>
    <ol>
      <li>Choose your workout</li>
      <li>Choose your start date and time for alarm</li>
      <li>Click on <strong>Download</strong> to get the file that opens in your calender application</li>
    </ol>
    <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
  </div>
</div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-4">
      <h2>30 Day Plank</h2>
      <h4>Source: <a href="http://30dayfitnesschallenges.com/30-day-plank-challenge">30 Day Fitness Challenges</a></h4>

      <p>Take up this 30 day plank challenge this month and tone up and boost your core muscles to the max.</p>
      <!--          <p><a class="btn btn-default" href="#" role="button">Generate &raquo;</a></p>-->
      <form name="30DayChooser" ng-click="/" method="POST">
        <input type="hidden" name="challenge" value="30dayplank"/>

        <div class="input-append date" id="dp1" data-date="<?php echo date('d M Y') ?>" data-date-format="dd-mm-yyyy">
          <label>Choose start date</label>
          <input class="span2" size="16" type="text" value="<?php echo date('d M Y') ?>">
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
        <button class="btn btn-success" type="submit" class="submit">Download</button>
      </form>
    </div>
    <div class="col-md-4">
      <h2>30 Day Abs and Squats</h2>
      <h4>Source: <a href="http://30dayfitnesschallenges.com/30-day-plank-challenge">30 Day Fitness Challenges</a></h4>

      <p>Take up this 30 day abs and squat challenge this month and tone up and boost your core, leg and butt muscles
        and body strength to the max.</p>
      <!--          <p><a class="btn btn-default" href="#" role="button">Generate &raquo;</a></p>-->
      <form name="30DayChooser" ng-click="/" method="POST">
        <input type="hidden" name="challenge" value="30dayabsandsquats"/>

        <div class="input-append date" id="dp2" data-date="<?php echo date('d M Y') ?>" data-date-format="dd-mm-yyyy">
          <label>Choose start date</label>
          <input class="span2" size="16" type="text" value="<?php echo date('d M Y') ?>">
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
        <button class="btn btn-success" type="submit" class="submit">Download</button>
      </form>
    </div>
    <div class="col-md-4">
      <h2>30 Day Beach Body</h2>
      <h4>Source: <a href="http://30dayfitnesschallenges.com/30-day-plank-challenge">30 Day Fitness Challenges</a></h4>

      <p>Take up this 30 day beach body challenge and get an over all body workout, which will make you look super hot
        when you are sunbathing on the beach!.</p>
      <!--          <p><a class="btn btn-default" href="#" role="button">Generate &raquo;</a></p>-->
      <form name="30DayChooser" ng-click="/" method="POST">
        <input type="hidden" name="challenge" value="30daybeachbody"/>

        <div class="input-append date" id="dp3" data-date="<?php echo date('d M Y') ?>" data-date-format="dd-mm-yyyy">
          <label>Choose start date</label>
          <input class="span2" size="16" type="text" value="<?php echo date('d M Y') ?>">
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
        <button class="btn btn-success" type="submit" class="submit">Download</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h2>Are you a personal trainer, fitness coach or Physiotherapist?</h2>
      <h3>Get FitAssist for your clients</h3>
      <p>Help your clients back to health by providing them with a simple way to get their
      exercise plans on their computer, tablets or phones direct from your website</p>
      <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
    </div>
    <div class="col-md-6">
      <h2>Sign up for more training plans</h2>
      <ul>
        <li>Plans for runners</li>
        <li>Swim training</li>
        <li>Cycling</li>
        <li>Return to fitness</li>
      </ul>
      <form name="AddCoupon" ng-click="/" method="POST" role="form">
        <div class="form-group">
          <input name="code" type="text" placeholder="Your name" class="form-control">
        </div>

        <div class="form-group">
          <input name="email" type="email" placeholder="Email address" class="form-control">
        </div>
        <div class="form-group">
          <input name="agree" type="checkbox" value="Agree" class="form-control">I agree to your <a href="#">terms and conditions</a>
        </div>

        <input name='uuid' type="hidden" value="<?php $uuid;?>">
        <button type="submit" class="btn btn-success">Sign up</button>
      </form>
    </div>
  </div>


  <hr>

  <footer>
    <p>&copy; Ashley Lawrence Ltd 2014</p>
  </footer>
</div>
<!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/bootstrap-datepicker.js"></script>
<script src="js/vendor/holder/holder.js"></script>

<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  (function (b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
      function () {
        (b[l].q = b[l].q || []).push(arguments)
      });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = '//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
  }(window, document, 'script', 'ga'));
  ga('create', 'UA-XXXXX-X');
  ga('send', 'pageview');
</script>
</body>
</html>
