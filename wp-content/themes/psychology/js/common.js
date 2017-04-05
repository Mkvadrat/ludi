$(document).ready(function() {
	//Плавный скролл до блока .div по клику на .scroll
	//Документация: https://github.com/flesler/jquery.scrollTo
	$("#scroll").click(function() {
		$.scrollTo($("#change-flat"), 800, {
			offset: -90
		});
	});
});

$(window).scroll(function(){
	var pagePos = $(this).scrollTop();

	$('.banner').css('background-position', pagePos / 12 + '% 0')
});

$(document).ready(function() {
	$("a.ancLinks").click(function () {
		var elementClick = $(this).attr("href");
		var destination = $(elementClick).offset().top;
		$('html,body').animate( { scrollTop: destination }, 1100 );
		return false;
	});
});
