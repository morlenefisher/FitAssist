<?php
  $challenges = array(
    'abandsquats' => '30 Day Ab & Squat Challenge',
    'plank' => '30 Day Plank Challenge'
  );

if ($_POST) {
  require_once "./fitassist.php";
  $cal = new GenerateCal($_POST['challenge'], $_POST['start_date']);

}
?>

<!DOCTYPE html>
<html ng-app="FitAssist">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>FitAssist</title>
  <meta name="description" content="Put your fitness challenge in your calendar">
  <meta name="viewport" content="width=device-width">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="../js/script.js"></script>
</head>
<body>

<div class="main-container">
  <div class="main wrapper clearfix">

    <div>
      <h1 class="title">FitAssist Choose your workout and put it in your calendar</h1>
      <form name="30DayChooser" ng-click="/"  method="POST">
        <label for="chooseChallenge">Choose your challenge</label>
        <select name="challenge" class="challenge"  required>
          <?php
          foreach($challenges as $key => $challenge) {
            echo "<option value =$key >$challenge</option>";
          }
          ?>
        </select>
        <div>
          <label for="startDate">Choose the date to start</label>
          <input name="start_date" class="datepicker" size="16" type="text" value="12-02-2012">
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
        <button type="submit" class="submit">Generate Calender</button>
      </form>
    </div> <!-- #main -->
  </div> <!-- #main-container -->

</body>
</html>