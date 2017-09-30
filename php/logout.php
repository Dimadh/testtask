<?php
require_once "dbconection.php";
unset($_SESSION['loged_user']);
header('Location: index.php');