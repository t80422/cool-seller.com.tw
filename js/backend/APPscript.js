// function safariHacks() {
//     let windowsVH = window.innerHeight / 100;
//     document.querySelector('.wrap').style.setProperty('--vh', windowsVH + 'px');
//     window.addEventListener('resize', function() {
//         document.querySelector('.wrap').style.setProperty('--vh', windowsVH + 'px');
//     });
// }

// safariHacks();

$(function(){
    $('.about-btn.about').on('click',function(){
        $('.popup-overlay').fadeIn()
        $('#about').fadeIn()
    })
    $('.about-btn.connect').on('click',function(){
        $('.popup-overlay').fadeIn()
        $('#connect').fadeIn()
    })
    $('.about-btn.location').on('click',function(){
        $('.popup-overlay').fadeIn()
        $('#location').fadeIn()        
    })

    $('.popup-overlay , .btn-close').on('click',function(){
        $('.popup-overlay , .popup-wrap').fadeOut();
    })
    $('.contain-nav .nav-list .nav-item').on('click',function(){
        $('.contain-nav .nav-item ,.contain-changepage .contain-text').removeClass('is-active')
        let index = $(this).index();
        $(this).addClass('is-active');     
        $('.contain-changepage .contain-text:eq('+index+')').addClass('is-active');
    })
    $('.search-clear').on('click',function(){
        $('.search-inp input').val('')
    })
    // $('.plus-number').on('click',function(){
    //     let val = isNaN(parseInt($(this).siblings('.input-number').find('input').val() ?? 0)) ?
    //                 0 : parseInt($(this).siblings('.input-number').find('input').val() ?? 0);
    //     if(val < 999){
    //         $(this).siblings('.input-number').find('input').val(val + 1)
    //     }
    // })
    // $('.reduce-number').on('click',function(){
    //     let val = isNaN(parseInt($(this).siblings('.input-number').find('input').val() ?? 0)) ?
    //                 0 : parseInt($(this).siblings('.input-number').find('input').val() ?? 0);
    //     // console.log(val)
    //     if(val > 0){
    //         $(this).siblings('.input-number').find('input').val(val - 1)
    //     }
    // })
})
