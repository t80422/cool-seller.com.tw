// slider
const swiper = new Swiper('.index-slider-content', {
    direction: "horizontal",
    autoplay: {
        delay: 8000,
        pauseOnMouseEnter: false,
        disableOnInteraction: false,
    },
    loop: true,
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


// tabs
document.addEventListener("DOMContentLoaded", function () {
    var tabsItems = document.querySelectorAll(".tabs-item");
    var tabsContent = document.querySelectorAll(".tabs-content");

    tabsItems[0].classList.add("is-active");
    tabsContent[0].classList.add("is-active");

    tabsItems.forEach(function (item, index) {
        item.addEventListener("click", function () {
            tabsItems.forEach(function (tab) {
                tab.classList.remove("is-active");
            });
            tabsContent.forEach(function (content) {
                content.classList.remove("is-active");
            });
            item.classList.add("is-active");
            tabsContent[index].classList.add("is-active");
        });
    });
});


// mouse
$(function() {
    $(".logo-wrap").mouseenter(function(){
        $("#followMouse").addClass("type-home");
    });
    $(".logo-wrap").mouseleave(function(){
        $("#followMouse").removeClass("type-home");
    });

    $(".nav-btn").mouseenter(function(){
        $("#followMouse").addClass("type-menu");
    });
    $(".nav-btn").mouseleave(function(){
        $("#followMouse").removeClass("type-menu");
    });

    $(".footer-top").mouseenter(function(){
        $("#followMouse").addClass("type-dark");
    });
    $(".footer-top").mouseleave(function(){
        $("#followMouse").removeClass("type-dark");
    });

    $(".swiper-slide figure, .index-about-img figure, .index-service-item, .footer-info-link .link").mouseenter(function(){
        $("#followMouse").addClass("type-view");
    });
    $(".swiper-slide figure, .index-about-img figure, .index-service-item, .footer-info-link .link").mouseleave(function(){
        $("#followMouse").removeClass("type-view");
    });
});


// set
setTimeout("changeState()", 2200);  
function changeState(){  
    $(".index-slider-wrap").removeClass("is-hide");
}


// parallax
var bg = document.getElementById("process-stage");
var parallax_sk = new Parallax(bg, {
    limitY: 0,
});


// scroll
window.addEventListener("scroll", function() {
    const outerElement = document.querySelector(".index-process-parallax");
    const scrollText = document.querySelector(".scroll-text");
    const bounding = outerElement.getBoundingClientRect();
    const scroll = window.scrollY * 1;

    if (bounding.top <= window.innerHeight && bounding.bottom >= 0) {
        scrollText.classList.add("is-show");
        scrollText.style.transform = `translate3d(${-scroll}px, 0, 0)`;
    } else {
        scrollText.classList.remove("is-show");
        scrollText.style.transform = `translate3d(${scroll}px, 0, 0)`;
    }
});


// delay link
document.querySelectorAll('.js-delay-link').forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        var linkHref = event.target.href;

        $("#followMouse").addClass("expend");
        // $("html, body").addClass("no-scroll");

        setTimeout(function() {
            window.location.href = linkHref; // 延遲幾秒後執行連結
        }, 1000);
    });
}); 