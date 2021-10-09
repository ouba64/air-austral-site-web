<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vol
 *
 * @author Anais
 */
class Vol {

    //put your code here
    /** @var int */
    private $id;
    private $heureDepart;
    private $duree;
    private $nom;

    /**
     *
     */
    private $aeDepart;

    /**
     *
     */
    private $aeArrivee;
    private $idAvion;

    function getId() {
        return $this->id;
    }

    function getHeureDepart() {
        return $this->heureDepart;
    }

    function setHeureDepart($heureDepart) {
        $this->heureDepart = $heureDepart;
    }
    
    function getHeureArrivee() {
        if($this->heureDepart!=null){
            $hd = new DateTime();
            $hd->setTimestamp($this->heureDepart->getTimestamp());
            $heureArrivee = $hd->add($this->duree);
        }
        return $heureArrivee;
    }

    function getDuree() {
        return $this->duree;
    }

    function getNom() {
        return $this->nom;
    }

    function getAeDepart() {
        return $this->aeDepart;
    }

    function getAeArrivee() {
        return $this->aeArrivee;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDuree($duree) {
        $this->duree = $duree;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setAeDepart($aeDepart) {
        $this->aeDepart = $aeDepart;
    }

    function setAeArrivee($aeArrivee) {
        $this->aeArrivee = $aeArrivee;
    }
    function getIdAvion() {
        return $this->idAvion;
    }

    function setIdAvion($idAvion) {
        $this->idAvion = $idAvion;
    }


}
