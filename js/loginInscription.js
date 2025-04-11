const icon = document.querySelector("i.fa-eye");
const motDePasse = document.querySelector("#password");

icon.addEventListener("click", () => {
  if (motDePasse.type === "text") {
    motDePasse.setAttribute("type", "password");
  } else if (motDePasse.type === "password") {
    motDePasse.setAttribute("type", "text");
  }
  icon.classList.toggle("fa-eye-slash");
});
