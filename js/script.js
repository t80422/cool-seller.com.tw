// mouse moving
function mouseFuc(){
    var QQ = document.querySelector.bind(document);
    var QQon = document.addEventListener.bind(document);

    var xmouse, ymouse, yscroll;
    yscroll = window.scrollY;
    window.onscroll = function (e) {yscroll = window.scrollY; };

    QQon('mousemove', function(e){
        xmouse = e.clientX || e.pageX;
        ymouse = e.clientY || e.pageY;
    })

    var mouse = QQ('#followMouse');
    var maskCircle = QQ('#maskCir');
    var x = void 0,
            y = void 0,
            dx = void 0,
            dy = void 0,
            tx = void 0,
            ty = void 0,
            key = -1;

    var followMouse = function followMouse(){
        key = requestAnimationFrame(followMouse);
        
        if(!x || !y){
            x = xmouse;
            y = ymouse;
        }else{
            dx = (xmouse - x ) * 0.25;
            dy = (ymouse - y ) * 0.25;
            if(Math.abs(dx) + Math.abs(dy) < 0.1){
                x = xmouse;
                y = ymouse;
            }else{
                x += dx;
                y += dy;
            }
            mouse.style.left = x + 'px';
            mouse.style.top = y + yscroll + 'px';
        }
    }
    followMouse();
}
mouseFuc();

addEventListener('resize', (event) => {
    mouseFuc();
});


// nav
$(function() {
    $(".nav-btn").on('click', function() {
        $("body").addClass("no-scroll");
        $(".menu-wrap").addClass("is-active");
    });
    $(".menu-close").on('click', function() {
        $("body").removeClass("no-scroll");
        $(".menu-wrap").removeClass("is-active");
    });
});

// nav sub
$(function() {
    $(".nav-item button").on("click", function(e){
        if($(this).parent().has(".nav-sub")) {
            e.preventDefault();
        }
        if(!$(this).hasClass("active")) {
            $(".nav-sub").slideUp();
            $(".nav-item button").removeClass("active");
            $(this).next(".nav-sub").slideDown();
            $(this).addClass("active");
        }
        else if($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).next(".nav-sub").slideUp();
        }
    });
});


// nav scroll
var headerWrap = document.querySelector(".header-wrap");
window.addEventListener("scroll", function() {
    // 取得滾動的垂直位移量
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // 判斷是否超過 50 像素，並根據結果添加或移除 "is-scrolling" 類別
    if (scrollTop > 50) {
        headerWrap.classList.add("is-scrolling");
    }
    else {
        headerWrap.classList.remove("is-scrolling");
    }
});


// menu
$(function() {
    $(".menu-btn").on("click", function(e){
        if($(this).parent().has(".nav-sub")) {
            e.preventDefault();
        }
        if(!$(this).hasClass("is-active")) {
            $(".menu-sub").slideUp();
            $(".menu-btn, .menu-item").removeClass("is-active");
            $(this).parent().addClass("is-active");
            $(this).next(".menu-sub").slideDown();
            $(this).addClass("is-active");
        }
        else if($(this).hasClass("is-active")) {
            $(this).parent().removeClass("is-active");
            $(this).removeClass("is-active");
            $(this).next(".menu-sub").slideUp();
        }
    });
});


// footer menu
$(function() {
    $(".footer-menu-btn").on("click", function(e){
        if($(this).parent().has(".footer-menu-sub")) {
            e.preventDefault();
        }
        if(!$(this).hasClass("is-active")) {
            $(".footer-menu-sub").slideUp();
            $(".footer-menu-btn").removeClass("is-active");
            $(".footer-menu-btn").prev().removeClass("is-active");
            $(this).next(".footer-menu-sub").slideDown();
            $(this).addClass("is-active");
            $(this).prev().addClass("is-active");
        }
        else if($(this).hasClass("is-active")) {
            $(this).removeClass("is-active");
            $(this).next(".footer-menu-sub").slideUp();
            $(this).prev().removeClass("is-active");
        }
    });
});


// overlay
$(function() {
    $(".js-overlay").on('click', function() {
        $("html, body").removeClass("no-scroll");
        $(this).removeClass("is-active");
        $(".nav-btn").removeClass("is-active");
        $(".nav-wrap").removeClass("is-active");
    });
});


// gotop
$(function() {
    // $(window).scroll(function() {
    //     if ($(this).scrollTop() > 240) {
    //         $(".btn-top").fadeIn();
    //     } else {
    //         $(".btn-top").fadeOut();
    //     }
    // });
    $(".btn-top").click(function() {
        $("body, html").animate({
            scrollTop: 0
        }, 500);
    });
});


// scroll animation
AOS.init({
    easing: "ease-in-out-sine",
    once: true,
});


// float bottom
$(function() {
    var windowHeight = $(window).height();

    // 监听滚动事件
    $(window).scroll(function() {
        var footerPosition = $(".footer-wrap").offset().top;

        // 计算footer元素底部的位置
        var footerBottom = footerPosition + $(".footer-wrap").height();

        // 获取当前滚动位置
        var scrollPosition = $(window).scrollTop();

        // 判断footer是否在可视范围内
        if (scrollPosition + windowHeight >= footerPosition && scrollPosition <= footerBottom) {
            $(".float-wrap").addClass("fixed-bottom");
        } else {
            $(".float-wrap").removeClass("fixed-bottom");
        }

        if ($(this).scrollTop() > 240) {
            $(".float-wrap").fadeIn();
        } else {
            $(".float-wrap").fadeOut();
        }
    });
});
  

// float
$(function() {
    $(".btn-messenger").on('click', function() {
        $(".msg-popup").fadeIn();
    });
    $(".msg-popup .btn-close").on('click', function() {
        $(".msg-popup").fadeOut();
    });
});


// scroll
$(document).ready(function(){
    $(".scroll-down").click(function(){
        $('html, body').animate({
            scrollTop: $("#scrollDown").offset().top
        }, 500);
    });
});