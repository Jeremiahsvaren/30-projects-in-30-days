$.get("http://ipinfo.io", function (response) {
	$("#state").append(response.region);
  var region = response.region
  
  $("#map").html("<img src='http://www.theus50.com/images/state-location/" 
			+ region.toLowerCase() + "-locatemap.gif' alt='Location of " 
			+ region + " in the United States'/>");
			
  $("#flag").html("<img src='http://www.theus50.com/images/state-flags/" 
			+ region.toLowerCase() + "-flag.jpg' alt='Official " 
			+ region + " state flag.'/>");

}, "jsonp");
