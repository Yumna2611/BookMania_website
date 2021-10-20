// Sticky navbar 
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    header.classList.toggle("sticky", window.scrollY > 0);
});

 // Responsive navbar
function toggleMenu() {
    const menuToggle = document.querySelector('.menuToggle');
    const navigation = document.querySelector('.navigation');
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
}

// Life at BookMania 
// Slideshow Gallery
function change(img_id){
    document.getElementById("img1").src=img_id;
}
