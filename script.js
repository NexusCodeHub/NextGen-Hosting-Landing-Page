document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.nav3d a');
    
    menuItems.forEach(item => {
        item.addEventListener('mousemove', (e) => {
            const rect = item.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const angleX = (y - centerY) / 8;
            const angleY = (centerX - x) / 8;
            
            item.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) translateZ(10px)`;
        });
        
        item.addEventListener('mouseleave', () => {
            item.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
        });
    });

    // Language Switcher Animation
    const langLinks = document.querySelectorAll('.lang-link');
    langLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetLang = this.getAttribute('href').split('=')[1];
            const currentLang = document.documentElement.lang;
            
            if (targetLang !== currentLang) {
                // Start fade out animation
                document.body.classList.add('language-transition');
                
                // After fade out, load new language
                setTimeout(() => {
                    // Store the URL we want to go to
                    const targetUrl = this.href;
                    
                    // Make AJAX request to get new content
                    fetch(targetUrl)
                        .then(response => response.text())
                        .then(html => {
                            // Create a temporary container
                            const doc = new DOMParser().parseFromString(html, 'text/html');
                            
                            // Update only text content with data-lang-content attribute
                            document.querySelectorAll('[data-lang-content]').forEach(element => {
                                const newElement = doc.querySelector(`[data-lang-content="${element.getAttribute('data-lang-content')}"]`);
                                if (newElement) {
                                    element.innerHTML = newElement.innerHTML;
                                }
                            });
                            
                            // Update language switcher active state
                            langLinks.forEach(l => l.classList.remove('active'));
                            document.querySelector(`[href*="lang=${targetLang}"]`).classList.add('active');
                            
                            // Update HTML lang attribute
                            document.documentElement.lang = targetLang;
                            
                            // Start fade in animation
                            setTimeout(() => {
                                document.body.classList.remove('language-transition');
                            }, 50);
                        });
                }, 300);
            }
        });
    });

    function initializeEventListeners() {
        // Reinitialize any necessary event listeners for the new content
        const cards = document.querySelectorAll('.feature-card');
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });

        // Reinitialize pricing cards hover effect
        const pricingCards = document.querySelectorAll('.pricing-card');
        pricingCards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const angleX = (y - centerY) / 25;
                const angleY = (centerX - x) / 25;
                
                card.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) translateZ(10px)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });

        // Reinitialize stats counter
        const stats = document.querySelectorAll('.stat-number');
        const animateValue = (element, start, end, duration) => {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                element.textContent = value + (element.dataset.suffix || '');
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        };

        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const endValue = parseInt(element.textContent);
                    animateValue(element, 0, endValue, 2000);
                    statsObserver.unobserve(element);
                }
            });
        }, observerOptions);

        stats.forEach(stat => {
            if (stat.textContent.includes('k')) {
                const value = parseInt(stat.textContent);
                stat.dataset.suffix = 'k+';
                stat.textContent = value;
            }
            statsObserver.observe(stat);
        });
    }

    // Initialize event listeners for the first time
    initializeEventListeners();

    // Smooth scroll functionality
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    const hero = document.querySelector('#hero');
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        hero.style.transform = `translateY(${scrolled * 0.5}px)`;
    });

    // Form handling
    const form = document.querySelector('.contact-form');
    const inputs = form.querySelectorAll('input, textarea, select');

    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', () => {
            if (!input.value) {
                input.parentElement.classList.remove('focused');
            }
        });
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Vielen Dank für Ihre Nachricht! Wir werden uns in Kürze bei Ihnen melden.');
        form.reset();
    });
});
