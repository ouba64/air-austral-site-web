<?php
require_once("Dao.php");
require_once("util/Util.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Dans cette classe sont regroupées toutes les méthodes qui réalisent les 
 * règles de gestion de la compagnie aérienne, comme par exemple le calcul
 * du tarif d'une réservation
 *
 * @author Anais
 */
class Gestion {
    private $tarifParKm;
    private $surcoutAffaire;
    private $surcoutPremiere;
    
    public function calculerTarif(Place $place, Vol $vol){
        $ae1 = $vol->getAeDepart();
        $ae2 = $vol->getAeArrivee();
        $distance = Util::calculerDistance($ae1, $ae2);
        $classe = $place->getClasse();
       
        switch ($classe->getId()) {
            // économique
            case 1:
                $facteurClasse = 1;
                break;
            // affaire
            case 2:
                $facteurClasse = $this->surcoutAffaire;
                break;
            // première
            case 3:
                $facteurClasse = $this->surcoutPremiere;
                break;
        }      
        $prix = ($this->tarifParKm * $distance * $facteurClasse)/100;  
        return $prix;
    }
    
    public function debiterCompte($cb){
        return true;
    }
    
    /**
     * 
     * @param type $places
     * @param type $nbPlaces
     */
    public function choisirPlaces($toutesLesPlaces, $nbPlaces){
        $output = array_slice($toutesLesPlaces, 0, $nbPlaces); 
        return $output;
    }
    
    public static function afficherPrix($prix){
        return sprintf("%5.2f €", $prix);
    }
    
    /**
     * Cette fonction permet de contacter la banque et de vérifier que le
     * compte correspondant à la carte bancaire $cb existe et est valide.
     * @param type $cb
     * @return boolean
     */
    public static function verifierValiditeCb($cb){
        return true;
    }
    
    function setTarifParKm($tarifParKm) {
        $this->tarifParKm = $tarifParKm;
    }

    function setSurcoutAffaire($surcoutAffaire) {
        $this->surcoutAffaire = $surcoutAffaire;
    }

    function setSurcoutPremiere($surcoutPremiere) {
        $this->surcoutPremiere = $surcoutPremiere;
    }


}
