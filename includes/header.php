<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

    <title>OppMar Web Admin</title>

    <!-- Custom styles for this template -->
    <link href="includes/bootstrap/css/jumbotron-narrow.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="//code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/7e2c36aa11.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

    <!-- Color Chooser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">

    <?php require_once('includes/database.php'); ?>

  </head>

  <body>
<body>

        <!-- Mobile Menu -->
      <div class="mobile">
        <h3 class="pull-left mobilelogo"><a href="index.php"><?php echo APP_NAME; ?></a></h3>
        <i class="fa fa-bars fa-2x pull-right" aria-hidden="true"></i>
      </div>

      <div id="mobilemenu">
            <nav>
              <ul class="nav nav-pills nav-stacked">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="categories.php">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="stats.php">Stats</a></li>
                <li class="nav-item"><a class="nav-link" href="userstory.php">User Story</a></li>
              </ul>
            </nav>
        </div>

    <div class="container" style="padding:5px;">

    <!--  Desktop Menu -->
      <div class="desktop header clearfix">
        <h3 class="pull-left desktoplogo"><a href="index.php"><?php echo APP_NAME; ?></a></h3>
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="categories.php">Categories</a></li>
            <li role="presentation"><a href="stats.php">Stats</a></li>
            <li role="presentation"><a href="userstory.php">User Story</a></li>
          </ul>
        </nav>
      </div>
    
      <div class="row marketing">
        <div class="col-lg-12">
        <?php if(isset($_GET['msg'])) {
		echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">'.$_GET['msg'].'</div>';
	}
	
	?>