<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Etudiant
 *
 * @author Anais
 */
class Classe {
    //put your code here
        /** @var int */
    private $id;
    private $nom;


    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }




    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }




}
