var swiper=new Swiper(".strip-ads",{direction:"vertical",autoplay:!0,speed:1e3,loop:!0});$("#close_ad").on("click",(function(){$(".text_ticker").remove()}));swiper=new Swiper(".mySwiper1",{autoplay:!0,speed:1e3,loop:!0,pagination:{el:".swiper-pagination",clickable:!0}}),swiper=new Swiper(".mySwiper",{slidesPerView:1.3,spaceBetween:20,centeredSlides:!0,loop:!0,speed:500,initialSlide:0,on:{init:function(){this.slideToLoop(0,0,!1)}},hashNavigation:{watchState:!0},pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},breakpoints:{768:{spaceBetween:30,slidesPerView:1.5},1200:{spaceBetween:40,slidesPerView:2.35},1600:{spaceBetween:46,slidesPerView:2.35}}});function onYouTubeIframeAPIReady(){new YT.Player("YouTubeVideoPlayerAPI",{videoId:"9DPRtYDHTks",width:"100%",height:"100%",playerVars:{autoplay:1,controls:0,showinfo:0,modestbranding:0,loop:1,playlist:"9DPRtYDHTks",fs:0,cc_load_policty:0,iv_load_policy:3,autohide:0},events:{onReady:function(e){e.target.mute(),e.target.playVideo()}}})}function setPopup(e,o,i){var t=new Date;if(t.setTime(t.getTime()+24*i*60*60*1e3),null!=i&&i>0){var n="expires="+t.toUTCString();document.cookie=e+"="+o+";"+n}else document.cookie=e+"="+o+";path=/"}function getPopup(e){for(var o=e+"=",i=document.cookie.split(";"),t=0;t<i.length;t++){for(var n=i[t];" "==n.charAt(0);)n=n.substring(1);if(-1!=n.indexOf(o))return n.substring(o.length,n.length)}return""}!function(){"use strict";let e=window.matchMedia("(min-width:991px)"),o=null,i={loop:!0,slidesPerView:"2.2",spaceBetween:12,centeredSlides:!1};const t=function(){!0===e.matches?null!==o&&(o.destroy(!0,!0),o=null):n()},n=function(){null===o&&(o=new Swiper(".mySwiper2",i))};window.addEventListener("resize",(function(){e=window.matchMedia("(min-width:991px)"),t()})),t()}();let popupId=document.querySelector("#modalBg"),popupClose=document.querySelector(".closebtn");popupClose.addEventListener("click",(function(){$("body").removeClass("modal-open"),$("html").removeClass("popup-open"),popupId.remove(),setPopup("web_view","on",1)}));let popup_value=getPopup("web_view");""!=popup_value&&($("body").removeClass("modal-open"),$("html").removeClass("popup-open"),popupId.remove());