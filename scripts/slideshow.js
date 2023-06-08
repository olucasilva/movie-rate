document.addEventListener('DOMContentLoaded', function() {
  const carouselContainer = document.querySelector('.carousel-container');
  const slides = document.querySelectorAll('.slide');
  const indicatorsContainer = document.querySelector('.indicators');
  const prevButton = document.querySelector('.prev');
  const nextButton = document.querySelector('.next');
  let currentPosition = 0;
  const slideWidth = slides[0].offsetWidth;
  const totalSlides = slides.length;
  let intervalId;

  // Função para atualizar o carrossel e os indicadores de posição
  function updateCarousel() {
    carouselContainer.style.transform = `translateX(${currentPosition}px)`;
    carouselContainer.style.transition = 'transform 0.3s ease';

    // Atualiza o indicador ativo
    const activeIndex = Math.abs(currentPosition / slideWidth);
    const indicators = document.querySelectorAll('.indicator');
    indicators.forEach((indicator, index) => {
      if (index === activeIndex) {
        indicator.classList.add('active');
      } else {
        indicator.classList.remove('active');
      }
    });
  }

  // Cria os indicadores de posição
  for (let i = 0; i < totalSlides; i++) {
    const indicator = document.createElement('li');
    indicator.classList.add('indicator');
    indicator.setAttribute('data-slide', i);
    indicatorsContainer.appendChild(indicator);
  }

  // Adiciona o evento de clique para os indicadores
  const indicators = document.querySelectorAll('.indicator');
  indicators.forEach(indicator => {
    indicator.addEventListener('click', function() {
      const slideIndex = parseInt(this.getAttribute('data-slide'));
      currentPosition = -slideWidth * slideIndex;
      updateCarousel();
      clearInterval(intervalId); // Para a troca automática de slides
   
      // Para a troca automática de slides
      startSlideInterval();
    });
  });

  // Adiciona evento de clique para o botão "Anterior"
  prevButton.addEventListener('click', function() {
    currentPosition += slideWidth;
    if (currentPosition > 0) {
      currentPosition = -(totalSlides - 1) * slideWidth;
    }
    updateCarousel();
    clearInterval(intervalId); // Para a troca automática de slides
    startSlideInterval(); // Reinicia a troca automática de slides
  });

  // Adiciona evento de clique para o botão "Próximo"
  nextButton.addEventListener('click', function() {
    currentPosition -= slideWidth;
    if (currentPosition < -(totalSlides - 1) * slideWidth) {
      currentPosition = 0;
    }
    updateCarousel();
    clearInterval(intervalId); // Para a troca automática de slides
    startSlideInterval(); // Reinicia a troca automática de slides

  });

  // Função para iniciar a troca automática de slides
  function startSlideInterval() {
    intervalId = setInterval(function() {
      currentPosition -= slideWidth;
      if (currentPosition < -(totalSlides - 1) * slideWidth) {
        currentPosition = 0;
      }
      updateCarousel();
    }, 5000); // Intervalo de 5 segundos (5000 milissegundos)
  }

  // Inicia a troca automática de slides
  startSlideInterval();
});
