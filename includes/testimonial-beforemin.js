// JavaScript Document
var quote = [
'<div id ="testimonialquote">&quot;This work is absolutely phenomenal !!!!  You guys are awesome...  We are very, very pleased and look forward to working with you guys on other projects.&quot;</div><div id="testimonalname">Ralph Donaldson Jr.- WiseThink Health </div>',
'<div id ="testimonialquote">&quot;I love it.. Looks great. You guys do great work and Chantel is beautiful. I and my boss are impressed. We have several others we want you to do for us.&quot;</div><div id="testimonalname">Dan Cusack- Superior Surgical, LLC </div>',
'<div id ="testimonialquote">&quot;I just wanted to give KUDOS to the production of the latest video made on www.hafha.com...I love the way it was made and how it is displayed on the site.&quot;</div><div id="testimonalname">Marty- Virginia Homes </div>',
'<div id ="testimonialquote">&quot;Please get that on our website immediately! Love it, love it, love it! Awesome job to everyone involved!! ... I will absolutely be sending more clients your way!&quot;</div><div id="testimonalname">Derek- PC Austin </div>',
'<div id ="testimonialquote">&quot;I really appreciate your wonderful assistance and expertise here.  Working with you guys continues to be excellent.  Thanks again.&quot;</div>       <div id="testimonalname">Sean Childs- Horizon Marketing Group</div>',
'<div id ="testimonialquote">&quot;Excellent!  Great job, and excellent turn-around.  You will definitely be hearing from us again.  Thanks!&quot;</div><div id="testimonalname">Rick Lamberson- BlueWater Inet Group</div>', 
'<div id ="testimonialquote">&quot;Excellent!  Installed in just   seconds and works great!&quot;</div><div id="testimonalname">Thomas Kain- Dealer World</div>',
'<div id ="testimonialquote">&quot;I had an exceptionally tight deadline... WebsiteTalkingHeads® went above and beyond to ensure my project was completed on time.&quot;</div><div id="testimonalname">Benjamin Croft- WBECS</div>',
'<div id ="testimonialquote">&quot;It was sincerely my pleasure in doing business with you.  Refreshing in having your "Customer Service" ... so Prompt & Accurate!!!&quot;</div><div id="testimonalname">Mike Svestka- Printing Industry Exchange</div>', 
'<div id ="testimonialquote">&quot;Thanks so much for the GREAT customer service.  You guys were prompt in the order process; quick to respond to emails, & cordial over the Phone.&quot;</div><div id="testimonalname">Tim &amp; Greg- Rainbow RV</div>', 
'<div id ="testimonialquote">&quot;I could not be happier with the product, with your service, and with your company.  I hope to need your services many more times! Thanks a million!&quot;</div><div id="testimonalname">Kevin Ramsey- Urban Cards & Comics</div>', 
'<div id ="testimonialquote">&quot;Guys this is so cool, you did a great job.  Thanks, more than I could hope for, but just what I wanted.  We will work together again, count on it&quot;</div> <div id="testimonalname">Gabriel McCrea- Search Corp</div>',      
'<div id ="testimonialquote">&quot;Thank you very much! The video looks absolutely wonderful and meets our   expectations 100% - this is a great job. Please convey my thanks to the team and   Chantel.&quot;</div><div id="testimonalname">Damith Perera- SEOLIX</div>',
];
    i = 0;  

setInterval(function (){
  // change the text using the dictionary
  // i++ go to the next language
  document.getElementById("quoteBlock").innerHTML = quote[i++];
  // start over if i === dictionary length
  i = quote.length === i ? 0 : i;
}, 5000);

function onBestInSearch(){
document.getElementById("BestInSearchSpokesperson").src="https://www.websitetalkingheads.com/images/videospokesperson_on.gif";
}
function outBestInSearch(){
document.getElementById("BestInSearchSpokesperson").src="https://www.websitetalkingheads.com/images/videospokesperson.gif";
}function onHTML5Logo(){
document.getElementById("HTML5Logo").src="https://www.websitetalkingheads.com/images/HTML5_Logo_over.gif";
}
function outHTML5Logo(){
document.getElementById("HTML5Logo").src="https://www.websitetalkingheads.com/images/HTML5_Logo.png";
}
function onWhyVideo(){
document.getElementById("WhyVideo").src="https://www.websitetalkingheads.com/videopresentations/images/WhyVideo_on.jpg";
}
function outWhyVideo(){
document.getElementById("WhyVideo").src="https://www.websitetalkingheads.com/videopresentations/images/vpgif.gif";
}
function onPPWhyVideo(){
document.getElementById("PPWhyVideo").src="https://www.websitetalkingheads.com/videopresentations/images/PowerVideoCenter-over.png";
}
function outPPWhyVideo(){
document.getElementById("PPWhyVideo").src="https://www.websitetalkingheads.com/videopresentations/images/PowerVideoCenter.png";
}
function onResults(){
document.getElementById("Results").src="https://www.websitetalkingheads.com/videopresentations/images/VideoPresentationttitle219-over.png";
}
function outResults(){
document.getElementById("Results").src="https://www.websitetalkingheads.com/videopresentations/images/VideoPresentationttitle219.png";
}
function onPPResults(){
document.getElementById("Power Punch Video Sales").src="https://www.websitetalkingheads.com/videopresentations/images/PowerPunchtitle219-over.png";
}
function outPPResults(){
document.getElementById("Power Punch Video Sales").src="https://www.websitetalkingheads.com/videopresentations/images/PowerPunchtitle219.png";
}
function onVSResults(){
document.getElementById("Virtual Set Videos").src="https://www.websitetalkingheads.com/videopresentations/images/VirtualSettitle219-over.png";
}
function outVSResults(){
document.getElementById("Virtual Set Videos").src="https://www.websitetalkingheads.com/videopresentations/images/VirtualSettitle219.png";
}
function onWResults(){
document.getElementById("Results Driven Whiteboard Videos").src="https://www.websitetalkingheads.com/videopresentations/images/Whiteboard219-over.png";
}
function outWResults(){
document.getElementById("Results Driven Whiteboard Videos").src="https://www.websitetalkingheads.com/videopresentations/images/Whiteboard219.png";
}
function onVP(){
document.getElementById("Custom Video Presentations").src="https://www.websitetalkingheads.com/videopresentations/images/VideoPresentations300-hover.png";
}
function outVP(){
document.getElementById("Custom Video Presentations").src="https://www.websitetalkingheads.com/videopresentations/images/VideoPresentations300.png";
}
function onWV(){
document.getElementById("Custom Whiteboard Videos").src="https://www.websitetalkingheads.com/videopresentations/images/Whiteboard300-over.png";
}
function outWV(){
document.getElementById("Custom Whiteboard Videos").src="https://www.websitetalkingheads.com/videopresentations/images/Whiteboard300.png";
}
function onVS(){
document.getElementById("Virtual Sets").src="https://www.websitetalkingheads.com/videopresentations/images/VitualSet300-over.png";
}
function outVS(){
document.getElementById("Virtual Sets").src="https://www.websitetalkingheads.com/videopresentations/images/VitualSet300.png";
}
function onPP(){
document.getElementById("Power Punch Videos").src="https://www.websitetalkingheads.com/videopresentations/images/PowerPunchtitle300-over.png";
}
function outPP(){
document.getElementById("Power Punch Videos").src="https://www.websitetalkingheads.com/videopresentations/images/PowerPunchtitle300.png";
}

