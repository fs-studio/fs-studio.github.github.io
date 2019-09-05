ymaps.ready(function () {
	var myMap = new ymaps.Map('map', {
		center: [54.752656, 56.002053],
		zoom: 18
		}, {
			searchControlProvider: 'yandex#search'
		}),

		// Создаём макет содержимого.
		MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
			'<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
		),

		myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
			hintContent: 'Нажмите',
			balloonContent: 'Здесь находится ООО "Добрый картон"'
		}, {
				// Опции.
				// Необходимо указать данный тип макета.
				iconLayout: 'default#image',
				// Своё изображение иконки метки.
				iconImageHref: 'img/maps.png',
				// Размеры метки.
				iconImageSize: [64, 64],
				// Смещение левого верхнего угла иконки относительно
				// её "ножки" (точки привязки).
				iconImageOffset: [-32, -64]
		});
							
	myMap.geoObjects
		.add(myPlacemark);
});