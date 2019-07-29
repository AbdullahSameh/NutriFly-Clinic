/*global $, */

$(function () {
	"use strict";
    
    //$('.register').parents('body').css('background-color', '#f5f5f5'); // background Color for Login & Signup Page 
    
    $('.log-card .log-head div').click(function () {  // For toggle between Login & Signup 
        
        $(this).addClass('selected').siblings().removeClass('selected');
        
        $('.log-card form').hide();
        
        $('.' + $(this).data('class')).fadeIn();
    });
    
    $('.navbar .nav-list .scroll-link, #scroll-link').on('click', function (e) {   // For Smooth scroll
        e.preventDefault();
        var location = $(this).attr('data-link');
        //window.location.href = location;
        $('html, body').animate({
            scrollTop: $('#' + $(this).data('scroll')).offset().top
        }, 1000);
    });
    
    $('.nav-toggler').on('click', function () {  // Toggle For Show Navbar On Tab and Mobile Screen
        $('.header .navbar .nav-list').slideToggle();
    });

    $.fn.errorMessage = function (character) {   // Check form message errors function *Main Page* 
        
        $(this).blur(function () {

            if ($(this).val().length < character) {
                $(this).css('border', '1px solid #f00');
                $(this).parent().find('.err-sms').fadeIn().delay(2000).fadeOut();

            } else {
                $(this).css('border', '1px solid #080');
            }
        });
    };
    $('.m-name').errorMessage(3);
    $('.m-email').errorMessage(7);
    $('.m-subject').errorMessage(3);
    $('.m-message').errorMessage(10);
    
    $('.profile .show-pass').click(function () {  // Toggle For Show Pass And Hide It *Profile Page*
        
        $(this).toggleClass('show');
        
        if ($(this).hasClass('show')) {
            
            $(this).html('<i class="far fa-eye-slash"></i>').prev('input').attr('type', 'text');
            
        } else {
            $(this).html('<i class="fas fa-eye"></i>').prev('input').attr('type', 'password');
        }
    });
    
    $('.item .directory li').on('click', function () {  // Toggle Between directory of Item *Item Page*
        
        $(this).addClass('active').siblings().removeClass('active');
        $('.directory .direct-content > div').hide();
        $('.' + $(this).data('class')).show();
    });
});