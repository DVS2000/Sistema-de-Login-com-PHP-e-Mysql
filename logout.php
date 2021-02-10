<?php


session_start();
session_unset();
session_destroy();
header('locatio:  index.php');