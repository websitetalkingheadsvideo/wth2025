/**
 * Specials Page Video Modal Handler
 * Matches modal behavior from spokespeople/women.php page
 */
(function() {
    'use strict';
    
    // Wait for DOM and jQuery to be ready
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded');
        return;
    }
    
    jQuery(document).ready(function($) {
        var $modal = $('#specialsVideoModal');
        var $iframe = $('#specials-video-iframe');
        var iframe = $iframe[0];
        var $modalTitle = $('#specialsVideoModalLabel');
        var currentVideoName = '';
        var baseUrl = 'https://www.websitetalkingheads.com/ivideo/talking-heads-player.php';
        
        /**
         * Handle clicks on video thumbnails
         * Supports both Women page (.actor) and Specials page (.poster.spokesperson-specials) patterns
         */
        $(document).on('click', '.actor-card.actor, .poster.spokesperson-specials', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            var $element = $(this);
            // Try data-actor first (Women page), fallback to data-video (Specials page)
            var videoName = $element.attr('data-actor') || $element.attr('data-video');
            var videoType = $element.attr('data-video-type') || 'player';
            
            if (!videoName) {
                console.error('No data-actor or data-video attribute found');
                return;
            }
            
            currentVideoName = videoName;
            
            // Build video URL based on type
            var videoUrl;
            if (videoType === 'player') {
                // Use the talking-heads-player.php format (preserving existing PHP logic)
                videoUrl = baseUrl + '?video=' + encodeURIComponent(videoName) + '&autostart=yes&controls=mouse&actor=true';
            } else {
                // Direct video file fallback
                videoUrl = 'https://www.websitetalkingheads.com/videos/' + encodeURIComponent(videoName) + '.mp4';
            }
            
            // Update modal title
            $modalTitle.text(videoName);
            
            // Clear iframe src first to reset
            iframe.src = '';
            
            // Set new src and show modal
            setTimeout(function() {
                if (iframe && videoUrl) {
                    iframe.src = videoUrl;
                    $modal.modal('show');
                } else {
                    console.error('Failed to set iframe src');
                }
            }, 10);
        });
        
        /**
         * Clean up when modal is hidden
         */
        $modal.on('hidden.bs.modal', function() {
            // Clear iframe src to stop video playback
            if (iframe) {
                iframe.src = '';
            }
            currentVideoName = '';
        });
        
        /**
         * Handle ESC key to close modal
         */
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $modal.hasClass('show')) {
                $modal.modal('hide');
            }
        });
        
        /**
         * Close modal when clicking outside of modal content
         */
        $modal.on('click', function(e) {
            if ($(e.target).is($modal)) {
                $modal.modal('hide');
            }
        });
    });
})();
