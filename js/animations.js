gsap.registerPlugin(ScrollTrigger, SplitText);

const loadAnimations = document.querySelectorAll(".header-text");
const scrollAnimations = document.querySelectorAll(".header-text-scroll");

console.log("Found header-text elements:", loadAnimations.length);
console.log("Found header-text-scroll elements:", scrollAnimations.length);
console.log("SplitText available:", typeof SplitText);

function setupSplits(elements) {
  elements.forEach((element, index) => {
    console.log(`Setting up split for element ${index}:`, element.textContent);
    
    if (element.anim) {
      element.anim.progress(1).kill();
      element.split.revert();
    }

    if (typeof SplitText !== 'undefined') {
      element.split = SplitText.create(element, {
        type: "words,chars",
        linesClass: "split-line"
      });
      console.log(`Split created for element ${index}:`, element.split);
    } else {
      console.error("SplitText is not available");
    }
  });
}

document.fonts.ready.then(() => {
  console.log("Fonts loaded, setting up splits");
  
  if (loadAnimations.length > 0) {
    setupSplits(loadAnimations);
    
    loadAnimations.forEach((element, index) => {
      if (element.split && element.split.chars) {
        console.log(`Animating load element ${index} with ${element.split.chars.length} characters`);
        
        // Ensure the element is visible initially
        gsap.set(element, { opacity: 1 });
        
        element.anim = gsap.from(element.split.chars, {
          duration: 0.6,
          ease: "circ.out",
          y: 80,
          opacity: 0,
          stagger: 0.02
        });
      } else {
        console.error(`No split.chars found for load element ${index}`);
      }
    });
  }
  
  if (scrollAnimations.length > 0) {
    setupSplits(scrollAnimations);
    
    scrollAnimations.forEach((element, index) => {
      if (element.split && element.split.chars) {
        console.log(`Setting up scroll animation for element ${index} with ${element.split.chars.length} characters`);
        
        gsap.set(element, { opacity: 1 });
        
        element.anim = gsap.from(element.split.chars, {
          scrollTrigger: {
            trigger: element,
            start: "top 80%",
            end: "bottom 20%",
            toggleActions: "play none none reverse"
          },
          duration: 0.6,
          ease: "circ.out",
          y: 80,
          opacity: 0,
          stagger: 0.02
        });
      } else {
        console.error(`No split.chars found for scroll element ${index}`);
      }
    });
  }
});

document.fonts.ready.then(() => {
    const animatedTextElements = document.querySelectorAll(".animated-text-white");

    if (animatedTextElements.length > 0) {
        console.log("Setting up animated-text animations for", animatedTextElements.length, "elements");

        animatedTextElements.forEach((animatedTextElement, elIdx) => {
            if (typeof SplitText !== 'undefined') {
                const textSplit = SplitText.create(animatedTextElement, {
                    type: "words,chars",
                    linesClass: "split-line"
                });

                console.log(`Animated-text split created for element ${elIdx}:`, textSplit);

                gsap.from(textSplit.chars, {
                    scrollTrigger: {
                        trigger: animatedTextElement,
                        start: "top 80%",
                        end: "bottom 20%",
                        toggleActions: "play none none reverse"
                    },
                    duration: 0.6,
                    ease: "circ.out",
                    y: 20,
                    opacity: 0,
                    filter: "blur(4px)",
                    stagger: 0.02
                });

            } else {
                console.error("SplitText is not available for animated-text animation");
            }
        });
    }
});


document.fonts.ready.then(() => {
    const animatedTextElements = document.querySelectorAll(".animated-text");

    if (animatedTextElements.length > 0) {
        console.log("Setting up animated-text animations for", animatedTextElements.length, "elements");

        animatedTextElements.forEach((animatedTextElement, elIdx) => {
            if (typeof SplitText !== 'undefined') {
                const textSplit = SplitText.create(animatedTextElement, {
                    type: "words,chars",
                    linesClass: "split-line"
                });

                console.log(`Animated-text split created for element ${elIdx}:`, textSplit);

                gsap.from(textSplit.chars, {
                    scrollTrigger: {
                        trigger: animatedTextElement,
                        start: "top 80%",
                        end: "bottom 20%",
                        toggleActions: "play none none reverse"
                    },
                    duration: 0.6,
                    ease: "circ.out",
                    y: 20,
                    opacity: 0,
                    filter: "blur(4px)",
                    stagger: 0.02
                });

                const highlightTl = gsap.timeline({ repeat: -1, repeatDelay: 0.5 });

            } else {
                console.error("SplitText is not available for animated-text animation");
            }
        });
    }
});

document.fonts.ready.then(() => {
  const headingElement = document.querySelector("#animated-heading");
  
  if (headingElement) {
    console.log("Setting up animated-heading animation");
    
    if (typeof SplitText !== 'undefined') {
      const headingSplit = SplitText.create(headingElement, {
        type: "words,chars",
        linesClass: "split-line"
      });
      
      console.log("Heading split created:", headingSplit);
      
      gsap.set(headingElement, { opacity: 1 });
      gsap.set(headingSplit.chars, { 
        opacity: 0, 
        filter: "blur(4px)",
        y: 20 
      });
      
      gsap.to(headingSplit.chars, {
        scrollTrigger: {
          trigger: headingElement,
          start: "top 80%",
          end: "bottom 20%",
          toggleActions: "play none none reverse"
        },
        opacity: 1,
        filter: "blur(0px)",
        y: 0,
        duration: 0.8,
        ease: "power2.out",
        stagger: 0.02
      });
      
      console.log("Animated-heading animation created");
    } else {
      console.error("SplitText is not available for heading animation");
    }
  }
});

gsap.registerPlugin && gsap.registerPlugin();

function initBackgroundDots() {
  if (!document.querySelector('.dots-wrap')) {
    const wrap = document.createElement('div');
    wrap.className = 'dots-wrap';
    const cont = document.createElement('div');
    cont.className = 'dots-container';
    cont.setAttribute('data-dots-container-init', '');
    wrap.appendChild(cont);
    document.body.appendChild(wrap);
  }

  document.querySelectorAll('[data-dots-container-init]').forEach(container => {
    const colors = { base: '#cfeefb', active: '#8fdfff' };
    const threshold = 150;
    let dots = [];
    let dotCenters = [];

    function buildGrid() {
      container.innerHTML = '';
      dots = [];
      dotCenters = [];

      const style = getComputedStyle(container);
      const dotPx = parseFloat(style.fontSize) || 6;
      const gapPx = dotPx * 2;
      const contW = window.innerWidth;
      const contH = window.innerHeight;

      const cols = Math.floor((contW + gapPx) / (dotPx + gapPx));
      const rows = Math.floor((contH + gapPx) / (dotPx + gapPx));
      const total = cols * rows;

      for (let i = 0; i < total; i++) {
        const d = document.createElement('div');
        d.className = 'dot';
        d._inertiaApplied = false;
        container.appendChild(d);
        dots.push(d);
      }

      requestAnimationFrame(() => {
        dotCenters = dots.map(d => {
          const r = d.getBoundingClientRect();
          return { el: d, x: r.left + r.width / 2, y: r.top + r.height / 2 };
        });
      });
    }

    window.addEventListener('resize', buildGrid);
    buildGrid();

    let lastTime = performance.now();
    let lastX = 0, lastY = 0;

    window.addEventListener('mousemove', e => {
      const now = performance.now();
      const dt = Math.max(16, now - lastTime);
      const dx = e.clientX - lastX;
      const dy = e.clientY - lastY;
      const vx = dx / dt * 1000;
      const vy = dy / dt * 1000;
      const speed = Math.hypot(vx, vy);

      lastTime = now; lastX = e.clientX; lastY = e.clientY;

      requestAnimationFrame(() => {
        dotCenters.forEach(({ el, x, y }) => {
          const dist = Math.hypot(x - e.clientX, y - e.clientY);
          const t = Math.max(0, 1 - dist / threshold);
          // interpolate color by simple mix
          if (t > 0) {
            el.classList.add('active');
            const s = 1 + t * 0.6;
            gsap.to(el, { scale: s, duration: 0.25, ease: 'power2.out' });
          } else {
            el.classList.remove('active');
            gsap.to(el, { scale: 1, duration: 0.6, ease: 'elastic.out(1,0.75)' });
          }
        });
      });
    });

    window.addEventListener('click', e => {
      dotCenters.forEach(({ el, x, y }) => {
        const dist = Math.hypot(x - e.clientX, y - e.clientY);
        if (dist < 200) {
          const falloff = Math.max(0, 1 - dist / 200);
          const push = 40 * falloff;
          const ang = Math.atan2(y - e.clientY, x - e.clientX);
          const tx = Math.cos(ang) * push;
          const ty = Math.sin(ang) * push;
          gsap.to(el, { x: tx, y: ty, duration: 0.6, ease: 'power3.out', onComplete() { gsap.to(el, { x: 0, y: 0, duration: 1.2, ease: 'elastic.out(1,0.75)' }); } });
        }
      });
    });

  });
}

document.addEventListener('DOMContentLoaded', () => {
  initBackgroundDots();
  
  const industryCards = document.querySelectorAll('.industry-cards');
  
  industryCards.forEach(card => {
    gsap.set(card, { scale: 1 });
    
    card.addEventListener('mouseenter', () => {
      gsap.to(card, {
        scale: 1.05,
        backgroundColor: "#314A70",
        duration: 0.3,
        ease: "power2.out"
      });
    });
    
    card.addEventListener('mouseleave', () => {
      gsap.to(card, {
        scale: 1,
        backgroundColor: "#F8F8F8",
        duration: 0.3,
        ease: "power2.out"
      });
    });
  });
  
  if (industryCards.length > 0) {
    gsap.set(industryCards, {
      opacity: 0,
      y: 50
    });
    
    gsap.to(industryCards, {
      scrollTrigger: {
        trigger: industryCards[0].parentElement,
        start: "top 85%",
        end: "bottom 15%",
        toggleActions: "play none none reverse"
      },
      opacity: 1,
      y: 0,
      duration: 0.6,
      ease: "power2.out",
      stagger: 0.2 
    });
  }
});

// Hero section zoom animation
document.fonts.ready.then(() => {
  const heroImages = document.querySelectorAll(".hero-zoom");
  
  if (heroImages.length > 0) {
    console.log("Setting up hero zoom animation for", heroImages.length, "images");
    
    heroImages.forEach((image) => {
      gsap.to(image, {
        scale: 1.05,
        duration: 4,
        ease: "power2.inOut",
        yoyo: true,
        repeat: -1
      });
    });
  }
});

// Check for truncated text in industry cards
document.addEventListener('DOMContentLoaded', function() {
  const industryCards = document.querySelectorAll('.industry-cards');
  
  industryCards.forEach(card => {
    const para = card.querySelector('p.animated-para');
    if (para) {
      // Temporarily remove line-clamp to measure natural height
      para.style.display = 'block';
      para.style.webkitLineClamp = 'none';
      para.style.lineClamp = 'none';
      para.style.webkitBoxOrient = 'horizontal';
      para.style.overflow = 'visible';
      
      // Force reflow
      para.offsetHeight;
      
      const naturalHeight = para.scrollHeight;
      const lineHeight = parseFloat(getComputedStyle(para).lineHeight) || 22.4; // fallback
      const maxLinesHeight = lineHeight * 4;
      
      // Restore line-clamp
      para.style.display = '-webkit-box';
      para.style.webkitLineClamp = '4';
      para.style.lineClamp = '4';
      para.style.webkitBoxOrient = 'vertical';
      para.style.overflow = 'hidden';
      
      if (naturalHeight > maxLinesHeight) {
        card.classList.add('truncated');
      }
    }
  });
});