<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Place {
    //put your code here
        /** @var int */
    private $id;
    private $idAvion;
    private $idClasse;
    private $classe;
    private $numero;
    
    function __construct($id, $idAvion, $idClasse, $numero) {
        $this->id = $id;
        $this->idAvion = $idAvion;
        $this->idClasse = $idClasse;
        $this->numero = $numero;
    }

    
    function getId() {
        return $this->id;
    }

    function getIdAvion() {
        return $this->idAvion;
    }

    function getIdClasse() {
        return $this->idClasse;
    }

    function getNumero() {
        return $this->numero;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdAvion($idAvion) {
        $this->idAvion = $idAvion;
    }

    function setIdClasse($idClasse) {
        $this->idClasse = $idClasse;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function getClasse() {
        return $this->classe;
    }

    function setClasse($classe) {
        $this->classe = $classe;
    }



}
