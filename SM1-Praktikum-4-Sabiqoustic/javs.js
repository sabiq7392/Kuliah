var p1 = 'f';
var image_tracker = 'f';        
function DarkMode() {
   var image = document.querySelector(".Logo");
    if(image_tracker =='f') {
        image.src ='gambar/Dark.png';
        image_tracker = 't';
    }else {
        image.src = 'gambar/green.png';
        image_tracker = 'f';
    }
    
   document.querySelector("nav").classList.toggle("DarkMode");
   document.querySelector("footer").classList.toggle("DarkMode");
   document.querySelector("nav").classList.toggle("navbar-dark");
   document.querySelector("body").classList.toggle("DarkMode3");
   document.querySelector(".DM").classList.toggle("DarkMode2");  
   document.querySelector(".product").classList.toggle("DarkModeP");
   document.querySelector(".about").classList.toggle("DarkModeP");
   
}