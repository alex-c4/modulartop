 document.addEventListener("DOMContentLoaded",
 function() {
 var div, n, img,
 v = document.getElementsByClassName("youtube-player");
 for (n = 0; n < v.length; n++) {
    //Codigo para mostrar la imagen segun el video 
    switch(v[n].id){
         case "modulartop":
            img = '<img src="images/modulartop/mt_corporativa.jpg" class="img-fluid">';
            break;
        case "servicio":
            img = '<img src="images/banner/servicios.jpg" class="img-fluid">';            
            break;
     }
     //Fin del codigo

 div = document.createElement("div");
 div.setAttribute("data-id", v[n].dataset.id);
 div.innerHTML = labnolThumb(v[n].dataset.id, img);
 div.onclick = labnolIframe;
 v[n].appendChild(div);
 }
 });
 
 function labnolThumb(id, img) {
//  var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
//  play = '<div class="play"></div>';

var thumb = img,// Parte del codigo para mostrar imagenes

play = '<div class="play"></div>';
 
 return thumb.replace("ID", id) + play;
 }
 
 function labnolIframe() {
 var iframe = document.createElement("iframe");
 var embed = "https://www.youtube.com/embed/ID?autoplay=1";
 iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
 iframe.setAttribute("frameborder", "0");
 iframe.setAttribute("allowfullscreen", "1");
 this.parentNode.replaceChild(iframe, this);
 }

// (function() {
//     var v = document.getElementsByClassName("reproductor");
//     for (var n = 0; n < v.length; n++) {
//         var p = document.createElement("div");
//         p.innerHTML = labnolThumb(v[n].dataset.id);
//         p.onclick = labnolIframe;
//         v[n].appendChild(p);
//     }
// })();
 
// function labnolThumb(id) {
//     // return '<img class="imagen-previa" src="//i.ytimg.com/vi/' + id + '/hqdefault.jpg"><div class="youtube-play"></div>';
  
//     return '<img class="imagen-previa" src="//i.ytimg.com/vi/' + id + '/hqdefault.jpg"><div class="youtube-play"></div>';
// }
 
// function labnolIframe() {
//     var iframe = document.createElement("iframe");
//     iframe.setAttribute("src", "//www.youtube.com/embed/" + this.parentNode.dataset.id + "?autoplay=1&autohide=2&border=0&wmode=opaque&enablejsapi=1&controls=0&showinfo=0");
//     iframe.setAttribute("frameborder", "0");
//     iframe.setAttribute("id", "youtube-iframe");
//     this.parentNode.replaceChild(iframe, this);
// }