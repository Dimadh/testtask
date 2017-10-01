<?php
require_once "../dateBase/dbconection.php";

    //Select countries from database
    $countrySet = array();
    $resultSelect=$dbh->query('SELECT * from countries');
    $selectCountries = $resultSelect->fetchAll();

    foreach ($selectCountries as $selectCountry ) {
        echo "<option value = '".$selectCountry['id']."'>".$selectCountry['country']."</option>";
    }
