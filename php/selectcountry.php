<?php
require_once "dbconection.php";

    $country_set = array();
    $result_select=$dbh->query('SELECT * from countries');
    $select_countries = $result_select->fetchAll();

    foreach($select_countries as $select_country ){
        array_push($country_set, $select_country);
    }
    echo json_encode($country_set);
