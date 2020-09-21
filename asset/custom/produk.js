$(document).ready(function(){
    $('.slider1').owlCarousel({
        items: 1,
        slideSpeed: 300,
        nav: false,
        dots: false,
        loop: true,
        autoplay: true,
        stopOnHover: true
    });
    
    $('.detailProduk').click(function(){
        let id = $(this).attr('value');
        $.ajax({
            url: ""
        })
    })
})