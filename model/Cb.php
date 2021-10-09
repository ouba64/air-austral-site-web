<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cb
 *
 * @author Anais
 */
class Cb {

    //put your code here
    private $id;
    private $nom;
    private $numero;
    private $expiration;
    private $cvv;
    private $idClient;

    function getNom() {
        return $this->nom;
    }

    function getNumero() {
        return $this->numero;
    }

    function getExpiration() {
        return $this->expiration;
    }



    function setNom($nom) {
        $this->nom = $nom;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setExpiration($expiration) {
        $this->expiration = $expiration;
    }

    function getNomMasque() {
        return " XXXX-XXXX-XXXX-" . substr((string)$this->numero, -4)
                . " | " . $this->nom;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function getCvv() {
        return $this->cvv;
    }

    function setCvv($cvv) {
        $this->cvv = $cvv;
    }

    function getIdClient() {
        return $this->idClient;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }



}
