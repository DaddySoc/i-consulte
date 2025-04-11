// Commandes du navbar

// Selection du boutton pour remonter tout en haut
const retour = document.querySelector(".retour");
// Selection du liste des options du navbar
const navbar = document.querySelector("ul");
// Selection du bouton qui fait apparaitre les options du navbar en version mobile
const option = document.querySelector(".fa-bars");
// Selection de tout les bouttons du navbar
const liens = document.querySelectorAll(".lien");

// ---------------Version mobile-------------------------------
// Si le boutton qui fait apparaitre les options du navbar a été cliquée faire
option.addEventListener("click", () => {
  option.classList.toggle("fa-close");
  navbar.classList.toggle("afficher");
});
// Pour chacun des bouttons du navbar, faire
liens.forEach((lien) => {
  // Si l'une des boutton du navbar est cliquée, faire
  lien.addEventListener("click", () => {
    // Enlever la classe qui fait apparaitre les options du navbar, (utile pour la version mobile)
    navbar.classList.remove("afficher");
    // Remetre le boutton qui fait apparaitre les options dans son etat d'origine (cad les 3 lignes superposées)
    option.classList.remove("fa-close");
  });
});

window.addEventListener("scroll", () => {
  if (window.scrollY > 200) {
    retour.classList.add("masquer");
  } else {
    retour.classList.remove("masquer");
  }
});
