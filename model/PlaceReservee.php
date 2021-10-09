<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PlaceReservee {

    //put your code here
    /** @var int */
    private $id;
    private $idClient;
    private $idVol;

    function __construct($id, $idClient, $idVol) {
        $this->id = $id;
        $this->idClient = $idClient;
        $this->idVol = $idVol;
    }

    function getIdClient() {
        return $this->idClient;
    }

    function getIdVol() {
        return $this->idVol;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    function setIdVol($idVol) {
        $this->idVol = $idVol;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
}
