// JavaScript Document
$("#issue").change(function () {
	"use strict";
	var content,title;
	var value = this.value;
	console.log(value);
	switch (value) {
		case "Can't Upload":
			title = "Can't Upload";
			$('#answer').html("<p>Some web hosts don't allow you to upload files to your domain.  To fix this issue we can host the files for you and provide you with code that will show your video on your site.</p>");
			$('#answer').append("<p>Please make sure to provide the URL of your website and the name on your order.</p>")
			break;
		case "404 Error":
			title = "404 Error";
			$('#answer').html("<p>Sorry for the inconvenience.  Please provide the URL you were trying to reach in the support form.</p>");
			break;
		case "Customizing":
			title = "Customizing the Talking Heads® Player";
			$('#answer').html("<p>To customize your player, open up your website-spokesperson.js file in a text editor (like Notepad) or a code editor like Dreamweaver. Do not use Microsoft Word, Open Office, or other elaborate word processor software because they insert formatting code.</p>");
			$('#answer').append("<p class=\"mt-1\">For orders with more than one video the file in the line of code changes. For the second video replace website-spokesperson.js with website-spokesperson2.js. The third video is website-spokesperson3.js and so on.</p>");
			$('#answer').append("<p>See <a href=\"https://www.websitetalkingheads.com/talking-heads-player/customize-player.php\" title=\"Customizing the Player\">https://www.websitetalkingheads.com/talking-heads-player/customize-player.php</a> for more information</p>");
			break;
		case "Installation":
			title = "Installation";
			$('#answer').html("<ol><li>Create a folder called talkingheads in the same directory that holds the page that you want to put the video on.</li><li>Unzip all the files from the zip file onto your computer</li><li>Upload all these files to the talkingheads directory that you created</li><li>Add the following line to your page before the <code>&lt;/body&gt;</code> tag:</li></ol>");
			$('#answer').append("<code class=\"text-center\">&lt;script type=&quot;text/javascript&quot; src=&quot;talkingheads/website-spokesperson.js&quot;&gt;&lt;/script&gt;</code>");
			$('#answer').append("<p>See <a href=\"https://www.websitetalkingheads.com/talking-heads-player/installation-instructions.php\" title=\"Installing the Player\">https://www.websitetalkingheads.com/talking-heads-player/customize-player.php</a> for more information</p>");
			break;
		case "Video Not Playing":
			title = "Video Not Playing";
			$('#answer').html("<p>Usually, when the video doesn't play, it is because the line of code calling the player isn't pointed in the right direction. Check to make sure the files for your video are all in the same folder.  Then make sure the line of code in your page is actually loading the website-spokesperson.js file.  Then check the path variable in the website-spokesperson.js file is the path where the files are stored. If you still have the problem, fill out the form on the left and make sure to include your website address.</p>");
			break;
		case "Audio Only":
			title = "Audio Only";
			$('#answer').html("<p>Usually, when you get audio only for your video it is because you are hosting the video on a different domain. The files need to be hosted on the same domain as the page you have them on. If you can't store the files on the same domain you will need to use an iframe. This entails setting up the player on a page and then iframing that page. If you don't have the ability to do the iframe let us now and we will host it for you.</p>");
			$('#answer').append("<p>Make sure to include your website so we can take a look.</p>");
			break;
		case "Video Position":
			title = "Video Position";
			$('#answer').html("<p>If you are having problems properly placing the player on your page there can be several causes.  Often it is because the CMS/Web Builder you are using is forcing the position.  Be sure to include your website address so we can take a look.</p>");
			break;
		case "Box Around Actor":
			title = "Box Around Actor";
			$('#answer').html("<p>If you see a box around your video this means you are seeing the MP4 fallback. Usually means that the browser you are using doesn't support HTML5 canvas video. However there may be other reasons.  Make sure to include your website so we can take a look.</p>");
			break;
		case "Video Not Autostarting":
			title = "Video Not Autostarting";
			$('#answer').html("<p>This is usually because the browser you are using has blocked it.  However, there may be other causes.  So be sure to include your website address so we can take a look.</p>");
			break;
		default:
			title = "Please fill out the form to the best of your ability.";
			break;
	}
			$('#title').html(title);
});
