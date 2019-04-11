$(function () {
    /*$('.menu1, .menu2, .form').perfectScrollbar();
	window.onload = function () {
		var header = document.getElementById('background-image');
		header.onmousemove = function(e) {
            var x = -(e.clientX/10);
            var y = -(e.clientY/10);
            this.style.backgroundPosition = x + 'px ' + y + 'px';
		};
	};*/
    $('.ripple').on('click', function (event) {
        event.preventDefault();
        var $div = $('<div/>'),
        btnOffset = $(this).offset(),
        xPos = event.pageX - btnOffset.left,
      	yPos = event.pageY - btnOffset.top;
        $div.addClass('ripple-effect');
        var $ripple = $(".ripple-effect");
        $ripple.css("height", $(this).height());
        $ripple.css("width", $(this).height());
        $div
        .css({
            top: yPos - ($ripple.height()/2),
            left: xPos - ($ripple.width()/2),
            background: $(this).data("ripple-color")
        }) 
        .appendTo($(this));
        window.setTimeout(function(){
            $div.remove();
        }, 2000);
    }); 
});
$(document).ready(main);
function main () {
    var mql = window.matchMedia("screen and (max-width:550px)");
    var contador = 1;
	$('.menu1, .menu').click(function(){
		if (contador == 1) {
            if (mql.matches){
                $('.menu1').animate({
                    left: '0'
                });
            } else {
                $('.menu1').animate({
                    left: '0'
                });
            }
			$('.menu2').animate({
				left: '60px'
			});
            $('.menu').addClass('cover');
			contador = 0;
            $('.bt-menu span').addClass('icon-cross animated rotateIn');
			$(".bt-menu span").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      		    $(this).removeClass('animated rotateIn');
            });
            $('.bt-menu span').removeClass('icon-menu');
		} else {
			contador = 1;
            if (mql.matches){
                $('.menu1').animate({
                    left: '-30px'
                });
            } else {
                $('.menu1').animate({
                    left: '0'
                });
            }
			$('.menu2').animate({
				left: '-100%'
			});
            $('.menu').removeClass('cover');
            $('.bt-menu span').addClass('icon-menu animated flipInX');
			$(".bt-menu span").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      		    $(this).removeClass('animated flipInX');
            });
            $('.bt-menu span').removeClass('icon-cross');
		}
	});
	$('.submenu').click(function(){	$(this).children('.children').slideToggle();
	});
    var contar = 1;
    $('.ingresar-btn, .cerrar').click(function(){
        if (contar == 1) {
            $('.form').animate({
                top: '40px'
            });
            $('.formu').addClass('cover2');
            $('.cerrar').animate({
                top: '15px'
            });
            contar = 0;
        } else {
            contar = 1;
            $('.form').animate({
                top: '-400px'
            });
            $('.formu').removeClass('cover2');
            $('.cerrar').animate({
                top: '-100%'
            });
        }
    });
}
$(document).ready(function() {
	$("#send").click(function() {
		var email = $("#email").val();
		var nombre = $("#nombre").val();
		var tel = $("#tel").val();
		var mensaje = $("#mensaje").val();
		if (email === '' && nombre === '' && tel === '' && mensaje === '') {
			$(".form-group").addClass('animated bounce');
			$(".form-group").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      		$(this).removeClass('animated bounce');$("#email").focus();
			});
		} else if (!(validateEmail(email)) || email === '') {
			$("#email").addClass('animated shake');
			$("#email").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('animated shake'); $("#email").focus();
			});
		} else if (nombre === '') {
			$("#nombre").addClass('animated shake');
			$("#nombre").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		    $(this).removeClass('animated shake'); $("#nombre").focus();
			});
		} else if (!(validateTel(tel)) || tel === '') {
			$("#tel").addClass('animated shake');
			$("#tel").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('animated shake'); $("#tel").focus();
			});
		} else if (mensaje === '') {
			$("#mensaje").addClass('animated shake');
			$("#mensaje").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('animated shake'); $("#mensaje").focus();
			});
		} else  {
            /*this.form.submit();*/
			$.post("../HTML/form.php", {
				email1: email,
				nombre1: nombre,
				tel1: tel
			}, function(data) {

				if (data == 'success') {
					$("form-group")[0].reset();
				}
				alert(data);
			});

			$(".form-group").addClass('animated zoomInDown');
			$(".GraciasMsg").html('Gracias !!').addClass('animated zoomInDown');
            $(".form-group").reset();
		}
	});
});