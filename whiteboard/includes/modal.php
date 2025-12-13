<div id="mainModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="videoModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
			
			</div>
			<div class="container d-flex justify-content-center">
				<video id="talking-heads-video" class="video-js" controls preload="auto" width="800" height="432" poster="" data-setup="{}">
					<source src="https://www.websitetalkingheads.com/ivideo/videos/Animated Alien Video.mp4" type='video/mp4'>
					<p class="vjs-no-js">
						To view this video please enable JavaScript, and consider upgrading to a web browser that
						<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
					</p>
				</video>
			</div>
			<div class="d-none bg-transparent" id="form">
				<?php include("whiteboard-contact.php"); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="contact">Contact Us</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>