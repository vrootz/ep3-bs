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
$newuid = $_POST['newuid'];

echo '<h2><i>Submitted new UID: <b>"'.$newuid.'"</b></i></h2><br>';
?>

<html>
<body>
Input new UID to replace with the old once.<br><br>
<div class="search">
  <form method="post">
      <input type="text" value="<?php echo $olduid; ?>" name="olduid" readonly>
      <input type="text" value="<?php echo $newuid; ?>" name="newuid" readonly>
  </form>
</div>
<br><br>
</body>
</html>


<?php
if (isset($_POST["submit"])) {
  if ((!empty($_REQUEST['newuid'])) && (!empty($olduid))) {
    #echo '<h4>Replacing "'.$olduid.'" with "'.$newuid.'"';

    $sqlold1 = ("SELECT * FROM bs_bookings WHERE uid = '".$olduid."'");

    $result = $db->query($sqlold1);
    echo '<h2><i><b>SQL Replace #1 - Replace old UID with Placeholder UID "1" for all Bookings</b></i></h2>';
    echo '<h3>SQL old query:</h3>'.$sqlold1.'<br><h3>SQL old UID result:</h3>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '"'.print_r($row).'"';
      echo '</div>';
    }

    $sqlreplace1 = ("UPDATE bs_bookings SET uid = 1 WHERE uid = '".$olduid."'");

    $result = $db->query($sqlreplace1);
    echo '<h3>SQL replace query:</h3>'.$sqlreplace1.'';

    $sqlnew1 = ("SELECT * FROM bs_bookings WHERE uid = 1");

    $result = $db->query($sqlnew1);
    echo '<h3>SQL placeholder query:</h3>'.$sqlnew1.'<br><h3>SQL placeholder UID result:</h3>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '"'.print_r($row).'"';
      echo '</div>';
    }

#############
    $sqlold2 = ("SELECT * FROM bs_users WHERE uid = '".$olduid."'");

    $result = $db->query($sqlold2);
    echo '<br><h2><i><b>SQL Replace #2 - Replace old UID with new UID for specific User</b></i></h2>';
    echo '<h3>SQL old query:</h3>'.$sqlold2.'<br><h3>SQL old UID result:</h3>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '"'.print_r($row).'"';
      echo '</div>';
    }

    $sqlreplace2 = ("UPDATE bs_users SET uid = '".$newuid."' WHERE uid = '".$olduid."'");

    $result = $db->query($sqlreplace2);
    echo '<h3>SQL replace query:</h3>'.$sqlreplace2.'';

    $sqlnew2 = ("SELECT * FROM bs_users WHERE uid = '".$newuid."'");

    $result = $db->query($sqlnew2);
    echo '<h3>SQL new query:</h3>'.$sqlnew2.'<br><h3>SQL new UID result:</h3>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '"'.print_r($row).'"';
      echo '</div>';
    }

#############
    $sqlold3 = ("SELECT * FROM bs_bookings WHERE uid = 1");

    $result = $db->query($sqlold3);
    echo '<br><h2><i><b>SQL Replace #3 - Replace Placeholder UID "1" with new UD for all Bookings</b></i></h2>';
    echo '<h3>SQL old query:</h3>'.$sqlold3.'<br><h3>SQL old UID result:</h3>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '"'.print_r($row).'"';
      echo '</div>';
    }

    $sqlreplace3 = ("UPDATE bs_bookings SET uid = '".$newuid."' WHERE uid = 1");

    $result = $db->query($sqlreplace3);
    echo '<h4>SQL replace query:</h3>'.$sqlreplace3.'';

    $sqlnew3 = ("SELECT * FROM bs_bookings WHERE uid = '".$newuid."'");

    $result = $db->query($sqlnew3);
    echo '<h3>SQL new query:</h3>'.$sqlnew3.'<br><h3>SQL new UID result:</h3>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '"'.print_r($row).'"';
      echo '</div>';
    }

#############
    echo '<br><h2><i><b>SQL Replace #4 - Replace old UID with new UID for specific User Meta Data</b></i></h2>';
    echo '<h3>Normally this should be changed after new UID in bs_users automaticaly, but to be sure we search and replace anyway.</h3>';
    #$sqlold4 = ("SELECT * FROM bs_users_meta WHERE uid = '".$olduid."' ORDER BY umid");

    #$result = $db->query($sqlold4);
    #echo '<h2><i><b>SQL Replace #4 - Replace old UID with new UID for specific User Meta Data</b></i></h2>';
    #echo '<h3>SQL old query:</h3>'.$sqlold4.'<br><h3>SQL old UID result:</h3>';  
    #while($row = $result->fetch()) {
    #  echo '<div>';
    #  echo '"'.print_r($row).'"';
    #  echo '</div>';
    #}

    $sqlreplace4 = ("UPDATE bs_users_meta SET uid = '".$newuid."' WHERE uid = '".$olduid."'");

    $result = $db->query($sqlreplace4);
    echo '<h3>SQL replace query:</h3>'.$sqlreplace4.'';

    $sqlnew4 = ("SELECT * FROM bs_users_meta WHERE uid = '".$newuid."' ORDER BY umid");

    $result = $db->query($sqlnew4);
    echo '<h3>SQL new query:</h3>'.$sqlnew4.'<br><h3>SQL new UID result:</h3>';  
    while($row = $result->fetch()) {
      echo '<div>';
      echo '"'.print_r($row).'"';
      echo '</div>';
    }  
  }
  else {
    echo '<h2 style="color: rgba(139, 0, 0, 0.3)";><i>ERROR: First search for old UID before replacing entries!</i></h2>';
  }
}
?>
