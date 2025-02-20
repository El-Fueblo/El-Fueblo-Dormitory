<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable MySQL error reporting

if (isset($_POST['dbhost'])) {
    $dbhost = trim($_POST['dbhost']);
    $dbuser = trim($_POST['dbuser']);
    $dbpass = trim($_POST['dbpass']);
    $dbname = trim($_POST['dbname']);

    try {
        // Create database connection
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        // Check for connection errors
        if ($mysqli->connect_errno) {
            die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }

        // Store database details in session
        $_SESSION["dhpms_dbhost"] = $dbhost;
        $_SESSION["dhpms_dbuser"] = $dbuser;
        $_SESSION["dhpms_dbpass"] = $dbpass;
        $_SESSION["dhpms_dbname"] = $dbname;

        // Load SQL file and execute queries
        $sqlfile_path = "../assets/db/dhpms.sql";
        if (file_exists($sqlfile_path)) {
            $sqlfile = file_get_contents($sqlfile_path);
            if (!$mysqli->multi_query($sqlfile)) {
                die("Error importing SQL file: " . $mysqli->error);
            }
        } else {
            die("SQL file not found: $sqlfile_path");
        }

        // Update database configuration file
        $dbconfig_path = "../spymvc/config/database.php.lock";
        if (file_exists($dbconfig_path)) {
            $dbfile = file_get_contents($dbconfig_path);
            $dbdata = [
                '{{db_host}}' => $dbhost,
                '{{db_user}}' => $dbuser,
                '{{db_pass}}' => $dbpass,
                '{{db_name}}' => $dbname
            ];
            $dbfile = str_replace(array_keys($dbdata), $dbdata, $dbfile);
            file_put_contents($dbconfig_path, $dbfile);
            rename($dbconfig_path, "../spymvc/config/database.php");
        } else {
            die("Database configuration template not found.");
        }

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>El Fueblo Dormitory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/backend/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/backend/dist/css/font-awesome.min.css">
</head>
<body>

<div class="jumbotron text-center">
  <h1>El Fueblo Dormitory</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3>Admin User Settings (Create istration Account)</h3><hr/>
      <form action="step4.php" method="POST">
      <table class="table table-bordered">
      <tr>
        <td>Admin Email</td>
        <td><input type="email" class="form-control" name="user_email" required></td>
      </tr>
      <tr>
        <td>Admin Password</td>
        <td><input type="password" class="form-control" name="user_pass" required></td>
      </tr>
      </table>
      <input type="submit" class="btn btn-success" value="Submit">
      </form>
    </div>
  </div>
</div>

</body>
</html>
