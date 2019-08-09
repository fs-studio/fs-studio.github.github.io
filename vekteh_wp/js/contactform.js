jQuery(document).ready(function($) {

	$(".ajax-contact-form").submit(function() {
		var str = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "https://mst-krd.com/wp-content/themes/vekteh/contact.php",data: str,
			success: function(msg) {
				if(msg == 'OK') {
					alert('Спасибо за обращение. В скором времени с Вами свяжется наш специалист!');
					$(".modal").hide(300);
				} else {
					alert('Произошла ошибка. Пожалуйста, свяжитесь с нами по номеру телефона в разделе "Контакты"');
				}
			}
		});
		return false;
	});
});