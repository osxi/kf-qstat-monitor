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
        <ul class="left">
          <li><a href="https://github.com/osxi/kf-qstat-monitor" class="github">kf-qstat-monitor on GitHub</a></li>
        </ul>
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
              <?php $map_name = $values[$v][$index[$v][MAP][0]][value] ?>
              <?php $img_url  = "http://image.www.gametracker.com/images/maps/160x120/killingfloor/" . strtolower(str_replace('-', '_', $map_name)).".jpg" // URL for non-404 map image ?>
              <?php $curl_handle = curl_init($img_url) // Create cURL handle ?>
              <?php curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE) ?>
              <?php $reponse = curl_exec($curl_handle) ?>
              <?php $http_code = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE) ?>
              <?php curl_close($curl_handle) // Release cURL handle ?>
              <legend><?php echo $map_name ?></legend>
              <?php if($http_code == 404) { ?>
                <img src="http://image.www.gametracker.com/images/maps/160x120/nomap.jpg" />
              <?php } else { ?>
                <img src="<?php echo $img_url ?>" />
              <?php } ?>
            </div>
            <div class="small-5 columns">
              <legend>Status</legend>
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
              <legend>Players</legend>
              <table>
                <tr>
                  <th>Player</th>
                  <th>Score</th>
                  <th>Ping</th>
                </tr>
                <?php $player_count = $values[$v][$index[$v][NUMPLAYERS][0]][value] ?>
                <?php for($i=1; $i<=$player_count; $i++) { ?>
                <tr>
                  <td><?php echo $values[$v][$index[$v][NAME][$i]][value] ?></td>
                  <td><?php echo $values[$v][$index[$v][SCORE][$i-1]][value] ?></td>
                  <td><?php echo $values[$v][$index[$v][PING][$i]][value] ?></td>
                </tr>
                <?php } ?>
                <?php if($player_count == 0) { ?>
                <tr>
                  <td colspan=3><strong>No players found.</strong></td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <div class="small-4 columns">
              <legend>Activity</legend>
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
