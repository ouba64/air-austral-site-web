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
class Aeroport {
    //put your code here
        /** @var int */
    private $id;
    private $nom;
    private $pays;
    private $longitude;
    private $latitude;

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPays() {
        return $this->pays;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPays($pays) {
        $this->pays = $pays;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }



}
