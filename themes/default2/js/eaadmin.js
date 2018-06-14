$(document).ready( function() {
	
	$('#sidebar-toggle').click( function() {

		if ($(this).hasClass('in')) {
			$('#sidebar').animate({
				left: -60
			}, 100);

			$('#main').animate({
				marginLeft: 0
			}, 100);

			$(this).removeClass('in');
		}
		else {
			$('#sidebar').animate({
				left: 0
			}, 100);

			$('#main').animate({
				marginLeft: 60
			}, 100);

			$(this).addClass('in');
		}

		return false;
		
	});

	$('.sidebarTooltip').tooltip({
		animation: true,
		placement: "right",
		trigger: "hover focus"
	});

}); // end of file

