<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("Dao.php");
require_once("util/Util.php");
require_once("model/Aeroport.php");
/*

$dao =Dao::getDao();

$criteres['depart'] = '1';
$criteres['arrivee'] = '2';
$criteres['date_depart'] = '2019-06-05';
$criteres['nb_personnes'] = 1;
#$criteres['animaux_autorises'];
$criteres['classe'] = 2;
$vols = $dao->getVols($criteres);
$classe = $criteres['classe'];
$placesTotalesDisponibles = $dao->getPlacesDisponiblesPourLesVols($vols, $classe);
$i=0;
*/


/*
$ae = new Aeroport();
$distance = Util::calculerDistance($ae, $ae);
echo($distance);
*/
// CDG et Rolland Garos
//         $latitudeFrom = '49.010014';
//        $longitudeFrom = '2.547646';
//        $latitudeTo = '-20.89304';
//        $longitudeTo = '55.514034';


// google maps: distance 
// Distance totale : 9370,01 km 
// notre formule:    9369,63 km


$dt = new DateTime();
$dt->add(new DateInterval('PT200M'));
$interval = $dt->diff(new DateTime());
echo $interval->format('%Hh %Im %Ss');
echo $interval->format("%H  %I");