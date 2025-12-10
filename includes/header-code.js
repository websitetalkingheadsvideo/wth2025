// JavaScript Document
//function onBestInSearch(){document.getElementById("BestInSearchSpokesperson").src="https://www.websitetalkingheads.com/images/videospokesperson_on.gif"}
//function outBestInSearch(){document.getElementById("BestInSearchSpokesperson").src="https://www.websitetalkingheads.com/images/videospokesperson.gif"}
//function onHTML5Logo(){document.getElementById("HTML5Logo").src="https://www.websitetalkingheads.com/images/HTML5_Logo_over.gif"}
//function outHTML5Logo(){document.getElementById("HTML5Logo").src="https://www.websitetalkingheads.com/images/HTML5_Logo.png"}
//
//
//var quote=['<div id ="testimonialquote">&quot;This work is absolutely phenomenal !!!!  You guys are awesome...  We are very, very pleased and look forward to working with you guys on other projects.&quot;</div><div id="testimonalname">Ralph Donaldson Jr.- WiseThink Health </div>',
//'<div id ="testimonialquote">&quot;I love it.. Looks great. You guys do great work and Chantel is beautiful. I and my boss are impressed. We have several others we want you to do for us.&quot;</div><div id="testimonalname">Dan Cusack- Superior Surgical, LLC </div>',
//'<div id ="testimonialquote">&quot;I just wanted to give KUDOS to the production of the latest video made on www.hafha.com...I love the way it was made and how it is displayed on the site.&quot;</div><div id="testimonalname">Marty- Virginia Homes </div>',
//'<div id ="testimonialquote">&quot;Please get that on our website immediately! Love it, love it, love it! Awesome job to everyone involved!! ... I will absolutely be sending more clients your way!&quot;</div><div id="testimonalname">Derek- PC Austin </div>',
//'<div id ="testimonialquote">&quot;I really appreciate your wonderful assistance and expertise here.  Working with you guys continues to be excellent.  Thanks again.&quot;</div>       <div id="testimonalname">Sean Childs- Horizon Marketing Group</div>',
//'<div id ="testimonialquote">&quot;Excellent!  Great job, and excellent turn-around.  You will definitely be hearing from us again.  Thanks!&quot;</div><div id="testimonalname">Rick Lamberson- BlueWater Inet Group</div>',
//'<div id ="testimonialquote">&quot;Excellent!  Installed in just   seconds and works great!&quot;</div><div id="testimonalname">Thomas Kain- Dealer World</div>',
//'<div id ="testimonialquote">&quot;I had an exceptionally tight deadline... WebsiteTalkingHeads\xae went above and beyond to ensure my project was completed on time.&quot;</div><div id="testimonalname">Benjamin Croft- WBECS</div>',
//'<div id ="testimonialquote">&quot;It was sincerely my pleasure in doing business with you.  Refreshing in having your "Customer Service" ... so Prompt & Accurate!!!&quot;</div><div id="testimonalname">Mike Svestka- Printing Industry Exchange</div>',
//'<div id ="testimonialquote">&quot;Thanks so much for the GREAT customer service.  You guys were prompt in the order process; quick to respond to emails, & cordial over the Phone.&quot;</div><div id="testimonalname">Tim &amp; Greg- Rainbow RV</div>',
//'<div id ="testimonialquote">&quot;I could not be happier with the product, with your service, and with your company.  I hope to need your services many more times! Thanks a million!&quot;</div><div id="testimonalname">Kevin Ramsey- Urban Cards & Comics</div>',
//'<div id ="testimonialquote">&quot;Guys this is so cool, you did a great job.  Thanks, more than I could hope for, but just what I wanted.  We will work together again, count on it&quot;</div> <div id="testimonalname">Gabriel McCrea- Search Corp</div>',
//'<div id ="testimonialquote">&quot;Thank you very much! The video looks absolutely wonderful and meets our   expectations 100% - this is a great job. Please convey my thanks to the team and   Chantel.&quot;</div><div id="testimonalname">Damith Perera- SEOLIX</div>'];
//
//window.onload = function(e){
//	i=0;
//	setInterval(function(){document.getElementById("quoteBlock").innerHTML=quote[i++],i=quote.length===i?0:i},300);
//}
window.onload = function(e){
var loc = location.href;
	switch(loc){
		case "https://www.websitetalkingheads.com/index.php":
		case "https://www.websitetalkingheads.com/":
		case "https://www.websitetalkingheads.com/index21715.php":
		document.getElementById('menuHome').className="current";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		break;
		case "
https://websitetalkingheads.com/actors/female-carousel.php":
		case "
https://websitetalkingheads.com/actors/male-carousel.php":
		case "
https://websitetalkingheads.com/actors/female-carousel2.php":
		case "
https://websitetalkingheads.com/actors/carousel4.php":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="current";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		break;

		case "https://www.websitetalkingheads.com/examples.php":
		case "https://www.websitetalkingheads.com/examples/index.php":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="current";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		break;
		case "https://www.websitetalkingheads.com/pricing/index.php":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="current";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		break;
		case "https://www.websitetalkingheads.com/order.php":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="current";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		break;
		case "https://www.websitetalkingheads.com/explanationvideo":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="current";
		document.getElementById('menuVideos').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		break;
		case "https://www.websitetalkingheads.com/videopresentations/index.php":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="current";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		break;
		case "https://www.websitetalkingheads.com/contact.php":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="current";
		document.getElementById('menuSpecials').className="other";
		break;
		case "https://www.websitetalkingheads.com/specials/":
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="current";
		break;
		
		default:
		document.getElementById('menuHome').className="other";
		document.getElementById('menuActors').className="other";
		document.getElementById('menuExamples').className="other";
		document.getElementById('menuPrices').className="other";
		document.getElementById('menuOrder').className="other";
		document.getElementById('whiteboard').className="other";
		document.getElementById('menuVideos').className="other";
		document.getElementById('menuContact').className="other";
		document.getElementById('menuSpecials').className="other";
		
	}
}