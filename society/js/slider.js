$.fn.startSlider = function(){
	var simgderDIV=this;
	var img=simgderDIV.find("img");
	
	simgderDIV.css({overflow:"auto"});
	img.css({position:'absolute'});
	img.hide().first().show().addClass("active");
	
	var iterateTickerElement = function() {
		setInterval(function(){
			var next = $("img.active").next();
			$("img.active").hide("slide",{direction:'left'},2000);
			$("img.active").removeClass("active");
			if(next.length == 0) next = $("img").first();
			next.addClass("active");
			next.show("slide",{direction:'right'},1000);
		},2000);
	}	
	iterateTickerElement();
}