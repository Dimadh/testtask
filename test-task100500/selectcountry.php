<?php
require_once "../dateBase/dbconection.php";

    $countrySet = array();
    $resultSelect=$dbh->query('SELECT * from countries');
    $selectCountries = $resultSelect->fetchAll();

    foreach ($selectCountries as $selectCountry ) {
        array_push($countrySet, $selectCountry);
    }
    echo json_encode($countrySet);
