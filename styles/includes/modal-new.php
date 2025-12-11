<div id="mainModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="videoModalLabel"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe id="talking-heads-video" src="https://player.vimeo.com/video/980512386?h=7ddfd568fb&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479?autoplay=0&loop=1&autopause=0" frameborder="0" allow="fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="talking-heads-video"></iframe>
        <script src="https://player.vimeo.com/api/player.js"></script> 
      </div>
      <div class="d-none bg-transparent" id="form"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
	var holder = $("#talking-heads-video");
	var video = holder[0];
	var iframe = document.querySelector('iframe');
    var player = new Vimeo.Player(iframe);
	var srcBase = "https://www.websitetalkingheads.com/";
	var name, alt, srcVideo;
	$('.modal').on('hidden.bs.modal', function () {
	player.pause();
})
	$(".actor").click(function () {
		name = $(this).attr("data-video");
		srcVideo = srcBase + "videos/" + name + ".mp4";
		if (!$(this).attr("alt")) {
			alt = "";
		} else {
			alt = " - " + $(this).attr("alt");
		}
		showVideo();
	});
	$(".item").click(function () {
		name = $(this).attr("data-video");
		srcVideo = srcBase + "ivideo/videos/" + name.replace(/ /g,"%20") + ".mp4";
		if (!$(this).attr("alt")) {
			alt = "";
		} else {
			alt = " - " + $(this).attr("alt");
		}
		showVideo();
	});
	$(".poster").click(function () {
		name = $(this).attr("data-video");
		vimeo = $(this).attr("data-vimeo");
		srcVideo = "https://player.vimeo.com/video/" + vimeo + "&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479";
		if (!$(this).attr("alt")) {
			alt = "";
		} else {
			alt = " - " + $(this).attr("alt");
		}
		showVideo();
	});

	function showVideo() {
		$('#videoModalLabel').text(name + alt);
        $('#mainModal').modal('show');
		video.src = srcVideo;
	}
</script>