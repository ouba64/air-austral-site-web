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
class PaysMapper {
    //put your code here
    public static function map($pays, $properties, $dao) {
        $name = 'id';
        if (array_key_exists($name, $properties)) {
            $pays->setId($properties[$name]);
        }
        $name = 'nom';
        if (array_key_exists($name, $properties)) {
            $pays->setNom($properties[$name]);
        }
    }
}
