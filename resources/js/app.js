import './bootstrap';

import 'flowbite'

// vue components
import './components/index';

import ScrollReveal from 'scrollreveal';

ScrollReveal().reveal('#hero-left',{
    duration: 700,
    origin: "left",
    distance: "300px",
    easing: "ease-in-out"
});

ScrollReveal().reveal('#hero-right',{
    duration: 700,
    origin: "right",
    distance: "300px",
    easing: "ease-in-out"
});

ScrollReveal().reveal('#category-title',{
    duration: 1000,
    move: 0
});

ScrollReveal().reveal('#category-desc',{
    duration: 1000,
    delay: 300,
    move: 0
});

ScrollReveal().reveal('#category-card',{
    duration: 1000,
    delay: 300,
    move: 0
});

ScrollReveal().reveal('#featured-title',{
    duration: 1000,
    move: 0
});

ScrollReveal().reveal('#featured-desc',{
    duration: 1000,
    delay: 300,
    move: 0
});