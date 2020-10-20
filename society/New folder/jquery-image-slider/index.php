<html
<head>
<title>jQuery Image Slider</title>
<SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
/* slider.js */
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
</script>
</head>
<body>
<div>
<div id="slider-div">
	<img src="1.jpg">
	<img src="2.jpg">
	<img src="3.jpg">
	<img src="4.jpg">
</div>
<script>
$("#slider-div").startSlider();
</script>
</body>
</html>