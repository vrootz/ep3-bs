<?php
ob_start();
session_start();

//database credentials
define('DBHOST','db.mein-hoster.de');
define('DBUSER','USER-123456');
define('DBPASS','t3nn1s!');
define('DBNAME','DB123456');

$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$olduid = $_POST['olduid'];

echo '<h2><i>Submitted UID: <b>"'.$olduid.'"</b></i></h2><br>';
?>

<html>
<body>
Input new UID to replace with the old once.<br><br>
<div class="search">
  <form action="replace.php" method="post">
      <input type="text" value="<?php echo $olduid; ?>" name="olduid" readonly>
      <input type="text" placeholder="New UID..." name="newuid">
      <button type="submit" name ="submit">Submit</button>
  </form>
</div>
<br><br>
</body>
</html>


<?php
if (isset($_POST["submit"])) {
  if (!empty($_REQUEST['olduid'])) {
    
    $sql1 = ("SELECT * FROM bs_users WHERE uid = '".$olduid."'");

    $result = $db->query($sql1);
    echo '<h2><i><b>SQL Search #1</b></i></h2>';
    echo '<h4>SQL query:</h4>'.$sql1.'<br><h4>SQL result:</h4>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '<h4>SQL result:</h4>"'.print_r($row).'"';
      echo '</div>';
    }

    $sql2 = ("SELECT * FROM bs_users_meta WHERE uid = '".$olduid."' ORDER BY umid");

    $result = $db->query($sql2);
    echo '<h2><i><b>SQL Search #2</b></i></h2>';
    echo '<h4>SQL query:</h4>'.$sql2.'<br><h4>SQL result:</h4>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '<h4>SQL result:</h4>"'.print_r($row).'"';
      echo '</div>';
    }

    $sql3 = ("SELECT * FROM bs_bookings WHERE uid = '".$olduid."' ORDER BY bid");

    $result = $db->query($sql3);
    echo '<h2><i><b>SQL Search #3</b></i></h2>';
    echo '<h4>SQL query:</h4>'.$sql3.'<br><h4>SQL result:</h4>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '<h4>SQL result:</h4>"'.print_r($row).'"';
      echo '</div>';
    }
  }
  else {
    echo '<h2 style="color: rgba(139, 0, 0, 0.3)";><i>ERROR: Empty search request!</i></h2>';
  }
}
?>
