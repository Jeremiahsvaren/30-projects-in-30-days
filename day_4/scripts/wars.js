

function get_browser_info(){
    var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || []; 
    if(/trident/i.test(M[1])){
        tem=/\brv[ :]+(\d+)/g.exec(ua) || []; 
        return {name:'IE',version:(tem[1]||'')};
        }   
    if(M[1]==='Chrome'){
        tem=ua.match(/\bOPR\/(\d+)/)
        if(tem!=null)   {return {name:'Opera', version:tem[1]};}
        }   
    M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    //if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
    return {
      name: M[0]
    };
 }


var browser = get_browser_info().name;


$("#firefox").click(function() {
	if(browser === "Firefox"){
		$("#content").text("I see we have similar tastes! Did you know that the Firefox icon is actually a Red Panda?");
	} else{
		$("#content").text("Sooo why are you using " + browser + "?");
	}
}); 
$("#chrome").click(function() {
	if(browser === "Chrome"){
		$("#content").text("Oh so your a Google Fan huh?");
	} else{
		$("#content").text("Sooo why are you using " + browser + "?");
	}
}); 
$("#opera").click(function() {
	if(browser === "Opera"){
		$("#content").text("Opera is great when you have a slow internet speed.");
	} else{
		$("#content").text("Sooo why are you using " + browser + "?");
	}
}); 
$("#ie").click(function() {
	if(browser === "IE"){
		$("#content").text("Hey the 90's called and they were looking for you.");
	} else{
		$("#content").html('<img src="images/ie_meme.png"/>');
	}
}); 
$("#safari").click(function() {
	if(browser === "Safari"){
		$("#content").text("Do we have an apple fan in hear?");
	} else{
		$("#content").text("Huh you must not be on your MacBook right now? Why else would you use " + browser + "?");
	}
}); 







