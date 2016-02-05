
var loc = ''
var apikey = 'abc123' //Use your own key
var httpurl= 'https://api.worldweatheronline.com/free/v2/weather.ashx?key='+ apikey + '&format=json'

//Get the IP location
$.get("http://ipinfo.io", function (response) {
	$("#city").append(response.city);
	
	loc = response.ip;
	
}, "jsonp");

//Get Sunrise info with the IP location
$(window).load(function(){
	$.ajax({
		url: httpurl + '&q=' + loc,
		dataType: "json",
		success: function(result) {
						
			var riseTime = result.data.weather[0].astronomy[0].sunrise;
			var setTime = result.data.weather[0].astronomy[0].sunset;
			
			$('.sunrise').html('<b>' + riseTime + '</b></br> Sunrise');
			$('.sunset').html('<b>' + setTime + '</b></br> Sunset');
		}
	});
});