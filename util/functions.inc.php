<?php

/**
 * Initialise le panier
 *
 * Crée une variable de type session dans le cas
 * où elle n'existe pas 
 */
function initPanier() {
    if (!isset($_SESSION['Articles'])) {
        $_SESSION['Articles'] = array();

    }
}

/**
 * Supprime le panier
 *
 * Supprime la variable de type session 
 */
function supprimerPanier() {
    unset($_SESSION['Articles']);
}

/**
 * Ajoute un Article au panier
 *
 * Teste si l'identifiant du Article est déjà dans la variable session 
 * ajoute l'identifiant à la variable de type session dans le cas où
 * où l'identifiant du Article n'a pas été trouvé
 * @param $idArticle : identifiant de article
 * @return vrai si le article n'était pas dans la variable, faux sinon 
 */
function ajouterAuPanier($idArticle) {
    $ok = false;
    if (!in_array($idArticle, $_SESSION['Articles'])) {
        $_SESSION['Articles'][] = $idArticle;
        $ok = true;
    }
    return $ok;
}

/**
 * Retourne les Articles du panier
 *
 * Retourne le tableau des identifiants de article
 * @return : le tableau
 */
function getLesIdArticlesDuPanier() {
   
    return $_SESSION['Articles'];
    
}

/**
 * Retourne le nombre de Articles du panier
 *
 * Teste si la variable de session existe
 * et retourne le nombre d'éléments de la variable session
 * @return : le nombre 
 */
function nbArticlesDuPanier() {
    $n = 0;
    if (isset($_SESSION['Articles'])) {
        $n = count($_SESSION['Articles']);
    }
    return $n;
 
}

/**
 * Retire un de Articles du panier
 *
 * Recherche l'index de l'idProduit dans la variable session
 * et détruit la valeur à ce rang
 * @param $idProduit : identifiant de article

 */
function retirerDuPanier($idProduit) {
    $index = array_search($idProduit, $_SESSION['Articles']);
    unset($_SESSION['Articles'][$index]);
}

/**
 * Affiche une liste d'erreur
 * @param array $msgErreurs
 */
function afficheErreurs(array $msgErreurs) {
    echo '<div class="erreur"><ul>';
    foreach ($msgErreurs as $erreur) {
        ?>     
        <li><?php echo $erreur ?></li>
        <?php
    }
    echo '</ul></div>';
}

/**
 * Affiche une erreur
 *
 * @param string $msgErreur
 * @return $msgErreur
 */
function afficheErreur(string $msgErreur) {
    echo '<div class="erreur">' . $msgErreur . '</div>';

}
/**
 * Affiche un message bleu
 * @param string $msg
 */
function afficheMessage(string $msg) {
    echo '<div class="message">'.$msg.'</div>';
}
/**
 * Affiche un message bleu
 * @param string $msg
 */
function afficheMessagePanierVide(string $msg) {
    echo '<div class="messagePanierVide">'.$msg.'</div>';
}
