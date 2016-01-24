

$(document).ready(function(){
	
	//Creates page full of boxes
	for(var i=0; i <=1000; i++){
		$('.main').append("<div class='box' style='background-color:" + hexColorMaker() + ";'></div>")
		
	};
	
	//when .box is hovered over, creates new random color
	$( ".box" ).on( "mouseenter", function() {
		$( this ).css( "background-color", hexColorMaker() );
	});
	
	
	//Function to make a random hex color
	function hexColorMaker(){
		
		var letters = '0123456789ABCDEF'.split('');
		var color = '#';
		for (var i = 0; i < 6; i++ ) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
		
	}
		
});






