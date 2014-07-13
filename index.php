<?php include('xml_parse.php'); // Load variables from parsed XML files ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Killing Floor Monitor</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/overrides.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="/stats/#">KF Monitor</a></h1>
        </li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li class="active"><a href="#">Monitor Home</a></li>
          <li><a href="http://txchainsaw.net">TXCMT Home</a></li>
        </ul>
      </section>
    </nav> 

    <div id="main">
      <?php foreach ([0, 1, 2, 3, 4] as $v) { ?>
        <fieldset>
          <legend><?php echo $values[$v][$index[$v][NAME][0]][value]; ?></legend>
          <div class="row">
            <div class="small-3 columns">
              <img src="http://image.www.gametracker.com/images/maps/160x120/killingfloor/<?php echo strtolower(str_replace('-', '_', $values[$v][$index[$v][MAP][0]][value])) ?>.jpg" />
            </div>
            <div class="small-5 columns">
              <table>
                <tr>
                  <th>Status</th>
                  <th>Port</th>
                  <th>Map</th>
                  <th>Players</th>
                </tr>
                <tr>
                  <td><img src="/stats/img/<?php echo $values[$v][$index[$v][SERVER][0]][attributes][STATUS] == "UP" ? 'green' : 'red' ?>.png" class="status-indicator" /></td>
                  <td><?php echo split(':', $values[$v][$index[$v][SERVER][0]][attributes][ADDRESS])[1] ?></td>
                  <td><?php echo $values[$v][$index[$v][MAP][0]][value] ?></td>
                  <td><?php echo $values[$v][$index[$v][NUMPLAYERS][0]][value].'/'.$values[$v][$index[$v][MAXPLAYERS][0]][value] ?></td>
                </tr>
              </table>
            </div>
            <div class="small-4 columns">
              Graph goes here.
            </div>
          </div>
        </fieldset>
      <?php } // end foreach ?>
    </div> <!-- end #main -->
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
