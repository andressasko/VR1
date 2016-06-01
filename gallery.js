window.addEventListener("load", function() {
    // alert("Window loaded");
})

window.addEventListener("DOMContentLoaded", function() {

    var gallery = document.getElementById('gallery');
    // alert(gallery);


    if (gallery == null) {
    } else {
        var images = gallery.querySelectorAll('img');
        // alert(images.length);
        for (var i = 0; i < (images.length); i++) {
            images[i].onclick = function () {
                showDetails(this);
                return false;
            };
        }
    }

    function showDetails(el) {
        var viide = el.parentNode.getAttributeNode("href").value.toString();
        var suurpilt = document.getElementById("suurpilt");
        suurpilt.onclick = function() {
            hideDetails(this);
        };
        suurpilt.setAttribute("src", viide);
        suurpilt.onload = function() {
            suurus(this)
        };
        document.getElementById("hoidja").setAttribute("style", "display:initial");
    }

    function hideDetails () {
        document.getElementById("hoidja").setAttribute("style", "display:none");
    }

    function suurus(el) {
        el.removeAttribute("height"); // eemaldab suuruse
        el.removeAttribute("width");
        if (el.width > window.innerWidth || el.height > window.innerHeight) {  // ainult liiga suure pildi korral
            if (window.innerWidth >= window.innerHeight) { // lai aken
                el.height = window.innerHeight * 0.9; // 90% kõrgune
                if (el.width > window.innerWidth) { // kas element läheb ikka üle piiri?
                    el.removeAttribute("height");
                    el.width = window.innerWidth * 0.9;
                }
            } else { // kitsas aken
                el.width = window.innerWidth * 0.9;   // 90% laiune
                if (el.height > window.innerHeight) { // kas element läheb ikka üle piiri?
                    el.removeAttribute("width");
                    el.height = window.innerHeight * 0.9;
                }
            }
        }
    }
});

