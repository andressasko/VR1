window.onload = function() {
	var beads = document.getElementsByClassName("bead");
	for (i = 0; i < beads.length; i++) {	
		beads[i].onclick = changeSide;
	}
	function changeSide(a) {
		if (a.target.style.cssFloat == "left") {
			a.target.style.cssFloat = "right";
		} else {
			a.target.style.cssFloat = "left";
		}
	}
}