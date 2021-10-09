<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe d'utilitaires
 *
 * @author Anais
 */
class Util {
    public static function calculerDistance(Aeroport $a1, Aeroport $a2){
        $lat1 = $a1->getLatitude();
        $long1 = $a1->getLongitude();

        $lat2 = $a2->getLatitude();;
        $long2 = $a2->getLongitude();

        $theta = $long1 - $long2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $distance = ($miles * 1.609344);
        return $distance;
    }   
}
