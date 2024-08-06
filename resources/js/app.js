import "./bootstrap";
import Splide from "@splidejs/splide";

new Splide(".splide-splide", {
    type: "loop",
    drag: "free",
    focus: "center",
    arrows: true,
    pagination: true,
    perPage: 5.5,
    breakpoints: {
        640: { perPage: 1.5, arrows: false },
        1024: { perPage: 2.5, arrows: false },
        1440: { perPage: 3.5 },
        2650: { perPage: 4.5 },
    },
}).mount();
