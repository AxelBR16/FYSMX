// Función para crear las estrellas dinámicamente
function createStars() {
  const ratingContainer = document.getElementById('rating-container');
  const ratingValue = document.getElementById('rating-value');

  for (let i = 1; i <= 5; i++) {
    const star = document.createElement('span');
    star.innerHTML = '<ion-icon class="ico" name="star"></ion-icon>';
    star.className = 'star';
    star.setAttribute('data-rating', i);

    // Agregar evento clic a cada estrella
    star.addEventListener('click', function () {
      const rating = this.getAttribute('data-rating');
      ratingValue.innerText = rating;
      highlightStars(rating);
    });

    ratingContainer.appendChild(star);
  }
}

// Función para resaltar las estrellas seleccionadas
function highlightStars(rating) {
  const stars = document.querySelectorAll('.star');

  stars.forEach((star) => {
    const starRating = star.getAttribute('data-rating');
    star.style.color = starRating <= rating ? 'gold' : 'gray';
  });
}

// Inicializar el formulario
createStars();
