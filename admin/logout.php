<?php

session_start();

unset($_SESSION["id"]);

unset($_SESSION["username"]);

unset($_SESSION["positionname"]);

header("location:index.php");

?>