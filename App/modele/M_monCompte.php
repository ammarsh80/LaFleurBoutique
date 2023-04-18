<?php

class M_monCompte
{
       /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $prenom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : INT
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValideModification($adresse, $complement, $cp, $ville, $mail, $telephone)
    {
        
        $erreurs = [];
            if ($adresse === "") {
            $erreurs[] = "Il faut saisir le champ adresse";
        }
       

        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        }
         else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } 
        else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        if ($complement == "") {
            $erreurs[] = "Il faut saisir le champ complement";
        } 
        if ($telephone == "") {
            $erreurs[] = "Il faut saisir le champ telephone";
        } 
        return $erreurs;
    }

}