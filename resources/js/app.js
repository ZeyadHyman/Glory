import "./bootstrap";
import Splide from "@splidejs/splide";

document.addEventListener("DOMContentLoaded", () => {
    new Splide(".splide-added", {
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

    new Splide(".splide-tshirts", {
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

    new Splide(".splide-clubs", {
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

    new Splide(".splide-movies", {
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

    new Splide(".splide-players", {
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
});
