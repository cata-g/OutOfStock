const selectElement = function(element){
    return document.querySelector(element);
};

let menuToggler = selectElement('.menu-toggle');
let body = selectElement('body');
var w = screen.width;

menuToggler.addEventListener('click', function(){
   body.classList.add('open'); 
});

function Close(){
    if(w < 900){
    body.classList.remove('open'); 
    }
}
//Scroll reveal
window.sr = ScrollReveal();

sr.reveal('.animate-left', {
    origin: 'left',
    duration: 1000,
    distance: '25rem',
    delay: 300
});

sr.reveal('.animate-right', {
    origin: 'right',
    duration: 1000,
    distance: '25rem',
    delay: 300
});

sr.reveal('.animate-top', {
    origin: 'top',
    duration: 1000,
    distance: '25rem',
    delay: 600
});

sr.reveal('.animate-bottom', {
    origin: 'bottom',
    duration: 1000,
    distance: '25rem',
    delay: 600
});

    $("#Tricou1").click(function(){
        $("#tricoul1").toggle();
        $("#tricoul2").hide();
        $("#tricoul3").hide();
       
     
    });
    $("#Tricou2").click(function(){
        $("#tricoul2").toggle();
        $("#tricoul1").hide();
        $("#tricoul3").hide();
    });
    $("#Tricou3").click(function(){
        $("#tricoul3").toggle();
        $("#tricoul2").hide();
        $("#tricoul1").hide();
    });
   $('#form').submit(function(e){
    e.preventDefault();
    //then do the submit.
});


$(function() {
   
    $(".form-control").on('focus', function(){

        $(this).parents(".form-group").addClass('focused');

    });

    $(".form-control").on('blur', function(){

        $(this).parents(".form-group").removeClass('focused');

    });

});







