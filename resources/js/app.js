import "./bootstrap";
import Splide from "@splidejs/splide";

$(document).ready(function () {
    const path = window.location.pathname;

    if (path.startsWith("/productDetails/")) {
        const mainSliderElement = $("#main-slider")[0];
        if (mainSliderElement) {
            const main = new Splide(mainSliderElement, {
                type: "fade",
                heightRatio: 0.5,
                pagination: false,
                arrows: false,
                cover: true,
            }).mount();
        }

        const thumbnailSliderElement = $("#thumbnail-slider")[0];
        if (thumbnailSliderElement) {
            const thumbnails = new Splide(thumbnailSliderElement, {
                rewind: true,
                fixedWidth: 104,
                fixedHeight: 58,
                isNavigation: true,
                gap: 10,
                arrows: false,
                focus: "center",
                pagination: false,
                cover: true,
                dragMinThreshold: {
                    mouse: 4,
                    touch: 10,
                },
                breakpoints: {
                    640: {
                        fixedWidth: 66,
                        fixedHeight: 38,
                    },
                },
            }).mount();
        }
    }

    if (path === "/") {

        const animations = $(".animation");

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    $(entry.target).addClass("visible");
                    observer.unobserve(entry.target);
                }
            });
        });

        animations.each((index, animation) => {
            observer.observe(animation);
        });

        const addedElement = $("#splide-added")[0];
        if (addedElement) {
            const added = new Splide(addedElement, {
                type: "loop",
                drag: "free",
                focus: "center",
                arrows: false,
                pagination: true,
                perPage: 5.5,
                autoplay: true,
                interval: 3000,
                pauseOnHover: true,
                speed: 600,
                breakpoints: {
                    640: { perPage: 1.5 },
                    1024: { perPage: 2.5 },
                    1440: { perPage: 3.5 },
                    2650: { perPage: 4.5 },
                },
            }).mount();
        }

        const playersElement = $(".splide-players")[0];
        if (playersElement) {
            const players = new Splide(playersElement, {
                type: "loop",
                drag: "free",
                focus: "center",
                perPage: 2.5,
                arrows: false,
                pagination: false,
                breakpoints: {
                    450: { perPage: 1.5 },
                    800: { perPage: 2.5 },
                    1024: { perPage: 3.5 },
                },
            }).mount();
        }

        const clubsElement = $(".splide-clubs")[0];
        if (clubsElement) {
            const clubs = new Splide(clubsElement, {
                type: "loop",
                drag: "free",
                focus: "center",
                perPage: 2.5,
                arrows: false,
                pagination: false,
                breakpoints: {
                    450: { perPage: 1.5 },
                    800: { perPage: 2.5 },
                    1024: { perPage: 3.5 },
                },
            }).mount();
        }

        const moviesElement = $(".splide-movies")[0];
        if (moviesElement) {
            const movies = new Splide(moviesElement, {
                type: "loop",
                drag: "free",
                focus: "center",
                perPage: 2.5,
                arrows: false,
                pagination: false,
                breakpoints: {
                    450: { perPage: 1.5 },
                    800: { perPage: 2.5 },
                    1024: { perPage: 3.5 },
                },
            }).mount();
        }

        const tshirtsElement = $(".splide-tshirts")[0];
        if (tshirtsElement) {
            const tshirts = new Splide(tshirtsElement, {
                type: "loop",
                drag: "free",
                focus: "center",
                perPage: 2.5,
                arrows: false,
                pagination: false,
                breakpoints: {
                    450: { perPage: 1.5 },
                    800: { perPage: 2.5 },
                    1024: { perPage: 3.5 },
                },
            }).mount();
        }

        const categoryElement = $(".splide-category")[0];
        if (categoryElement) {
            const category = new Splide(categoryElement, {
                type: "loop",
                drag: "free",
                focus: "center",
                perPage: 2.5,
                arrows: false,
                pagination: false,
                breakpoints: {
                    450: { perPage: 1.5 },
                    800: { perPage: 2.5 },
                    1024: { perPage: 3.5 },
                },
            }).mount();
        }
    }
});
