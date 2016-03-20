

window.addEventListener("load", function() {
	// alert("Window loaded");	
})

window.addEventListener("DOMContentLoaded", function(){
	
	var gallery =  document.getElementById('gallery');
	// alert(gallery);
	
	
	if (gallery == null){
		alert('ei ole galerii')
		
	} else {
		var images = document.querySelectorAll('img');
		// alert(images.length);
		for (var i=0; i<(images.length-2); i++){
			images[0].onclick = showDefails(images[0]);
			
		}
		
		function showDetails(el){
			var hoidja =  document.getElementById('hoidja');
		}
		
		
		
		function suurus(el){
			el.removeAttribute("height"); // eemaldab suuruse
			  el.removeAttribute("width");
			  if (el.width>window.innerWidth || el.height>window.innerHeight){  // ainult liiga suure pildi korral
				if (window.innerWidth >= window.innerHeight){ // lai aken
				  el.height=window.innerHeight*0.9; // 90% kõrgune
				  if (el.width>window.innerWidth){ // kas element läheb ikka üle piiri?
					el.removeAttribute("height");
					el.width=window.innerWidth*0.9;
				  }
				} else { // kitsas aken
				  el.width=window.innerWidth*0.9;   // 90% laiune
				  if (el.height>window.innerHeight){ // kas element läheb ikka üle piiri?
					el.removeAttribute("width");
					el.height=window.innerHeight*0.9;
      }
    }
  }
}
	}
	
	
	
	
	
	// alert("DOM Content loaded")
	// var massiiv = new Array();
	// massiiv[0] = "element";
	// alert(massiiv);
	
	// var ostud = ["juust", "leib", "või"];
	// var mitu = ostud.length;
	// alert(ostud);
	
	// massiiv = [1,2,3];
	// alert(
		// massiiv.
		// map(function(el){
			// return el * 2;
		// }).
		// join(':').
		// replace(/(\d)/g,'($1)')
	// );
	
	// for (var i=0; i<10; i++){
		// //mida teha
	// }
	
	// var omega = 10;
	// while (omega>0){
		// omega--;
	// }
	
	// if (omega > ostud.length){
		// //mida teha
	// } else if (omega < ostud.length){
		// // mida teha 
	// } else {
		// // mida teha
	// }
	
	// var p =  document.getElementById('id');
	// document.getElementById('menu').innerHTML = 'abc';
	
	// var menu = document.querySelector('#menu');
	// var lingid = menu.querySelector('a');
	// lingid.style.fontSize = "30em"
	
	// var divid = document.querySelectorAll('div'); //tagastab objektide massiivi
	// divid[2].innerHTML = 'OOO';
	
	// var pilt1 = document.querySelector('#pilt1');
	// pilt1.title = "SININE";

	// var body = document.querySelector('#bodyDiv');
	// body.onclick=function(){
		// alert(this,innerHTML);
	// }; //seda osa ei saanud tööle
	
})