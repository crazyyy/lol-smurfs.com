
	var rk_widget = document.querySelector('#ruk_rs_container');
	var rk_overlay = document.querySelector('#ruk_rs_widget');

	function showRukReviews()
	{
		rk_overlay.classList.remove('ruk_hidden');
		rk_widget.style.left = ((parseInt(window.innerWidth)/2) - 300) + "px";
		rk_widget.style.top = 100 + "px";

	}

	function hideRukReviews()
	{
		rk_overlay.classList.add('ruk_hidden');
	}
