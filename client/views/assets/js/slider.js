var slideIndice = 1;

setTimeout(() => {
  verSlides(slideIndice);
}, 100);

// Controles seguinte / anterior
function plusSlides(n) {
  verSlides(slideIndice += n);
}

function verSlides(n) {
  var i;
  var slides    = document.getElementsByClassName("imagens_view");
  
  if (n > slides.length) {slideIndice = 1}
  if (n < 1) {slideIndice = slides.length}

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndice-1].style.display = "block";
}