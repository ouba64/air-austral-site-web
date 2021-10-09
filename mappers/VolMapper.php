<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Permet de remplir les champs de l'objet Etudiant passé en parametres avec les 
 * valeurs obtenues de la db
 *
 * @author Anais
 */
class VolMapper {
    //put your code here
    public static function map($todo, $properties, $dao) {
        $name = 'id';
        if (array_key_exists($name, $properties)) {
            $todo->setId($properties[$name]);
        }
        $name = 'ae_depart';
        if (array_key_exists($name, $properties)) {
            $idAeroport = $properties[$name];
            $aeDepart = $dao->getAeroportById($idAeroport);
            $todo->setAeDepart($aeDepart);
        }
        $name = 'ae_arrivee';
        if (array_key_exists($name, $properties)) {
            $idAeroport = $properties[$name];
            $aeArrivee = $dao->getAeroportById($idAeroport);
            $todo->setAeArrivee($aeArrivee);
        }
        $name = 'heure_depart';
        if (array_key_exists($name, $properties)) {
            $dateString = $properties[$name];
            $date = new DateTime($dateString);
            $todo->setHeureDepart($date);
        }
        $name = 'duree';
        if (array_key_exists($name, $properties)) {
            $dateString = "PT$properties[$name]M";
            $duree = new DateInterval($dateString);
            $todo->setDuree($duree);
        }
        $name = 'nom';
        if (array_key_exists($name, $properties)) {
            $todo->setNom($properties[$name]);
        }
         $name = 'idAvion';
        if (array_key_exists($name, $properties)) {
            $todo->setIdAvion($properties[$name]);
        }
    }
}
