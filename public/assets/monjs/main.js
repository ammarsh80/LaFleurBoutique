window.onscroll = function () { scrollFunction() };

function scrollFunction() {
  //   if (window.innerWidth < 900 ) {
  //     document.getElementById("topBtn").style.display = "none";
  //   }
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {

    document.getElementById("topBtn").style.display = "block";
  } else {
    document.getElementById("topBtn").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth'
  });
}

let btn = document.querySelector(".btn1");
let list_nav = document.querySelector(".list_nav");
let bye = document.querySelectorAll(".bye");
btn.addEventListener("click", (e) => {
  btn.classList.toggle("active");
  bye.forEach((element) => {
    element.classList.toggle("smallScreen");
  });
});


// redirectToUrl(url);
var page = 'v_parCouleur';
var couleur = '<?php echo $idCouleur; ?>';
var params = { 'page': page, 'couleur': couleur };
var url = 'index.php?' + new URLSearchParams(params).toString();

function redirectToUrl(url) {
  window.location.href = url;
}


// // géolocalisation///////////
// if (navigator.geolocation)
// {
//   navigator.geolocation.getCurrentPosition(function(position) {
//     let latitude = position.coords.latitude;
//     let longitude = position.coords.longitude;
//     document.getElementById("latitude").innerHTML = latitude;
//     document.getElementById("longitude").innerHTML = longitude;
//   });
// }
// else { alert("Votre navigateur ne supporte pas la géolocalisation"); }


// // En ajax
// $(document).ready(function() {
//   // Envoyer une requête AJAX pour récupérer les valeurs de latitude et de longitude
//   $.ajax({
//     url: "index.php?page=v_accueil&action=voirArticlesAccueil",
//     method: "GET",
//     success: function(response) {
//       // Analyser la réponse JSON et stocker les valeurs de latitude et de longitude dans des variables JavaScript
//       var data = JSON.parse(response);
//       var latitude = data.latitude;
//       var longitude = data.longitude;
//       // Mettre à jour les éléments HTML avec les valeurs de latitude et de longitude
//       $("#latitude").html(latitude);
//       $("#longitude").html(longitude);
//     }
//   });
// });

// Fin géolocalisation///////////


// Loto ///////////////////////////////////////////////////////////////

function getCookie(name) {
  const cookies = document.cookie.split("; ");
  for (const cookie of cookies) {
    const [cookieName, cookieValue] = cookie.split("=");
    if (cookieName === name) {
      return parseInt(cookieValue);
    }
  }
  return 0;
}

var essai = 0;
var comt_essai = 0;

const reels = document.querySelectorAll('.reel');
const spinButton = document.querySelector('.spin-button');
const symbols = [
  'image1.jpg',
  'image1.jpg',
  'image1.jpg',
  'image1.jpg',
  'image1.jpg',
  'image1.jpg',
];
let isSpinning = false;

// let block = 0;
// function spinReels() {
//   if (isSpinning || essai > 0 || getCookie("block") > 0) {
//     return;
//   }
//   essai++;
//   block++;
//   document.cookie = "block=" + block + "; SameSite=None; Secure";

//   isSpinning = true;
//   spinButton.disabled = true;

//   const speeds = [];
//   const destinations = [];
//   reels.forEach((reel) => {
//     const speed = Math.floor(Math.random());

//     const randomIndex = Math.floor(Math.random() * 5);
//     const destination = randomIndex * 100;

//     speeds.push(speed);
//     destinations.push(destination);
//     reel.style.transition = 'transform 3s ease-out';
//     reel.style.transform = 'rotate(15deg)';
//     reel.style.transform = `translateY(-${destination}px) rotate(-5440deg)`;
    
//   });
//   setTimeout(() => {
//     checkWin();
//     isSpinning = false;
//     spinButton.disabled = false;
//   }, 4000)}

let block = 0;
function spinReels() {
  // Vérifie si le jeu est en cours, si l'essai a été effectué plus de 0 fois ou 
  //si le blocage est actif, puis retourne.
  if (isSpinning || essai > 0 || getCookie("block") > 0) {
    return;
  }
  // Incrémente le nombre d'essais et de blocages.
  essai++;
  block++;
  // Enregistre le nombre de blocages dans un cookie avec SameSite None et Secure.
  // SameSite=None indique que le cookie peut être envoyé à des sites tiers
  // Secure indique que le cookie doit être envoyé uniquement via une connexion HTTPS sécurisée
  document.cookie = "block=" + block + "; SameSite=None; Secure";
  // Définit la variable isSpinning à true et désactive le bouton de rotation.
  isSpinning = true;
  spinButton.disabled = true;
  // Définit des tableaux pour stocker les vitesses et les destinations de chaque rouleau.
  const speeds = [];
  const destinations = [];
  // Parcourt chaque rouleau et définit une vitesse et une destination aléatoires pour chacun.
  reels.forEach((reel) => {
    const speed = Math.floor(Math.random());
    const randomIndex = Math.floor(Math.random() * 5);
    const destination = randomIndex * 100;
    speeds.push(speed);
    destinations.push(destination);
    // Anime chaque rouleau en utilisant des transitions CSS.
    reel.style.transition = 'transform 3s ease-out';
    reel.style.transform = 'rotate(15deg)';
    reel.style.transform = `translateY(-${destination}px) rotate(-5440deg)`;
  });
  // Vérifie le résultat de la rotation après 4 secondes.
  setTimeout(() => {
    checkWin();
    // Réinitialise les variables et réactive le bouton de rotation.
    isSpinning = false;
    spinButton.disabled = false;
  }, 4000);
}

function checkWin() {
  const destination = [];
  reels.forEach((reel, index) => {
    const position = Math.abs(parseInt(reel.style.transform.slice(11))) % (symbols.length * 100) / 100;
    destination.push(position);
  });
  let isWinner = false;

const prizeMap = {
  1: 'un stylo “Lafleur”',
  2: 'un Sac réutilisables en tissus “Lafleur”',
  3: 'un Porte-clés “Lafleur”',
  4: 'un Rose Rouge “Lafleur”',
  5: 'un Bouquets de roses “Lafleur”'
};

let count = 0;

destination.forEach((number) => {
  if (number === 2) {
    count++;
  }
});
const gagne = parseInt(`${count}`);

document.cookie = "gagne=" + gagne + "; SameSite=None; Secure";

if (count > 0 && count <= 5) {
  const prize = prizeMap[count];
  isWinner = true;
  alert(`Bravo, vous avez marqué ${count} but et vous gagnez ${prize} !`);
  reels.forEach((reel) => {
    reel.style.transition = 'transform 0.01s ease-out';
    reel.style.transform = `translateY(0px)`;
  });
  spinButton.disabled = false;
  location.reload();
} 

else {
  alert(`Désolé, vous avez pas gagné cette fois ! à bientôt `);

  reels.forEach((reel) => {
    reel.style.transition = 'transform 0.01s ease-out';
    reel.style.transform = `translateY(0px)`;
  });
  spinButton.disabled = false;
}
}
spinButton.addEventListener('click', (e)=> {
  spinReels();

} );
  // Fin lotoooooooooooo//////////////////////////////////////////////////////////////////////////////////////////////