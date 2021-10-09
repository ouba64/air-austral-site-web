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
class CbMapper {
    //put your code here
    public static function map($todo, $properties, $dao) {
        $name = 'id';
        if (array_key_exists($name, $properties)) {
            $todo->setId($properties[$name]);
        }
        $name = 'nom';
        if (array_key_exists($name, $properties)) {
            $todo->setNom($properties[$name]);
        }
        $name = 'numero';
        if (array_key_exists($name, $properties)) {
            $todo->setNumero($properties[$name]);
        }
        $name = 'expiration';
        if (array_key_exists($name, $properties)) {
            $todo->setExpiration($properties[$name]);
        }
        $name = 'cvv';
        if (array_key_exists($name, $properties)) {
            $todo->setCvv($properties[$name]);
        }
        $name = 'idClient';
        if (array_key_exists($name, $properties)) {
            $todo->setIdClient($properties[$name]);
        }
    }
}
