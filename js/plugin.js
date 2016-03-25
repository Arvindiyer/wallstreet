/**
 * Created by Arvind on 16-Sep-15.
 */

// Toast Notification
/*$(window).load(function() {
 setTimeout(function() {
 Materialize.toast('<span>Hello! Welcome.</span>', 1500);
 }, 1500);
 setTimeout(function() {
 Materialize.toast('<span>You have task to </span><a class="btn-flat yellow-text" href="#">Do<a>', 3000);
 }, 5000);
 });
 */

$('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200 // Transition out duration
    }
);

/**
 * Created by Arvind on 16-Sep-15.
 */
$(document).ready(
    function () {
        $("html").niceScroll();
        $(".button-collapse").sideNav();
    }
);

$('a.page-scroll').click(function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top - 50
            }, 900);
            return false;
        }
    }
});

//sidebar for mobile closing and opening
$('.sidebar-collapse ').sideNav({
        menuWidth: 240, // Default is 240
        // edge: 'left', // Choose the horizontal origin
        // closeOnClick: true// Closes side-nav on <a> clicks, useful for Angular/Meteor

    }
);
$('.sidebar-collapse ').sideNav('hide');

// Materialize Tabs
$('.tab-demo').show().tabs();
$('.tab-demo-active').show().tabs();




