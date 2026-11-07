
// <!-- JavaScript for Smooth Carousel with Snap Effect -->
document.addEventListener("DOMContentLoaded", function () {
  // Initialize Bootstrap carousel
  var carousel = new bootstrap.Carousel('#partnersCarousel', {
      interval: 3000, // Adjust the carousel interval if needed
      wrap: true,
      ride: 'carousel'
  });

  // Add smooth scrolling effect to the carousel
  var carouselInner = document.querySelector('.carousel-inner');

  // Adding smooth scrolling when carousel items move
  carouselInner.addEventListener('scroll', function () {
      // Add your custom scroll event here if needed
      // This will handle smooth scrolling for better user experience
  });
});






















