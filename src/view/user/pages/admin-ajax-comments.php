<?php
/* [INIT] */
session_start();

// PROTECT THE ADMIN FUNCTIONS!
// E.G. CHECK IF ADMIN IS SIGNED IN
if (!$_SESSION['admin']) {
  die("ERR");
}

// LIBRARIES

$ajuste = "../../../../";


require "../../../../config/config.php";
require PATH_LIB . "lib-db.php";
require PATH_LIB . "lib-comments.php";
$pdo = new Comments();

/* [HANDLE AJAX REQUESTS] */
switch ($_POST['req']) {
  /* [INVALID REQUEST] */
  default:
    echo "ERR";
    break;

  /* [EDIT COMMENT] */
  case "edit":
    echo $pdo->edit($_POST['comment_id'], $_POST['name'], $_POST['message']) ? "OK" : "ERR";
    break;

  /* [DELETE COMMENT] */
  case "del":
    echo $pdo->delete($_POST['comment_id']) ? "OK" : "ERR";
    break;
}
?>