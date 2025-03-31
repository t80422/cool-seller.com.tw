// 定义全局变量以存储ScrollTrigger实例
var scrollTriggerInstance;

// 初始化ScrollTrigger实例
function initScrollTrigger() {
    scrollTriggerInstance = gsap.timeline({
        scrollTrigger: {
            trigger: ".process-main",
            start: "center center",
            end: "+=3000",
            scrub: true,
            pin: true,
            markers: false,
        }
    })

    .fromTo(".step01", { opacity: 1 },{ opacity: 0, top:"-150px", duration: 5 }, "+=4")
    .fromTo(".process-list",  { opacity: 1 },{ opacity:1 }, "-=1")
    .to(".step02",  { opacity: 1, top:0 }, "<")
    .to(".step02",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step03",  { opacity: 1 , top:0, duration: 5 }, "-=1")
    .to(".step03",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step04",  { opacity: 1, top:0 , duration: 5 }, "-=1")
    .to(".step04",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step05",  { opacity: 1, top:0 , duration: 5 }, "-=1")
    .to(".step05",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step06",  { opacity: 1, top:0 , duration: 5 }, "-=1")
    .to(".step06",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step07",  { opacity: 1, top:0 , duration: 5 }, "-=1")
    .to(".step07",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step08",  { opacity: 1, top:0 , duration: 5 }, "-=1")
    .to(".step08",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step09",  { opacity: 1, top:0 , duration: 5 }, "-=1")
    .to(".step09",  { opacity: 0 , top:"-150px", duration: 5 }, "+=4")
    .to(".step10",  { opacity: 1 , top:0, duration: 5 }, "-=1");

    // 获取高度
    var p = $(".step10").outerHeight();
    var d = $(".step10 hgroup").position().top;
    var t = p - d;
    $(".hide-mask").css("height", t);
}

// 检查窗口大小并销毁或初始化ScrollTrigger实例
function checkWindowSize() {
    if (window.innerWidth < 768) {
        if (scrollTriggerInstance) {
            scrollTriggerInstance.scrollTrigger.kill(); // 销毁ScrollTrigger实例
            scrollTriggerInstance = null; // 清除全局变量
        }
    } else {
        if (!scrollTriggerInstance) {
            initScrollTrigger(); // 初始化ScrollTrigger实例
        }
    }
}

// 初始化ScrollTrigger实例
document.addEventListener("DOMContentLoaded", function() {
    if (window.innerWidth >= 768) {
        // 加载 ScrollTrigger 相关代码
        initScrollTrigger();
    }
});

// 监听窗口大小变化事件
window.addEventListener("resize", checkWindowSize);


// get step10 top
function getLastStepHeight() {
    var step10H = $(".step10").outerHeight();
    var step10TextH = $(".step10 hgroup").position().top;
    var step10TotalH = step10H - step10TextH;
    $(".step10 .hide-mask").css("height", step10TotalH);
}
getLastStepHeight();

window.addEventListener("resize", getLastStepHeight);




window.addEventListener("scroll", scrollAnimate);
function scrollAnimate() {
    $('.process-item').each(function() {
        var $this = $(this);
        if ($this.css('opacity') != '0') {
            $this.addClass("animate");
        } else {
            $this.removeClass("animate");
        }
    });
}