jQuery(document).ready(function($) {
    
    // Keyboard navigation for portraits
    $(document).keydown(function(e) {
        // Only on single portrait pages
        if ($('body').hasClass('single-ai_portrait')) {
            
            // Left arrow key - Previous portrait
            if (e.keyCode == 37) {
                var prevLink = $('.nav-previous').attr('href');
                if (prevLink) {
                    window.location.href = prevLink;
                }
            }
            
            // Right arrow key - Next portrait
            if (e.keyCode == 39) {
                var nextLink = $('.nav-next').attr('href');
                if (nextLink) {
                    window.location.href = nextLink;
                }
            }
            
            // Escape key - Back to gallery
            if (e.keyCode == 27) {
                window.location.href = ajax_object.home_url || '/';
            }
        }
    });
    
    // Touch/swipe support for mobile
    var startX = null;
    var startY = null;
    
    $(document).on('touchstart', function(e) {
        if ($('body').hasClass('single-ai_portrait')) {
            var touch = e.originalEvent.touches[0];
            startX = touch.clientX;
            startY = touch.clientY;
        }
    });
    
    $(document).on('touchend', function(e) {
        if ($('body').hasClass('single-ai_portrait') && startX !== null && startY !== null) {
            var touch = e.originalEvent.changedTouches[0];
            var endX = touch.clientX;
            var endY = touch.clientY;
            
            var deltaX = endX - startX;
            var deltaY = endY - startY;
            
            // Check if horizontal swipe (more horizontal than vertical movement)
            if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > 50) {
                
                // Swipe right - Previous portrait
                if (deltaX > 0) {
                    var prevLink = $('.nav-previous').attr('href');
                    if (prevLink) {
                        window.location.href = prevLink;
                    }
                }
                
                // Swipe left - Next portrait
                if (deltaX < 0) {
                    var nextLink = $('.nav-next').attr('href');
                    if (nextLink) {
                        window.location.href = nextLink;
                    }
                }
            }
            
            startX = null;
            startY = null;
        }
    });
    
    // Image lazy loading enhancement
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        var target = this.hash;
        var $target = $(target);
        
        if ($target.length) {
            $('html, body').animate({
                scrollTop: $target.offset().top - 100
            }, 800);
        }
    });
    
    // Add loading states for navigation
    $('.portrait-navigation a').on('click', function() {
        $(this).addClass('loading');
    });
    
    // Preload adjacent images for faster navigation
    function preloadAdjacentImages() {
        var prevLink = $('.nav-previous').attr('href');
        var nextLink = $('.nav-next').attr('href');
        
        if (prevLink) {
            var prevImg = new Image();
            // You would need to extract the image URL from the previous post
            // This is a placeholder for the actual implementation
        }
        
        if (nextLink) {
            var nextImg = new Image();
            // You would need to extract the image URL from the next post
            // This is a placeholder for the actual implementation
        }
    }
    
    // Call preload function if on single portrait page
    if ($('body').hasClass('single-ai_portrait')) {
        preloadAdjacentImages();
    }
    
    // Analytics tracking for navigation
    $('.portrait-navigation a').on('click', function() {
        var direction = $(this).hasClass('nav-previous') ? 'previous' : 'next';
        
        // Google Analytics event tracking (if GA is loaded)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'portrait_navigation', {
                'direction': direction,
                'page_title': document.title
            });
        }
    });
    
});