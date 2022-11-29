/*window.addEventListener('scroll',function(){
    if(window.screenTop() > 50){
        alert("hellow Developer");
    }
})*/

$(document).ready(function() {
    $('.bars').on('click', function(ev){
        $('.navbar-toggle').addClass('navbar-show');
        ev.preventDefault();
    })
    
    $('.close-icon').click(function(ev) {
        $('.navbar-toggle').removeClass('navbar-show');
        ev.preventDefault();
    })
})
