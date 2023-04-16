window.onscroll = function() {scrollFunction()};

function scrollFunction() {
//   if (window.innerWidth < 900 ) {
//     document.getElementById("topBtn").style.display = "none";
//   }
   if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {

    document.getElementById("topBtn").style.display = "block";
  }   else {
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

// let btn = document.querySelector(".btn1");
// let list_nav = document.querySelector(".list_nav");
// let bye = document.querySelectorAll(".bye");
// btn.addEventListener("click", (e) => {
//   btn.classList.toggle("active");
//   bye.forEach((element) => {
//     element.classList.toggle("smallScreen");
//   });
// });



// Récupérer l'élément HTML avec l'ID "frais_payant"
const frais_offert = document.getElementById('frais_offert');
// Récupérer l'élément HTML avec l'ID "frais_payant"
const frais_payant = document.getElementById('frais_payant');
// Récupérer l'élément HTML avec l'ID "somme_total"
const somme_total = document.getElementById('somme_total');

// Accéder au contenu de la div
const contenu_div = somme_total.innerHTML;
if (parseInt(contenu_div) >= 50) {
  frais_offert.checked = true;
}
else if (parseInt(contenu_div) > 0) {
  frais_payant.checked = true;
}

const je_valide = document.getElementById('je_valide');
const container_paiement = document.getElementById('container_paiement');

je_valide.addEventListener('click', (e) => {
  if (parseInt(contenu_div) > 0) {
    container_paiement.style.pointerEvents = 'all';
    container_paiement.style.opacity = '100%';
  }
});