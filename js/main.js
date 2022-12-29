$(document).ready(function(){
	// main
	$("#trangchu-mcs").css("display", "block");
	$("#nav-mcs").addClass("active");

	$("#nav-sothich").click(function() {
		clearActive();
		$(this).addClass("active");
		$("#trangchu-sothich").css("display", "block");
		$("#trangchu-lienhe").css("display", "none");
		$("#trangchu-mcs").css("display", "none");
	});

	$("#nav-mcs").click(function() {
		clearActive();
		$(this).addClass("active");
		$("#trangchu-mcs").css("display", "block").addClass("active");
		$("#trangchu-sothich").css("display", "none");
		$("#trangchu-lienhe").css("display", "none");
	});

	$("#nav-lienhe").click(function() {
		clearActive();
		$(this).addClass("active");
		$("#trangchu-sothich").css("display", "none");
		$("#trangchu-mcs").css("display", "none");
		$("#trangchu-lienhe").css("display", "block");
	});
});

function clearActive() {
	$("#nav-sothich").removeClass("active");
	$("#nav-mcs").removeClass("active");
	$("#nav-lienhe").removeClass("active");
}

function email() {
	prompt("Gmail của tôi ở bên dưới", "rinle10032003@gmail.com");
}
function github(){
	alert("Chưa thêm link Bé ơi");
}