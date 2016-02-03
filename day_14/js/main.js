
var city = ''
var apikey = 'abc123' //Use your own key
var httpurl= 'http://api.worldweatheronline.com/free/v1/weather.ashx?key='+ apikey + '&num_of_days=2&format=json'


$('#cityName').click(function(){
	city = $('#cityField').val();
	city = city.split(' ').join('+');
	return city;
	
});


$('#zip').click(function(){
	city = $('#zipField').val();
	return city;
});

$('.btn-group > button').click(function(){
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
});

$('button').click(function(){
	$.ajax({
		url: httpurl + '&q=' + city,
		dataType: "json",
		success: function(result) {
			var today = result.data.weather[0];
			var tomorrow = result.data.weather[1];
			
			$('.today').html('<h2>Today<h2>');
			$('.todayWeather').html('<p>' + today.weatherDesc[0].value + '</p>');
			$('.todayIcon').html('<img src="' + today.weatherIconUrl[0].value + '"/>' );
			
			$('.tomorrow').html('<h2>Tomorrow<h2>');
			$('.tomorrowWeather').html('<p>' + tomorrow.weatherDesc[0].value + '</p>');
			$('.tomorrowIcon').html('<img src="' + tomorrow.weatherIconUrl[0].value + '"/>' );
			
			if($('.btn-group > button').hasClass('fahrenheit') && $('.btn-group > button').hasClass('active')){
				$('.todayTemp').html('<p>' + today.tempMinF + ' - ' + today.tempMaxF +' F</p>');
				$('.tomorrowTemp').html('<p>' + tomorrow.tempMinF + ' - ' + tomorrow.tempMaxF +' F</p>');
			} else if ($('.btn-group > button').hasClass('celsius')){
				$('.todayTemp').html('<p>' + today.tempMinC + ' - ' + today.tempMaxC +' C</p>');
				$('.tomorrowTemp').html('<p>' + tomorrow.tempMinC + ' - ' + tomorrow.tempMaxC +' C</p>');
			}
		}
	});
});


