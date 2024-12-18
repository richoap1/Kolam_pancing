let slideIndex = 0;
showSlides();

function showSlides() {
    let slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Hide each slide
    }
    slideIndex++;
    if (slideIndex >= slides.length) { slideIndex = 0; } // Reset to the first slide
    slides[slideIndex].style.display = "block"; // Show the active slide
    setTimeout(showSlides, 3000); // Change slide every 3 seconds
}

function changeSlide(n) {
    slideIndex += n; // Change slide index
    let slides = document.getElementsByClassName("slide");
    if (slideIndex >= slides.length) { slideIndex = 0; } // Loop back to the first
    if (slideIndex < 0) { slideIndex = slides.length - 1; } // Loop to last slide
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; // Hide all slides
    }
    slides[slideIndex].style.display = "block"; // Show current slide
}
