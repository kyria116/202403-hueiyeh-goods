//建立cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    if (exdays != null && exdays > 0) {
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires ;
    } else {
        document.cookie = cname + "=" + cvalue + ";" + "path=/";
    }
}


//取得cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
} 

let cookieId=document.querySelector("#cookie");
let cookieClose=document.querySelector(".cookie-close");

cookieClose.addEventListener("click",(function(){
    cookieId.remove();
}));

let cookie_value=getCookie("web_view");
if(cookie_value != ""){
    cookieId.remove();
}
