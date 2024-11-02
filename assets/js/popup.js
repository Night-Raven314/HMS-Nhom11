window.document.onkeydown = function (e) {
    if (!e) {
        e = event;
    }
    
    if (e.keyCode == 27) {
        lightbox_close();
    }
}

function lightbox_open(el) {
    window.scrollTo(0,0);
    
    var anchors = document.querySelectorAll('a.lightbox');
    var light = document.querySelectorAll('.light');
    var fade = document.querySelectorAll('.fade');
    
    for (var i = 0; i < anchors.length; i++) {
        if (anchors[i] == el) {
            light[i].style.display = 'block';
            fade[i].style.display = 'block';
        }
    }
}

function lightbox_close() {
    var els = document.querySelectorAll('.light, .fade');
    
    for (var i = 0; i < els.length; i++) {
        els[i].style.display = 'none';
    }
}

function popup_open_1() {
    document.getElementById("pop1").style.display = "block";
}
function popup_close_1() {
    document.getElementById("pop1").style.display = "none";
}