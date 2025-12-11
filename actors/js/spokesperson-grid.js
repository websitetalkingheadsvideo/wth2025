// JavaScript for Actor Grid
$(document).ready(function () {
    var video = $("#talking-heads-video")[0];
    var srcBase = "https://www.websitetalkingheads.com/";
    var name, alt, srcVideo;
    var stickyHeader = $(".actors-sticky-header");
    var body = $("body");
    var actorCards = $(".actor-card");

    // Detect touch device
    var isTouchDevice = ('ontouchstart' in window) ||
                        (navigator.maxTouchPoints > 0) ||
                        (navigator.msMaxTouchPoints > 0);

    // Add class to body for CSS hooks
    if (isTouchDevice) {
        body.addClass('touch-device');
    }

    // Scroll behavior - scroll-driven header animation (no CSS transitions)
    $(window).on('scroll', function () {
        var scrollTop = $(window).scrollTop();
        var maxScroll = 100; // pixels to complete animation
        var progress = Math.min(1, scrollTop / maxScroll);

        // Add scrolled class for other behaviors
        if (scrollTop > 0) {
            stickyHeader.addClass('scrolled');
            body.addClass('scrolled');
        } else {
            stickyHeader.removeClass('scrolled');
            body.removeClass('scrolled');
        }

        // Directly drive header collapse based on scroll position
        var header = $("header.header-unified");
        var headerHeight = 105; // approximate header height
        var collapsedHeight = headerHeight * (1 - progress);

        header.css({
            "max-height": collapsedHeight + "px",
            "opacity": 1 - (progress * 0.5), // fade to 50% opacity
            "overflow": "hidden"
        });

        // Dim cards that are near/under the sticky header
        if (stickyHeader.length) {
            var headerBottom = stickyHeader.offset().top + stickyHeader.outerHeight();
            actorCards.each(function() {
                var card = $(this);
                var cardMiddle = card.offset().top + (card.outerHeight() / 2);
                if (cardMiddle < headerBottom + 50) {
                    card.addClass('dimmed');
                } else {
                    card.removeClass('dimmed');
                }
            });
        }
    });

    // Peek behavior - show nav when mouse is in top 20px while scrolled
    $(document).on('mousemove', function(e) {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 0 && e.clientY <= 20) {
            body.addClass('peek-nav');
        }
    });

    // Hide nav when mouse leaves the sticky header area
    stickyHeader.on('mouseleave', function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 0) {
            body.removeClass('peek-nav');
        }
    });

    // Lazy load cards with IntersectionObserver
    var observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    var cardObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            var card = entry.target;
            if (entry.isIntersecting) {
                // Stagger the animation slightly for each card
                var delay = Array.from(document.querySelectorAll('.actor-card')).indexOf(card) % 5 * 100;
                setTimeout(function() {
                    card.classList.add('visible');
                }, delay);
            } else {
                // Reset when fully off screen
                card.classList.remove('visible');
            }
        });
    }, observerOptions);

    // Observe all actor cards
    actorCards.each(function() {
        cardObserver.observe(this);
    });

    // Fallback: if cards aren't visible after 2 seconds, show them anyway
    setTimeout(function() {
        actorCards.each(function() {
            if (!$(this).hasClass('visible')) {
                $(this).addClass('visible');
            }
        });
    }, 2000);

    // Split actor names into individual letter spans for animation (desktop only)
    // Also scale down font size for long names to prevent wrapping
    $('.actor-card-name').each(function() {
        var $name = $(this);
        var text = $name.text();
        var $parent = $name.parent();
        var parentWidth = $parent.width() - 40; // account for padding

        // Only split into letters on non-touch devices (for hover animation)
        if (!isTouchDevice) {
            var html = '';
            for (var i = 0; i < text.length; i++) {
                if (text[i] === ' ') {
                    html += ' ';
                } else {
                    html += '<span class="letter">' + text[i] + '</span>';
                }
            }
            $name.html(html);
        }

        // Check if text is too wide and scale down if needed
        // Safety: only run if parentWidth is valid
        if (parentWidth > 50) {
            var baseFontSize = 1.25; // rem
            var currentFontSize = baseFontSize;
            var minFontSize = 0.85; // don't go smaller than this
            var maxIterations = 20; // prevent infinite loop
            var iterations = 0;

            // Measure text width
            while ($name[0].scrollWidth > parentWidth && currentFontSize > minFontSize && iterations < maxIterations) {
                currentFontSize -= 0.05;
                $name.css('font-size', currentFontSize + 'rem');
                iterations++;
            }
        }
    });

    // Only enable mouse-based effects on non-touch devices
    if (!isTouchDevice) {
    // Specular highlight - track mouse position on cards
    actorCards.on('mousemove', function(e) {
        var card = $(this);
        var rect = this.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;
        var infoHeight = 60; // height of the info footer
        var yInfo = y - (rect.height - infoHeight); // y position relative to info footer

        this.style.setProperty('--mouse-x', x + 'px');
        this.style.setProperty('--mouse-y', y + 'px');
        this.style.setProperty('--mouse-y-info', yInfo + 'px');

        // Calculate text glow based on proximity to text area (center of footer)
        var textCenterX = rect.width / 2;
        var textCenterY = rect.height - (infoHeight / 2);
        var distX = x - textCenterX;
        var distY = y - textCenterY;
        var distance = Math.sqrt(distX * distX + distY * distY);
        var maxDist = 200;
        var intensity = Math.max(0, 1 - (distance / maxDist));

        // Glow offset moves opposite to cursor for shine effect
        var glowX = -distX * 0.15;
        var glowY = -distY * 0.15;

        this.style.setProperty('--text-glow-intensity', intensity);
        this.style.setProperty('--text-glow-x', glowX + 'px');
        this.style.setProperty('--text-glow-y', glowY + 'px');

        // Actor image "comes forward" - scale based on vertical cursor position
        // Top of card = 200%, bottom of card = 100%
        var padding = rect.height * 0.05; // 5% padding
        var effectiveTop = padding;
        var effectiveBottom = rect.height - padding;
        var effectiveHeight = effectiveBottom - effectiveTop;

        // Clamp y to the effective range
        var clampedY = Math.max(effectiveTop, Math.min(effectiveBottom, y));

        // Calculate scale: top = max, bottom = min
        var yRatio = 1 - ((clampedY - effectiveTop) / effectiveHeight); // 1 at top, 0 at bottom
        var minScale = 1.0;
        var maxScale = 1.6;
        var actorScale = minScale + (yRatio * (maxScale - minScale));

        this.style.setProperty('--actor-scale', actorScale);

        // Animate text letters based on proximity
        var nameEl = card.find('.actor-card-name');
        var letters = nameEl.find('.letter');
        if (letters.length > 0) {
            var infoRect = card.find('.actor-card-info')[0].getBoundingClientRect();
            letters.each(function(i) {
                var letterRect = this.getBoundingClientRect();
                var letterCenterX = letterRect.left + letterRect.width / 2 - rect.left;
                var letterCenterY = letterRect.top + letterRect.height / 2 - rect.top;
                var distToLetter = Math.sqrt(Math.pow(x - letterCenterX, 2) + Math.pow(y - letterCenterY, 2));
                var maxLetterDist = 120;
                var letterIntensity = Math.max(0, 1 - (distToLetter / maxLetterDist));
                var letterScale = 1 + (letterIntensity * 0.40); // up to 120%
                this.style.transform = 'scale(' + letterScale + ')';
            });
        }
    });

    actorCards.on('mouseleave', function() {
        this.style.removeProperty('--mouse-x');
        this.style.removeProperty('--mouse-y');
        this.style.removeProperty('--mouse-y-info');
        this.style.setProperty('--text-glow-intensity', 0);
        this.style.removeProperty('--text-glow-x');
        this.style.removeProperty('--text-glow-y');
        this.style.setProperty('--actor-scale', 1);

        // Reset letter scales
        $(this).find('.letter').each(function() {
            this.style.transform = 'scale(1)';
        });

        // Clear linger effect
        clearInterval($(this).data('lingerInterval'));
        $(this).removeData('lingerInterval');
        $(this).removeData('lingerTime');

        // Reset all cards
        actorCards.removeClass('unfocused').each(function() {
            this.style.removeProperty('--unfocus-brightness');
            this.style.removeProperty('--unfocus-saturation');
            this.style.removeProperty('--unfocus-blur');
        });

        // Reset background
        body.removeClass('card-focused');
        document.body.style.removeProperty('--bg-dim-brightness');
        document.body.style.removeProperty('--bg-dim-saturation');
    });

    // Linger effect - gradually unfocus other cards
    actorCards.on('mouseenter', function() {
        var hoveredCard = $(this);
        hoveredCard.data('lingerTime', 0);

        var lingerInterval = setInterval(function() {
            var time = hoveredCard.data('lingerTime') + 100;
            hoveredCard.data('lingerTime', time);

            // Start effect after 500ms, max effect at 2500ms
            if (time > 300) {
                var progress = Math.min(1, (time - 300) / 1200);

                // Apply unfocused effect to other cards
                actorCards.not(hoveredCard).each(function() {
                    $(this).addClass('unfocused');
                    var brightness = 1 - (progress * 0.5); // down to 0.7
                    var saturation = 1 - (progress * 0.7);
                    var blur = progress * 4;

                    this.style.setProperty('--unfocus-brightness', brightness);
                    this.style.setProperty('--unfocus-saturation', saturation);
                    this.style.setProperty('--unfocus-blur', blur + 'px');
                });

                // Apply 4x dimming to background
                var bgBrightness = 1 - (progress * 2.0); // 4x intensity... capped at reasonable level
                bgBrightness = Math.max(0, bgBrightness); // don't go below 40%
                var bgSaturation = 1 - (progress * 2.0); // 4x intensity
                bgSaturation = Math.max(0.1, bgSaturation); // don't go below 20%
                body.addClass('card-focused');
                document.body.style.setProperty('--bg-dim-brightness', bgBrightness);
                document.body.style.setProperty('--bg-dim-saturation', bgSaturation);
            }
        }, 100);

        hoveredCard.data('lingerInterval', lingerInterval);
    });
    } // End of non-touch device effects

    // Handle click on new actor cards
    $(".actor-card").click(function () {
        name = $(this).attr("data-video");
        srcVideo = srcBase + "spokespeople/videos/" + name + ".mp4";
        alt = $(this).attr("data-alt") || name + " - Video Spokesperson";
        prepareVideo();
    });

    // Also support old .poster class for backwards compatibility
    $(".poster").click(function () {
        name = $(this).attr("data-video");
        srcVideo = srcBase + "spokespeople/videos/" + name + ".mp4";
        alt = $(this).attr("alt") || "";
        prepareVideo();
    });

    function prepareVideo() {
        $('#videoModalLabel').text(alt);
        video.pause();
        video.src = srcVideo;
        video.load(); // Force browser to load the new source
    }

    $('#contact').click(function () {
        video.pause();
        $('#form').addClass('visible');
        $('#form').removeClass('invisible');
    });

    $('#contactClose').click(function () {
        $('#form').removeClass('visible');
        $('#form').addClass('invisible');
    });

    $('#mainModal').on('hidden.bs.modal', function () {
        video.pause();
        video.src = ''; // Clear source when modal closes
    });

    $('#mainModal').on('shown.bs.modal', function () {
        $('#form').removeClass('visible');
        $('#form').addClass('invisible');
        video.play();
    });
});
