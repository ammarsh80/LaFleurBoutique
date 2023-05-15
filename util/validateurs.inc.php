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
function estUnCp($codePostal)
{
    return strlen($codePostal) == 5 && estEntier($codePostal);
}

/**
 * teste si une chaîne est un entier
 *
 * Teste si la chaîne ne contient que des chiffres
 * @param $valeur : la chaîne testée
 * @return : vrai ou faux
 */
function estEntier($valeur)
{
    return preg_match("/[^0-9]/", $valeur) == 0;
}

/**
 * test si c'est un numéro de téléphone
 *
 * @param [type] $numero
 * @return : vrai ou faux
 */
function estTelephone($numero)
{
    return preg_match('/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/', $numero);
}

/**
 * Teste si une chaîne a le format d'un mail
 *
 * Utilise les expressions régulières
 * @param $mail : la chaîne testée
 * @return : vrai ou faux
 */
function estUnMail($mail)
{
    return preg_match('/^(?=.{1,44}$)[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/', $mail);
}


/**
 * test si le texte est que des lettre avec ou sans accents
 *
 * @param [type] $nom
 * @return : vrai ou faux
 */
function estUntext($nom)
{
    return preg_match('/^(?=.{2,44}$)[a-zA-ZÀ-ÖØ-öø-ÿàçéîïôöêù\s_-]*$/u', $nom);
}

/**
 * test si le texte est que des lettre avec ou sans accents, chiffre acceptés (1000 carachtères)
 *
 * @param [type] $message_contacte
 * @return : vrai ou faux
 */
function estUntextEtChiffre($message_contacte)
{
    return preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿàçéîïôöêù0-9\s_\-\.,!?]{2,1000}$/u', $message_contacte);
}


/**
 * test si le texte est que des lettres avec ou sans accents chiffre acceptés
 *
 * @param [type] $adresse
 * @return test si le texte est que des lettre avec ou sans accents
 */
function estUntextEtChiffre44($adresse)
{
    return preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿàçéîïôöêù0-9\s_-]{2,44}$/u', $adresse);
}

/**
 * test si c'est un mot de passe valide
 *
 * @param [type] $psw
 * @return : vrai ou faux
 */
function estUnPwd($psw)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,14}$/', $psw);
}

/**
 * test si c'est un numéro de carte bancaire (15 ou 16 caractères)
 *
 * @param [type] $carte
 * @return : vrai ou faux
 */
function estEntierCarte($carte)
{
    return preg_match('/^[0-9]{15,16}$/', $carte) == 1;
}



/**
 * l'algorithme de Luhn: Pour valider un numéro de carte bancaire, on peut utiliser l'algorithme de Luhn 
 * (également connu sous le nom d'algorithme de modulo 10). 
 * 
 * @param string $numero Le numéro de carte de crédit à valider.
 * @return bool Vrai si le numéro est valide, faux sinon.
 */
function estUneCarteModulo10($numero)
{
    // Supprime tous les espaces de la chaîne de caractères
    $numero = str_replace(' ', '', $numero);
    // La chaîne doit être constituée de chiffres uniquement
    if (!preg_match('/^[0-9]+$/', $numero)) {
        return false;
    }

    $sum = 0;
    $length = strlen($numero);
    // Parcourt tous les chiffres du numéro de carte de crédit, en partant du dernier chiffre
    // et en remontant jusqu'au premier chiffre.
    for ($i = $length - 1; $i >= 0; $i--) {
        $digit = (int) $numero[$i];
        // Multiplie par 2 tous les chiffres situés à une position impaire (en partant de 1)
        // à partir de la droite.
        if ($i % 2 == $length % 2) {
            $digit *= 2;
            // Si le résultat est supérieur à 9, on soustrait 9.
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        // Ajoute le chiffre modifié ou non-modifié à la somme.
        $sum += $digit;
    }
    // Le numéro est valide selon l'algorithme du module 10 si la somme est divisible par 10.
    return $sum % 10 == 0;
}




/**
 * teste si c'est une date d'expiration d'une carte bancaire
 *
 * @param [type] $expiration
 * @return : vrai ou faux
 */
function estDateExpiration($expiration)
{
    return preg_match('/^(0[1-9]|1[0-2])\/[0-9]{4}$/', $expiration) === 1 && strlen($expiration) === 7;
}
/**
 * teste si c'est un cryptogramme d'une carte bancaire
 *
 * @param [type] $crypto
 * @return : vrai ou faux
 */
function estCrypto($crypto)
{
    return preg_match('/^[0-9]{3,4}$/', $crypto) === 1;
}

function estUnMot($recherche_mot)
{
    if (!isset($recherche_mot)) {
        return true;
    } else if (isset($recherche_mot)) {
        return preg_match('/^[a-zA-Z]+$/', $recherche_mot);
    }
}

/**
 * test si c'est du texte pour pseudo
 *
 * @param [type] $pseudo
 * @return : vrai ou faux
 */
function estUnPseudo($pseudo)
{
    return preg_match('/^[a-zA-Z0-9]{3,40}$/', $pseudo) === 1;
}
