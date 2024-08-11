import "./bootstrap";
import Splide from "@splidejs/splide";

$(document).ready(function () {
    const path = window.location.pathname;
    const spinner = document.getElementById("spinner");
    const currentUrl = window.location.href;
    const cover = document.getElementById("cover");
    const body = document.getElementById("body");
    const test = document.getElementById("test");
    const footer = document.getElementById("footer");

    const handlePathChanges = () => {
        if (path === "/") {
            cover.classList.add("lg:block");
        }
        if (path === "/" || path === "/profile") {
            body.classList.remove("cover");
        }
        if (path === "/admin/dashboard") {
            footer.style.display = "none";
        }
    };

    const setupSpinner = () => {
        document.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", function () {
                if (link.href !== currentUrl) {
                    spinner.style.display = "flex";
                }
            });
        });
    };

    const setupProductDetails = () => {
        if (path.startsWith("/productDetails/")) {
            const splide = new Splide("#main-carousel", {
                pagination: false,
                arrows: false,
                drag: false,
            }).mount();

            const thumbnails = document.getElementsByClassName("thumbnail");
            let current;

            const initThumbnail = (thumbnail, index) => {
                thumbnail.addEventListener("click", () => splide.go(index));
            };

            Array.from(thumbnails).forEach((thumbnail, index) =>
                initThumbnail(thumbnail, index),
            );

            splide.on("mounted move", () => {
                const thumbnail = thumbnails[splide.index];
                if (thumbnail) {
                    if (current) current.classList.remove("is-active");
                    thumbnail.classList.add("is-active");
                    current = thumbnail;
                }
            });

            const isScreenSizeValid = () =>
                window.matchMedia("(min-width: 768px)").matches;

            const openModal = (imageSrc) => {
                if (isScreenSizeValid()) {
                    $("#modalImage").attr("src", imageSrc);
                    $("#imageModal").removeClass("hidden");
                }
            };

            const closeModal = () => {
                if (isScreenSizeValid()) {
                    $("#imageModal").addClass("hidden");
                    $("#imageModal").fadeOut(300);
                }
            };

            $(".open-modal").on("click", function () {
                openModal($(this).data("image"));
            });

            $("#closeModal").on("click", closeModal);

            $("#imageModal").on("click", function (event) {
                if ($(event.target).is("#imageModal")) closeModal();
            });

            $(window).on("resize", function () {
                if (!isScreenSizeValid()) closeModal();
            });

            const productElement = $(".splide-product")[0];
            if (productElement) {
                new Splide(productElement, {
                    type: "loop",
                    focus: "center",
                    arrows: false,
                    pagination: true,
                    perPage: 1,
                }).mount();
            }
        }
    };

    const setupHomePage = () => {
        if (path === "/") {
            const setupSplide = (element, options) => {
                if (element) {
                    new Splide(element, options).mount();
                }
            };

            setupSplide($("#splide-added")[0], {
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
            });

            const commonSplideOptions = {
                type: "loop",
                drag: "free",
                focus: "center",
                arrows: false,
                pagination: false,
                breakpoints: {
                    450: { perPage: 1.5 },
                    800: { perPage: 2.5 },
                    1024: { perPage: 3.5 },
                },
            };

            setupSplide($(".splide-players")[0], {
                ...commonSplideOptions,
                perPage: 2.5,
            });
            setupSplide($(".splide-clubs")[0], {
                ...commonSplideOptions,
                perPage: 2.5,
            });
            setupSplide($(".splide-movies")[0], {
                ...commonSplideOptions,
                perPage: 2.5,
            });
            setupSplide($(".splide-tshirts")[0], {
                ...commonSplideOptions,
                perPage: 2.5,
            });
            setupSplide($(".splide-category")[0], {
                ...commonSplideOptions,
                perPage: 2.5,
            });
        }
    };

    handlePathChanges();
    setupSpinner();
    setupProductDetails();
    setupHomePage();
});
