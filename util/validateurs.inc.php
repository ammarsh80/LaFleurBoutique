<?php

/*
 * Fonctions de validations
 */

/**
 * teste si une chaîne a un format de code postal
 *
 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
 * @param $codePostal : la chaîne testée
 * @return : vrai ou faux
 */
function estUnCp($codePostal) {
    return strlen($codePostal) == 5 && estEntier($codePostal);
}

/**
 * teste si une chaîne est un entier
 *
 * Teste si la chaîne ne contient que des chiffres
 * @param $valeur : la chaîne testée
 * @return : vrai ou faux
 */
function estEntier($valeur) {
    return preg_match("/[^0-9]/", $valeur) == 0;
}

/**
 * Teste si une chaîne a le format d'un mail
 *
 * Utilise les expressions régulières
 * @param $mail : la chaîne testée
 * @return : vrai ou faux
 */
function estUnMail($mail) {
    return preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
}
function estUnPwd($psw) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $psw);
}
// function estUnMot($recherche_mot) {
//     return preg_match('^[a-zA-Z]+$/', $recherche_mot);
// }

function estUnMot($recherche_mot) {

    
    if (!isset($recherche_mot)) {
        return true;
    }
   else if (isset($recherche_mot)) {
        return preg_match('/^[a-zA-Z]+$/', $recherche_mot);
    } 

}

