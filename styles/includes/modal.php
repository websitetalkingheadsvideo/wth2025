<div id="mainModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="videoModalLabel"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe id="talking-heads-video" class="embed-responsive-item" src="" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" title="talking-heads-video"></iframe>
      </div>
      <div class="modal-footer" style="padding: .5rem">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://player.vimeo.com/api/player.js"></script>
<script>
(function() {
	'use strict';
	
	// Wait for DOM and jQuery to be ready
	if (typeof jQuery === 'undefined') {
		console.error('jQuery is not loaded');
		return;
	}
	
	jQuery(document).ready(function($) {
		var $iframe = $('#talking-heads-video');
		var iframe = $iframe[0];
		var player = null;
		var name, alt, srcVideo;

		// Wait for Vimeo API to load
		function waitForVimeo(callback) {
			if (typeof Vimeo !== 'undefined' && Vimeo.Player) {
				callback();
			} else {
				var attempts = 0;
				var checkInterval = setInterval(function() {
					attempts++;
					if (typeof Vimeo !== 'undefined' && Vimeo.Player) {
						clearInterval(checkInterval);
						callback();
					} else if (attempts > 50) {
						clearInterval(checkInterval);
						console.error('Vimeo API failed to load');
					}
				}, 100);
			}
		}

		// Initialize Vimeo player (only create if it doesn't exist)
		function initVimeoPlayer() {
			if (!iframe) {
				console.error('Iframe not found');
				return;
			}
			
			waitForVimeo(function() {
				try {
					// Only create player if it doesn't exist
					if (!player) {
						player = new Vimeo.Player(iframe);
					}
					
					// Try to play when ready
					player.ready().then(function() {
						player.play().catch(function(error) {
							// Autoplay may be blocked by browser - this is normal
							console.log('Autoplay blocked (normal browser behavior):', error.name);
						});
					}).catch(function(error) {
						console.error('Player ready error:', error);
					});
				} catch (error) {
					console.error('Error creating Vimeo player:', error);
				}
			});
		}

		// Properly manage aria-hidden for accessibility
		$('#mainModal').on('show.bs.modal', function () {
			// Remove aria-hidden before modal is shown to prevent accessibility issues
			// This ensures focused elements inside the modal are not hidden from assistive technology
			$(this).removeAttr('aria-hidden');
		});

		// Pause video when modal is hidden
		$('#mainModal').on('hidden.bs.modal', function () {
			// Set aria-hidden back when modal is hidden
			$(this).attr('aria-hidden', 'true');
			
			// Clear iframe src to stop video playback
			if (iframe) {
				iframe.src = '';
			}
			
			if (player) {
				try {
					player.pause().catch(function() {
						// Ignore pause errors
					});
				} catch (e) {
					// Ignore errors
				}
			}
		});

		// Initialize player when modal is shown
		$('#mainModal').on('shown.bs.modal', function () {
			// Ensure aria-hidden is removed (Bootstrap should do this, but ensure it)
			$(this).removeAttr('aria-hidden');
			
			// Verify iframe has src before initializing player
			if (iframe && iframe.src) {
				// Wait a bit for iframe to load
				setTimeout(function() {
					initVimeoPlayer();
				}, 300);
			} else {
				console.error('Iframe src not set when modal was shown');
			}
		});

		// Handle actor clicks
		$(document).on('click', '.actor', function () {
			name = $(this).attr("data-video");
			srcVideo = "https://www.websitetalkingheads.com/videos/" + name + ".mp4";
			alt = $(this).attr("alt") ? " - " + $(this).attr("alt") : "";
			showVideo();
		});

		// Handle portfolio item clicks
		$(document).on('click', '.item', function (e) {
			e.preventDefault();
			e.stopPropagation();
			
			name = $(this).attr("data-video");
			var vimeo = $(this).attr("data-vimeo");
			
			if (!vimeo) {
				console.error('No data-vimeo attribute found');
				return;
			}
			
			// Decode HTML entities and build proper URL
			vimeo = vimeo.replace(/&amp;/g, '&');
			srcVideo = "https://player.vimeo.com/video/" + vimeo + "&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479&autoplay=1";
			alt = $(this).attr("alt") ? " - " + $(this).attr("alt") : "";
			showVideo();
		});

		// Handle poster clicks
		$(document).on('click', '.poster', function (e) {
			e.preventDefault();
			e.stopPropagation();
			
			name = $(this).attr("data-video");
			var vimeo = $(this).attr("data-vimeo");
			
			if (!vimeo) {
				console.error('No data-vimeo attribute found');
				return;
			}
			
			// Decode HTML entities and build proper URL
			vimeo = vimeo.replace(/&amp;/g, '&');
			srcVideo = "https://player.vimeo.com/video/" + vimeo + "&title=0&byline=0&portrait=0&badge=0&autopause=1&player_id=0&app_id=58479&autoplay=1";
			alt = $(this).attr("alt") ? " - " + $(this).attr("alt") : "";
			showVideo();
		});

		function showVideo() {
			if (!srcVideo) {
				console.error('No video source provided');
				return;
			}
			
			if (!iframe) {
				console.error('Iframe element not found');
				return;
			}
			
			// Update modal title
			$('#videoModalLabel').text(name + alt);
			
			// Clear iframe src first
			iframe.src = '';
			
			// Set new src and show modal
			setTimeout(function() {
				if (iframe && srcVideo) {
					iframe.src = srcVideo;
					$('#mainModal').modal('show');
				} else {
					console.error('Failed to set iframe src');
				}
			}, 10);
		}
	});
})();
</script>