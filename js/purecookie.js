// --- Config --- //
var purecookieTitle = "Cookies."; // Title
var purecookieDesc = "Al navegar en este sitio, Automáticamente aceptas el uso de cookies."; // Description
var purecookieLink = '<a href="https://www.privacypolicies.com/privacy/view/7174e64c09ab1c768c191e19d3eb8432" target="_blank"> Politica de Privacidad</a>'; // Cookiepolicy link
var purecookieButton = "Aceptar"; // Button text
var purecookieImage='<img width="53px" height="40px" src="images/cookie_img.svg" alt="">'

//<img width="53px" height="40px" src="images/cookie_img.svg" alt="">
// ---        --- //

//$(document).ready(function() { cookieConsent(); };

function pureFadeIn(elem, display){
  var el = document.getElementById(elem);
  el.style.opacity = 0;
  el.style.display = display || "block";

  (function fade() {
    var val = parseFloat(el.style.opacity);
    if (!((val += .02) > 1)) {
      el.style.opacity = val;
      requestAnimationFrame(fade);
    }
  })();
};
function pureFadeOut(elem){
  var el = document.getElementById(elem);
  el.style.opacity = 1;

  (function fade() {
    if ((el.style.opacity -= .02) < 0) {
      el.style.display = "none";
    } else {
      requestAnimationFrame(fade);
    }
  })();
};

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
}

/*function cookieConsent() {
  if (!getCookie('purecookieDismiss')) {
    document.body.innerHTML += '<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>' + purecookieTitle + '</a></div><div class="cookieDesc"><p>' + purecookieDesc + ' ' + purecookieLink + purecookieImage + '</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">' + purecookieButton + '</a></div></div>';
	pureFadeIn("cookieConsentContainer");
  }
}*/

/*function cookieConsent() {
if (!getCookie('purecookieDismiss')) {
document.getElementById("divcookie").innerHTML += ' ' + purecookieTitle + ' ' + purecookieDesc + ' ' + purecookieLink + ' ' + purecookieButton + ' ';
pureFadeIn("cookieConsentContainer");
}
}*/


function cookieConsent() {
  if (!getCookie('purecookieDismiss')) {
    var cookieDiv = document.createElement('div');
cookieDiv.id = 'cookieConsentContainer';
cookieDiv.class = 'cookieConsentContainer';
cookieDiv.innerHTML = purecookieTitle + ' ' + purecookieDesc + ' ' + purecookieLink + ' ' + purecookieButton + ' ';
console.log(cookieDiv)
document.body.appendChild(cookieDiv);
  pureFadeIn("cookieConsentContainer");
  }
}


function purecookieDismiss() {
  setCookie('purecookieDismiss','1',7);
  pureFadeOut("cookieConsentContainer");
}

window.onload = function() { cookieConsent(); };



    