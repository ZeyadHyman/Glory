import "./bootstrap";

import AOS from "aos";
AOS.init();

import Splide from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";

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
});

splide_cat.mount({ AutoScroll });

const splide_added = new Splide(".splide-added", {
    type: "loop",
    drag: "free",
    focus: "center",
    perPage: 4.5,
});

splide_added.mount();
