import "./bootstrap";
import Splide from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";

const splide_added = new Splide(".splide-added", {
    type: "loop",
    drag: "free",
    focus: "center",
    arrows: false,
    pagination: true, // Ensure pagination is enabled
    perPage: 5.5,
    breakpoints: {
        640: {
            perPage: 1.5,
        },
        1024: {
            perPage: 2.5,
        },
        1440: {
            perPage: 3.5,
        },
        2650: {
            perPage: 4.5,
        },
    },
}).mount();


splide_added.mount();

const splide_cat = new Splide(".splide-cat", {
    type: "loop",
    drag: "free",
    focus: "center",
    perPage: 2.5,
    arrows: false,
    pagination: false,
    autoScroll: {
        speed: 0.6,
    },
    breakpoints: {
        640: {
            // For screens smaller than 640px (e.g., mobile devices)
            perPage: 1.5,
        },
        1024: {
            // For screens smaller than 1024px (e.g., tablets)
            perPage: 2.5,
        },
        1440: {
            // For screens smaller than 2650px (e.g., laptops)
            perPage: 3.5,
        },
        2650: {
            // For screens smaller than 2650px (e.g., large laptops)
            perPage: 4.5,
        },
    },
});

splide_cat.mount({ AutoScroll });


