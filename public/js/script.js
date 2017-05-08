var l1 = $(".slide2 .quote-line1");
var l2 = $(".slide2 .quote-line2");
var l3 = $(".slide3 .quote-line1");
var l4 = $(".slide3 .quote-line2");
var timeout = 1000; 

$(document).scroll(()=>{
	let home 		= $("#home");
	let nosotros 	= $("#nosotros");
	let beneficios 	= $("#beneficios");
	let mudanzas 	= $("#mudanzas");
	let galeria 	= $("#galeria");
	let contacto 	= $("#contacto");
	let win 		= $(window);

	if (home.is_on_screen()) {
		$(".item-selected").removeClass("item-selected");
		$($(".menu-holder .menu-item")[0]).addClass("item-selected");
	} else if (nosotros.is_on_screen()) {
		$(".item-selected").removeClass("item-selected");
		$($(".menu-holder .menu-item")[1]).addClass("item-selected");
	} else if (beneficios.is_on_screen()) {
		$(".item-selected").removeClass("item-selected");
		$($(".menu-holder .menu-item")[2]).addClass("item-selected");
	} else if (mudanzas.is_on_screen()) {
		$(".item-selected").removeClass("item-selected");
		$($(".menu-holder .menu-item")[3]).addClass("item-selected");
	} else if (galeria.is_on_screen()) {
		$(".item-selected").removeClass("item-selected");
		$($(".menu-holder .menu-item")[4]).addClass("item-selected");
	} else if (contacto.is_on_screen()) {
		$(".item-selected").removeClass("item-selected");
		$($(".menu-holder .menu-item")[5]).addClass("item-selected");
	}
});

$(window).resize(()=>{
	// HOME SLIDER
	$(".home-slider").css("height", $(window).height());
	$(".slick-slide").css("height", $(window).height());

	// TERMINOS Y CONDICIONES
	let cont = $(".quienes-somos-contenido-2");
	let mar = $("#terminosYcondiciones").css("margin-top");
	cont.width($(".quienes-somos-contenido").width());
	cont.height($(".quienes-somos-contenido").height());
	$("#terminosYcondiciones").height(cont.height()-Number(mar.substr(0,mar.length-2))*2);
});

$(document).ready(() => {
	$('[data-toggle="tooltip"]').tooltip();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// INICIALIZAR ALTURA DEL HOME SLIDER
	$(".home-slider").css("height", $(window).height());

	$(".home-slider").slick({
		autoplay: false,
		arrows: false,
		dots: true,
		draggable: false,
		autoplaySpeed: 3000
	});

	$(".slick-slide").css("height", $(window).height());

	setInterval(() => {
		$(".quote-open-1").css("left", l1.position().left);
		$(".quote-open-1").css("margin-left", $(".quote-open-1").width()*-1);
		$(".quote-close-1").css("left", l2.position().left+l2.width()+10);
		$(".quote-close-1").css("margin-top", l2.height()*-1);

		$(".quote-open-2").css("left", l3.position().left);
		$(".quote-open-2").css("margin-left", $(".quote-open-2").width()*-1);
		$(".quote-close-2").css("left", l4.position().left+l4.width()+10);
		$(".quote-close-2").css("margin-top", l4.height()*-1);
	}, 500);
	

	document.querySelector(".flecha-izq").addEventListener("click", sliderToRight);
	document.querySelector(".flecha-der").addEventListener("click", sliderToLeft);
	$(".inner-left").bind("click", sliderToRight);
	$(".inner-right").bind("click", sliderToLeft);
	$(".outer-left").bind("click", outerLeft);
	$(".outer-right").bind("click", outerRight);

	if (totalSlides == 5) {
		lindex = totalSlides - 1;
		rindex = 0;
	} else if (totalSlides == 6) {
		lindex = totalSlides - 1;
		rindex = lindex;
	} else if (totalSlides > 6) {
		lindex = totalSlides - 1;
		rindex = 5;
	}

	load_copies(lindex, rindex);
});

$(".quienes-somos-terminosYcondiciones").click(()=>{
	let cont = $(".quienes-somos-contenido-2");
	let mar = $("#terminosYcondiciones").css("margin-top");

	cont.width($(".quienes-somos-contenido").width());
	cont.height($(".quienes-somos-contenido").height());
	$("#terminosYcondiciones").height(cont.height()-Number(mar.substr(0,mar.length-2))*2);

	cont.css('display', 'block');
});

$(".quienes-somos-contenido-2-close").click(()=>{
	let cont = $(".quienes-somos-contenido-2");
	cont.css('display', 'none');
});

$('#galeria-image').on('shown.bs.modal', () => {
	let image = $(".middle").css("background-image");

	$(".img-holder").css("background-image", image);
});

$("#galeria-image").on("hide.bs.modal", ()=>{
	$(".img-holder").css("background-image", "none");
});

$(".burguer").on("click", () => {
	let menu = $(".mobile-menu-holder");
	if (!menu.height() > 0) 
		menu.height(265);
	else
		menu.height(0);
});

$(".contact-submit").on("click", ()=> {
	$(".contact-submit").prop( "disabled", true );

	let nombre, apellido, email, tel, msj;
	nombre = $("#nombre");
	apellido = $("#apellido");
	email = $("#email");
	tel = $("#telefono");
	msj = $("#mensaje");

	let input = {
		nombre: nombre.val(),
		apellido: apellido.val(),
		email: email.val(),
		telefono: tel.val(),
		mensaje: msj.val()
	};

	let valid = true;
	let error = "";

	for (let i in input){
		if (!input[i] != "") {
			error = "Todos los campos son obligatorios";
			valid = false;
		}
	}
	
	if (valid) {
		let atpos = input["email"].indexOf("@");
		let dotpos = input["email"].lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=input["email"].length) {
			error = "Ingrese un correo electrónico válido";
			valid = false;
		}
	}

	if (!valid) {
		toastr.error(error);
		$(".contact-submit").prop( "disabled", false );
	} else {
		$.ajax({
			type: "POST",
			url: "contactMail",
			data: input,
			success: () => {
				toastr.success("Correo enviado éxitosamente");

				nombre.val("");
				apellido.val("");
				email.val("");
				tel.val("");
				msj.val("");

				$(".contact-submit").prop( "disabled", false );
			}
		});
	}
});

function changeSelected(index) {
	$(".item-selected").removeClass("item-selected");
	$($(".menu-holder .menu-item")[index]).addClass("item-selected");

	if (index == 0) {
		$("body").scrollTo("#home", 1000);
	} else if (index == 1){
		$("body").scrollTo("#nosotros", 1000);
	} else if (index == 2){
		$("body").scrollTo("#beneficios", 1000);
	} else if (index == 3){
		$("body").scrollTo("#mudanzas", 1000);
	} else if (index == 4){
		$("body").scrollTo("#galeria", 1000);
	} else if (index == 5){
		$("body").scrollTo("#contacto", 1000);
	}
};

function changeSelectedMobile(index) {
	$(".item-selected").removeClass("item-selected");
	$($(".mobile-menu-holder .menu-item")[index]).addClass("item-selected");

	$(".mobile-menu-holder").height(0);

	setTimeout(()=>{
		if (index == 0) {
			$("body").scrollTo("#home", 1000);
		} else if (index == 1){
			$("body").scrollTo("#nosotros", 1000);
		} else if (index == 2){
			$("body").scrollTo("#beneficios", 1000);
		} else if (index == 3){
			$("body").scrollTo("#mudanzas", 1000);
		} else if (index == 4){
			$("body").scrollTo("#galeria", 1000);
		} else if (index == 5){
			$("body").scrollTo("#contacto", 1000);
		}
	}, 1000);
}

var slides = [
"background-image: url('images/fondo_outer.png');",
"background-image: url('images/fondo_inner.png');",
"background-image: url('images/fondo_middle.png');",
"background-image: url('images/fondo_inner.png');",
"background-image: url('images/fondo_outer.png');",
"background-color: red;",
"background-color: green;"
];
var totalSlides = slides.length;
var slider 	= $(".galeria-holder");

var lcopy 	= '<div class="galeria-slide outer left-copy mobile-grid-100 desktop-hidden tablet-hidden" style="';
var lmid 	= '" ';
var lend	= '>';

var rcopy 	= '<div class="galeria-slide outer right-copy mobile-grid-100 desktop-hidden tablet-hidden" style="'; 
var rmid 	= '" ';
var rend	= '>';
var aux 	= "";

function sliderToLeft() {
	document.querySelector(".flecha-der").removeEventListener("click", sliderToLeft);
	document.querySelector(".flecha-izq").removeEventListener("click", sliderToRight);

	let top 	= $(".outer-left");
	let jg 		= $(".inner-left");
	let mid 	= $(".middle");
	let adc 	= $(".inner-right");
	let sup 	= $(".outer-right");
	let copy 	= $(".right-copy");

	top.unbind("click", outerLeft);
	jg.unbind("click", sliderToRight);
	adc.unbind("click", sliderToLeft);
	sup.unbind("click", outerRight);
	

	let lindex = top.data("index");
	let rindex = copy.data("index")+1;

	if (rindex > totalSlides-1) {
		if (totalSlides == 5) {
			if (lindex == totalSlides-1) {
				rindex = 0;
			} else {
				rindex = 1;
			}
		} else if (totalSlides == 6){
			rindex = lindex;
		} else if (totalSlides > 6){
			rindex = 0;
		}
	}

	console.log(lindex +" "+ rindex);

	jg.addClass("outer-left-transition");
	mid.addClass("inner-left-transition");
	adc.addClass("middle-transition");
	sup.addClass("inner-right-transition");

	copy.removeClass("desktop-hidden");
	sup.removeClass("tablet-hidden");

	setTimeout(() => {
		jg.addClass("outer outer-left tablet-hidden");
		jg.removeClass("inner inner-left outer-left-transition");
		jg.bind("click", outerLeft);

		mid.addClass("inner inner-left");
		mid.removeClass("middle inner-left-transition");
		mid.removeAttr("data-toggle");
		mid.removeAttr("data-target");
		mid.bind("click", sliderToRight);

		adc.addClass("middle");
		adc.removeClass("inner inner-right middle-transition");
		adc.attr("data-toggle", "modal");
		adc.attr("data-target", "#galeria-image");

		sup.addClass("inner inner-right");
		sup.removeClass("outer outer-right inner-right-transition");
		sup.bind("click", sliderToLeft);

		top.remove();
		$(".left-copy").remove();

		copy.removeClass("right-copy");
		copy.addClass("outer-right");
		copy.bind("click", outerRight);


		load_copies(lindex, rindex);

		document.querySelector(".flecha-der").addEventListener("click", sliderToLeft);
		document.querySelector(".flecha-izq").addEventListener("click", sliderToRight);
	}, timeout);


};

function sliderToRight() {
	document.querySelector(".flecha-izq").removeEventListener("click", sliderToRight);
	document.querySelector(".flecha-der").removeEventListener("click", sliderToLeft);

	let copy 	= $(".left-copy");
	let top 	= $(".outer-left");
	let jg 		= $(".inner-left");
	let mid 	= $(".middle");
	let adc 	= $(".inner-right");
	let sup 	= $(".outer-right");

	top.unbind("click", outerLeft);
	jg.unbind("click", sliderToRight);
	adc.unbind("click", sliderToLeft);
	sup.unbind("click", outerRight);
	

	let lindex = copy.data("index")-1;
	let rindex = sup.data("index");

	if (lindex < 0) {
		if (totalSlides == 5) {
			if (rindex == 0) {
				lindex = 4;
			} else {
				lindex = 3;
			}
		} else if (totalSlides == 6){
			lindex = rindex;
		} else if (totalSlides > 6){
			lindex = totalSlides-1;
		}
	}

	console.log(lindex +" "+ rindex);

	top.addClass("inner-left-transition");
	jg.addClass("middle-transition");
	mid.addClass("inner-right-transition");
	adc.addClass("outer-right-transition");

	copy.removeClass("desktop-hidden");
	top.removeClass("tablet-hidden");

	setTimeout(()=>{
		top.addClass("inner inner-left");
		top.removeClass("outer outer-left inner-left-transition tablet-hidden");
		top.bind("click", sliderToRight);

		jg.addClass("middle");
		jg.removeClass("inner inner-left middle-transition");
		jg.attr("data-toggle", "modal");
		jg.attr("data-target", "#galeria-image");

		mid.addClass("inner inner-right");
		mid.removeClass("middle inner-right-transition");
		mid.removeAttr("data-toggle");
		mid.removeAttr("data-target");
		mid.bind("click", sliderToLeft);

		adc.addClass("outer outer-right tablet-hidden");
		adc.removeClass("inner inner-right outer-right-transition");
		adc.bind("click", outerRight);

		sup.remove();
		$(".right-copy").remove();

		copy.removeClass("left-copy");
		copy.addClass("outer-left");
		copy.bind("click", outerLeft);

		load_copies(lindex, rindex);

		document.querySelector(".flecha-izq").addEventListener("click", sliderToRight);
		document.querySelector(".flecha-der").addEventListener("click", sliderToLeft);
	}, timeout);
};

function outerRight() {
	$(".galeria-slide").css("transition", "top 0.5s, left 0.5s, transform 0.5s");
	timeout = 500;
	sliderToLeft();
	setTimeout(()=>{
		sliderToLeft();
		timeout = 1000;
		$(".galeria-slide").css("transition", "top 1s, left 1s, transform 1s");
	}, 500);
}

function outerLeft() {
	$(".galeria-slide").css("transition", "top 0.5s, left 0.5s, transform 0.5s");
	timeout = 500;
	sliderToRight();
	setTimeout(()=>{
		sliderToRight();
		timeout = 1000;
		$(".galeria-slide").css("transition", "top 1s, left 1s, transform 1s");
	}, 500);
}

function load_copies(lindex, rindex) {
	aux = lcopy;
	aux += slides[lindex];
	aux += lmid;
	aux += 'data-index="';
	aux += lindex;
	aux += '"';
	aux += lend;
	aux += lindex;
	aux += '</div>';
	slider.append(aux);
	aux = rcopy;
	aux += slides[rindex];
	aux += rmid;
	aux += 'data-index="';
	aux += rindex;
	aux += '"';
	aux += rend;
	aux += rindex;
	aux += '</div>';
	slider.append(aux);
}

$.fn.is_on_screen = function(){
	var win = $(window);
	var viewport = {
		top : win.scrollTop(),
		left : win.scrollLeft()
	};
	viewport.right = viewport.left + win.width();
	viewport.bottom = viewport.top + win.height();

	var bounds = this.offset();
	bounds.right = bounds.left + this.outerWidth();
	bounds.bottom = bounds.top + this.outerHeight();

	return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
};