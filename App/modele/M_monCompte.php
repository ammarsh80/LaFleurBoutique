<?php

/**
 * Vérifications des ifnos saisis pour modification les infos personnelles du client
 */
class M_monCompte
{
    /**
     *     
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param [chaine] $adresse
     * @param [chaine] $complement
     * @param [int] $cp
     * @param [chaine] $ville
     * @param [chaine] $mail
     * @param [int] $telephone
     * @return : array
     */
    public static function estValideModification($adresse, $complement, $cp, $ville, $mail, $telephone)
    {

        $erreurs = [];
        if ($adresse === "") {
            $erreurs[] = "Il faut saisir le champ adresse";
        } else if (!estUntextEtChiffre44($adresse)) {
            $erreurs[] = "erreur d'adresse, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }

        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        } else if (!estUntextEtChiffre44($ville)) {
            $erreurs[] = "erreur de ville, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        if ($complement == "") {
            $erreurs[] = "Il faut saisir le champ complement";
        } else if (!estUntextEtChiffre44($complement)) {
            $erreurs[] = "erreur de complement d'adresse, veuillez saisir du text seulement (accents acceptés), les chiffre sont acceptée aussi";
        }

        if ($telephone == "") {
            $erreurs[] = "Il faut saisir le champ telephone";
        } else if (!estTelephone($telephone)) {
            $erreurs[] = "erreur de telephone, veuillez saisir des chiffres entiers";
        }

        return $erreurs;
    }
}
