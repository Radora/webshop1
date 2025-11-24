jQuery(window).load(function () { // makes sure the whole site is loaded
    jQuery('#status').fadeOut(); // will first fade out the loading animation
    jQuery('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    jQuery('body').delay(350).css({'overflow': 'visible'});
});

jQuery(document).ready(function () {

    // Define Headerslide Height
    var wheight = jQuery(window).height();
    jQuery(".headerslider-item").css("height", wheight + "px");

});