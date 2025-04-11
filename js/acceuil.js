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

// --------------------------------------------------------------

// Afin de masquer le bouttons qui mène vers le haut de la page si on y est déja
retour.addEventListener("scroll", () => {
  // Si le niveau de scroll de la page est infirieur à 1000, il faut la masquer par la classe masquer
  if (window.scrollY > 1000) {
    retour.classList.add("masquer");
    // Si non , il faut le faire apparaitre en enlevant la classe masquer
  } else {
    retour.classList.remove("masquer");
  }
});
