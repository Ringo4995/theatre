// Afficher ou masquer la flèche de retour en haut en fonction de la position de défilement
window.addEventListener('scroll', function () {
    var backToTop = document.getElementById('backToTop');
    if (window.scrollY > 300) { // Vous pouvez ajuster cette valeur selon votre besoin
        backToTop.style.display = 'block';
    } else {
        backToTop.style.display = 'none';
    }
});