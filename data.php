<?php

$jsondata = file_get_contents("https://pomber.github.io/covid19/timeseries.json");
$data = json_decode($jsondata, true); //true converts object into associative array

foreach($data as $key => $value){
    $days_count = count($value)-1;
    $days_count_prev = $days_count -1;
}

$total_confirmed = 0;
$total_recovered = 0;
$total_deceased = 0;

foreach($data as $key => $value){
    $total_confirmed= $total_confirmed + $value[$days_count]['confirmed'];
    $total_recovered= $total_recovered + $value[$days_count]['recovered'];
    $total_deceased= $total_deceased + $value[$days_count]['deaths'];
}

?>