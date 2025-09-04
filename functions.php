<?php
$head_scripts = [];
$body_scripts = [];
$inline_scripts = [];

function enqueue_head_script($src) {
    global $head_scripts;
    $head_scripts[] = $src;
}

function enqueue_body_script($src) {
    global $body_scripts;
    $body_scripts[] = $src;
}

function add_inline_script($script) {
    global $inline_scripts;
    $inline_scripts[] = $script;
}

function enqueue_head_scripts() {
    global $head_scripts;
    foreach ($head_scripts as $src) {
        echo "<script src=\"$src\"></script>\n";
    }
}

function enqueue_body_scripts() {
    global $body_scripts, $inline_scripts;
    foreach ($body_scripts as $src) {
        echo "<script src=\"$src\"></script>\n";
    }
    foreach ($inline_scripts as $script) {
        echo "<script>\n$script\n</script>\n";
    }
}

function theme_gsap_script(){
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true );
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . 'js/animations.js', array('gsap-js'), false, true );
}

if (function_exists('add_action')) {
    add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );
}

enqueue_head_script("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js");
enqueue_head_script("https://use.fontawesome.com/b37752ca98.js");
enqueue_head_script("https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js");
enqueue_head_script("https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js");
enqueue_head_script("https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js");
// enqueue_head_script("https://unpkg.com/swiper@11.2.10/swiper-bundle.min.js"); // commented out

// Enqueue body scripts
enqueue_body_script("./node_modules/gsap/dist/gsap.min.js");
enqueue_body_script("./node_modules/gsap/dist/ScrollTrigger.min.js");
enqueue_body_script("./node_modules/gsap/dist/SplitText.min.js");
enqueue_body_script("./js/animations.js");
enqueue_body_script("https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js");

// Add inline script
add_inline_script('
    window.onscroll = function() {
        const header = document.getElementById("header");
        if (window.scrollY > 50) {
            header.style.backgroundColor = "#314A70";
        } else {
            header.style.backgroundColor = "transparent";
        }
    };

    $(document).ready(function(){
        function initOwl(selector, customOptions = {}) {
            const defaultOptions = {
                loop: true,
                margin: 10,
                nav: false,
                dots: true,
                autoplay: false,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: { items: 1 },
                    600: { items: 1 },
                    768: { items: 1 },
                    1200: { items: 3 }
                }
            };

            $(selector).owlCarousel($.extend(true, {}, defaultOptions, customOptions));
        }
        initOwl("#ourindustries", {responsive: { 0:{items:1},600:{items:1},768:{items:2},1200:{items:1} } });
        initOwl("#ourleaders", {responsive: { 0:{items:1},600:{items:1},950:{items:2, stagePadding: 50},1200:{items:3, stagePadding: 50},1400:{items:4, stagePadding: 50} } });
        initOwl("#ourachievements");
        initOwl("#testimonial", { dots: false, responsive: { 0:{items:1},600:{items:1},768:{items:1},1200:{items:1} } });
        initOwl("#companylisting", { dots: false, responsive: { 0:{items:1},600:{items:1},768:{items:1},1200:{items:1} } });
        initOwl("#companylisting-mobile", { dots: false, responsive: { 0:{items:1},600:{items:1},768:{items:1},1200:{items:1} } });

        $(".owl-prev, .owl-next").click(function () {
            let classes = $(this).attr("class").split(/\s+/).filter(c => c !== "owl-prev" && c !== "owl-next");

            let targetClass = classes[0];

            let $targetCarousel = $("#" + targetClass);

            if ($(this).hasClass("owl-prev")) {
                console.log($targetCarousel)
                $targetCarousel.trigger("prev.owl.carousel");
            } else {
                $targetCarousel.trigger("next.owl.carousel");
            }
        });

    });

    $(function () {
        $("#industriesMenu").on("click", function (e) {
            e.preventDefault();
            $(this).next(".industriesMenu").slideToggle(200);
        });
    });

    function animateCounters(selector, duration = 3000) {
        const counters = document.querySelectorAll(selector);

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const counter = entry.target;
                
                if (counter._counted) {
                    obs.unobserve(counter);
                    return;
                }
                counter._counted = true;

                let text = counter.textContent.trim();
                let match = text.match(/([\d,.]+)([^\d,.]*)/);
                if (!match) {
                    obs.unobserve(counter);
                    return;
                }

                let numberPart = match[1].replace(/,/g, "");
                let suffix = match[2] || "";

                let isDecimal = numberPart.includes(".");
                let endValue = parseFloat(numberPart);
                let startValue = 0;
                let startTime = null;

                function update(currentTime) {
                    if (!startTime) startTime = currentTime;
                    let progress = Math.min((currentTime - startTime) / duration, 1);
                    
                    let easedProgress = 1 - Math.pow(1 - progress, 4);

                    let value = startValue + (endValue - startValue) * easedProgress;
                    let displayValue;
                    if (isDecimal) {
                        displayValue = value.toFixed(1);
                    } else {
                        displayValue = Math.floor(value).toLocaleString();
                    }

                    counter.textContent = displayValue + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    } else {
                        obs.unobserve(counter);
                    }
                }

                requestAnimationFrame(update);
            });
        }, { threshold: 0.6 });

        counters.forEach(c => observer.observe(c));
    }

    animateCounters(".counter", 4000);

    document.addEventListener("DOMContentLoaded", () => {
        const headings = document.querySelectorAll(\'.heading\');

        headings.forEach(heading => {
            const animatedElements = heading.querySelectorAll(\'h1, h2, h3, h4, h5, p, span\');

            animatedElements.forEach(el => el.classList.remove(\'slide-up\'));

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animatedElements.forEach((el, index) => {
                            // Skip elements with header-text class (they have custom SplitText animation)
                            if (!el.classList.contains(\'slide-up\') && !el.classList.contains(\'header-text\')) {
                                el.style.transitionDelay = `${index * 0.2}s`;
                                el.classList.add(\'slide-up\');
                            }
                        });
                    }
                    
                });
            }, {
                threshold: 0.95
            });

            observer.observe(heading);
        });

        const animatedParas = document.querySelectorAll(\'.animated-para\');
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains(\'animate__animated\')) {
                    const index = [...document.querySelectorAll(\'.card.animated-para\')].indexOf(entry.target);
                    setTimeout(() => {
                        entry.target.classList.add(\'animate__animated\', \'animate__fadeInUp\');
                    }, index * 100);
                }
            });
        }, { threshold: 0.3 });

        const otherObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains(\'animate__animated\')) {
                    entry.target.classList.add(\'animate__animated\', \'animate__fadeInUp\');
                }
            });
        }, { threshold: 0.95});

        animatedParas.forEach(el => {
            (el.classList.contains(\'card\') ? cardObserver : otherObserver).observe(el);
        });
    });

    document.getElementById("langToggle").addEventListener("click", function() {
        const defaultText = this.querySelector(".btn_text--default");
        const hoverText = this.querySelector(".btn_text--hover");

        if (defaultText.textContent === "ENGLISH TO ARABIC") {
            defaultText.textContent = "ARABIC TO ENGLISH";
            hoverText.textContent = "ARABIC TO ENGLISH";
        } else {
            defaultText.textContent = "ENGLISH TO ARABIC";
            hoverText.textContent = "ENGLISH TO ARABIC";
        }
    });

    gsap.registerPlugin(ScrollTrigger);

    let revealContainers = document.querySelectorAll(".reveal");

    revealContainers.forEach((container) => {
        let image = container.querySelector("img");
        let tl = gsap.timeline({
            scrollTrigger: {
                trigger: container,
                start: "top 50%",
                toggleActions: "play none none none"
            }
        });

        tl.set(container, { autoAlpha: 1 });
        tl.from(container, 1.5, {
            xPercent: -150,
            ease: Power4.out
        });
        tl.from(image, 1.5, {
            xPercent: 100,
            scale: 1.3,
            delay: -1.5,
            ease: Power4.out
        });
    });

    let revealContainersSide = document.querySelectorAll(".reveal-side-container");

    revealContainersSide.forEach((container) => {
        let image = container.querySelector("img");
        let tl = gsap.timeline({
            scrollTrigger: {
                trigger: container,
                start: "top 50%",
                toggleActions: "play none none none"
            }
        });

        tl.set(container, { autoAlpha: 1 });
        tl.from(container, 1.5, {
            xPercent: -100,
            ease: Power4.out
        });
        tl.from(image, 1.5, {
            xPercent: 100,
            scale: 1.3,
            delay: -1.5,
            ease: Power4.out
        });
    });
');
?>