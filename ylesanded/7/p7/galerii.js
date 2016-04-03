window.onload = function() {
    if (document.getElementsByClassName('hoidja') != null) {
        console.log("Käivitan galerii!");
        var pictureArray = document.getElementById('pildid').getElementsByTagName('img');
        console.log(pictureArray);
        for (var i = 0; i < pictureArray.length; i++) {
            pictureArray[i].onclick = function() {
                showDetails(this);
                return false;};
        }
    }
};

function suurus(el) {
    el.removeAttribute("height");
    el.removeAttribute("width");
    if (el.width > window.innerWidth || el.height > window.innerHeight) {
        if (window.innerWidth >= window.innerHeight) {
            el.height = window.innerHeight * 0.9;
            if (el.width > window.innerWidth) {
                el.removeAttribute("height");
                el.width = window.innerWidth * 0.9;
            }
        } else {
            el.width = window.innerWidth * 0.9;  
            if (el.height > window.innerHeight) { 
                el.removeAttribute("width");
                el.height = window.innerHeight * 0.9;
            }
        }
    }
}

function showDetails(el) {
    console.log(el);
    var suurpilt = document.getElementById("suurpilt");
    var viide = el.parentNode.getAttributeNode("href").value.toString();
    var autor = el.getAttributeNode("alt").value.toString();
    suurpilt.setAttribute("src", viide);
    document.getElementById("inf").innerHTML = autor;
    suurpilt.onload = function() {suurus(this)};
    document.getElementById("hoidja").setAttribute("style", "display:initial");
}

function hideDetails () {
    document.getElementById("hoidja").setAttribute("style", "display:none");
}
window.onresize=function() {
    suurpilt=document.getElementById("suurpilt");
    suurus(suurpilt);
};