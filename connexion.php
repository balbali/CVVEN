<?php

/**
 * Classe de connexion avec PDO
 * 
 * 
 */
class connexion extends PDO {

    /**
     *  Constructeur qui hérite du constructeur de la classe PDO
     */
    public function __construct( ) {
        $this->sgbd = 'mysql';
        $this->hote = 'localhost22';
        $this->bd = 'cv';
        $this->user = 'uti';
        $this->pass = '';
        $dsn = $this->sgbd.':dbname='.$this->bd.";host=".$this->hote;
        
        //Appel du constructeur parent
        parent::__construct($dsn, $this->user, $this->pass, array());
    } 
    
    
    
   /**
     * Fonction qui renvoie le nombre de réservation pour une personne
     * 
     * @todo Renvoyer la liste des réservations
     * 
     * @param int $jour
     * @param int $mois
     * @param int $annee
     * @param type $id
     * @return int
     */
    public function est_reserve_util($jour, $mois, $annee, $id)
    {
        $ma_date=$annee.'-'.$mois.'-'.$jour;
    
        $requete="Select COUNT(*) FROM reservation, utilisateur
                    WHERE '$ma_date' BETWEEN Date_Arrivee AND SUBDATE(Date_Depart,1)
                    AND reservation.idUtil=utilisateur.idUtil
                    AND Login='$id'" or die("erreur est_reserve");
        
        $resultat_requete=$this->query($requete);
        $resultat=$resultat_requete->fetchColumn();
        return $resultat;   
    } 
    
    
    
    /**
     * Fonction qui prend en paramètre une date et qui renvoie le nombre de réservations ce jour.
     * 
     * 
     * @param int $jour
     * @param int $mois
     * @param int $annee
     * @return int
     */
    public function est_reserve($jour, $mois, $annee)
    {
      
        $ma_date=$annee.'-'.$mois.'-'.$jour;
        
       
        
        $resultat_requete=$this->query($requete) or die("erreur est_reserve");
        $resultat=$resultat_requete->fetchColumn();
        
        return $resultat; 
    } 
    
    
    public function est_complet($jour, $mois, $annee)
    {
      
        $ma_date=$annee.'-'.$mois.'-'.$jour;
        
        //Nombre d'attributions de réservations pour une date
        $requete="Select COUNT(*) "
                . "FROM reservation r, attribuer_heberg a "
                . "WHERE '$ma_date' BETWEEN r.Date_Arrivee AND SUBDATE(r.Date_Depart,1)"
                . "AND r.idReserv=a.idReserv;";
        
        $resultat_requete=$this->query($requete) or die("erreur est_complet: $requete");
        $resultat=$resultat_requete->fetchColumn();
        
        
        //Nombre d'hébergements disponibles
        $requete2="Select COUNT(*) From hebergement";
        
        
        $resultat_requete2=$this->query($requete2) or die("erreur est_complet 2");
        $resultat2=$resultat_requete2->fetchColumn();
        
        return $resultat==$resultat2; 
    } 
   
}