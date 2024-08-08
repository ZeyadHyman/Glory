import "./bootstrap";
import Splide from "@splidejs/splide";


document.addEventListener("DOMContentLoaded", () => {
    const added = new Splide(".splide-added", {
        type: "loop",
        drag: "free",
        focus: "center",
        arrows: false,
        pagination: true,
        perPage: 5.5,
        breakpoints: {
            640: { perPage: 1.5 },
            1024: { perPage: 2.5 },
            1440: { perPage: 3.5 },
            2650: { perPage: 4.5 },
        },
    }).mount();

    const tshirts = new Splide(".splide-tshirts", {
        type: "loop",
        drag: "free",
        focus: "center",
        perPage: 2.5,
        arrows: false,
        pagination: false,
        breakpoints: {
            640: { perPage: 1.5 },
            1024: { perPage: 2.5 },
            1440: { perPage: 3.5 },
            2650: { perPage: 4.5 },
        },
    }).mount();

    const clubs = new Splide(".splide-clubs", {
        type: "loop",
        drag: "free",
        focus: "center",
        perPage: 2.5,
        arrows: false,
        pagination: false,
        breakpoints: {
            640: { perPage: 1.5 },
            1024: { perPage: 2.5 },
            1440: { perPage: 3.5 },
            2650: { perPage: 4.5 },
        },
    }).mount();

    const movies = new Splide(".splide-movies", {
        type: "loop",
        drag: "free",
        focus: "center",
        perPage: 2.5,
        arrows: false,
        pagination: false,
        breakpoints: {
            640: { perPage: 1.5 },
            1024: { perPage: 2.5 },
            1440: { perPage: 3.5 },
            2650: { perPage: 4.5 },
        },
    }).mount();

    const players = new Splide(".splide-players", {
        type: "loop",
        drag: "free",
        focus: "center",
        perPage: 2.5,
        arrows: false,
        pagination: false,
        breakpoints: {
            640: { perPage: 1.5 },
            1024: { perPage: 2.5 },
            1440: { perPage: 3.5 },
            2650: { perPage: 4.5 },
        },
    }).mount();

    const animations = document.querySelectorAll(".animation");

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target);
            }
        });
    });

    animations.forEach((animation) => {
        observer.observe(animation);
    });
});
