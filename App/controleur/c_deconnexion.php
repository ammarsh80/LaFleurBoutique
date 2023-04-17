<?php
session_start();
session_destroy();
echo "vous êtes deconnecté";
header('location: index.php?page=v_accueil&action=voirArticlesAccueil');
exit;