// JavaScript Document
window.onload = rolloverInit;

function rolloverInit() {
	for (var i=0; i<document.images.length; i++) {
		if (document.images[i].parentNode.tagName == "A") {
			setupRollover(document.images[i]);
		}
	}
}

function setupRollover(thisImage) {
	thisImage.outImage = new Image();
	thisImage.outImage.src = thisImage.src;
	thisImage.onmouseout = rollOut;

	thisImage.overImage = new Image();
	newImage = "https://www.websitetalkingheads.com/images/" + thisImage.id + "_on.jpg";
	if (newImage === "https://www.websitetalkingheads.com/images/_on.jpg")
	{ 
	}
		else{
			thisImage.overImage.src = "https://www.websitetalkingheads.com/images/" + thisImage.id + "_on.jpg";
		}
	thisImage.onmouseover = rollOver;

	thisImage.parentNode.childImg = thisImage;
	thisImage.parentNode.onblur = rollOutChild;
	thisImage.parentNode.onfocus = rollOverChild;
}

function rollOut() {
	this.src = this.outImage.src;
}

function rollOver() {
	this.src = this.overImage.src;
}

function rollClick() {
	this.src = this.clickImage.src;
}
function rollOutChild() {
	this.childImg.src = this.childImg.outImage.src;
}

function rollOverChild() {
	this.childImg.src = this.childImg.overImage.src;
}