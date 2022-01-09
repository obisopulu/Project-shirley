res_l()
window.onresize = function(){ res_l() }
function res_l(){
	
	_("cell1").style.width=window.innerWidth * 0.25 + "px"; 
	_("cell2").style.width=window.innerWidth * 0.75 + "px"; 

	_("wall_parent").style.height = ((window.innerHeight) * 0.4 ) - 1 + "px";
	_("nav_1").style.height = (window.innerHeight) * 0.1 + "px";
	_("nav_2").style.height = (window.innerHeight) * 0.1 + "px";
	_("nav_3").style.height = (window.innerHeight) * 0.1 + "px";
	_("nav_4").style.height = (window.innerHeight) * 0.1 + "px";
	_("nav_5").style.height = (window.innerHeight) * 0.1 + "px";
	_("nav_6").style.height = (window.innerHeight) * 0.1 + "px";
	
	match_screen_width=__("match_screen_width");
	for (var i=0;i<match_screen_width.length;i++){
		match_screen_width[i].style.width = ( window.innerWidth * .5 ) + "px"; 
	}

	match_screen_height=__("match_screen_height");
	for (var i=0;i<match_screen_height.length;i++){
		match_screen_height[i].style.height=window.innerHeight + "px"; 
	}
}