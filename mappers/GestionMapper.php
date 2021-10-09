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
class GestionMapper {
    //put your code here
    public static function map($todo, $properties, $dao) {

        $name = 'tarifkm';
        if (array_key_exists($name, $properties)) {
            $todo->setTarifParKm($properties[$name]);
        }
        $name = 'surcout_affaire';
        if (array_key_exists($name, $properties)) {
            $todo->setSurcoutAffaire($properties[$name]);
        }
        $name = 'surcout_premiere';
        if (array_key_exists($name, $properties)) {
            $todo->setSurcoutPremiere($properties[$name]);
        }
    }
}
