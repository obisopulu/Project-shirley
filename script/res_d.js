if( window.innerHeight > window.innerWidth ){res_p();}else{res_l();}

window.onresize = function(){
	//_("diver").innerHTML = window.innerHeight
if( window.innerHeight > window.innerWidth ){res_p();}else{res_l();}
}
function res_l(){
	_("res_foot1").style.display = "none";
	_("res_foot2").style.display = "block";
	
	_("cell1").style.width=window.innerWidth * 0.25 + "px"; 
	_("cell2").style.width=window.innerWidth * 0.5 + "px"; 
	_("cell3").style.width=window.innerWidth * 0.25 + "px"; 

	_("wall_table").style.height = window.innerHeight + "px";
	//_("wall_parent").style.height = ((window.innerHeight) * 0.7 ) + "px";
	_("nav_1").style.height = (window.innerHeight) * 0.1 + "px";
	_("nav_2").style.height = (window.innerHeight) * 0.1 + "px";
	_("nav_3").style.height = (window.innerHeight) * 0.1 + "px";
	
	
	if(window.innerWidth < 900 ){
		_("res_foot2").style.display = "none";
		
		_("match_screen_width").style.width = ( window.innerWidth * .75 ) + "px";
	}else{
		_("res_foot2").style.display = "block";
		_("foot_ad").style.height = (window.innerHeight * 0.4) - 20 + "px";
		__("foot_1")[1].style.height = ((window.innerHeight) * 0.15) - 20  + "px";
		__("foot_2")[1].style.height = ((window.innerHeight) * 0.15) - 20  + "px";
		__("foot_3")[1].style.height = ((window.innerHeight) * 0.15) - 20  + "px";
		__("foot_4")[1].style.height = ((window.innerHeight) * 0.15) - 20  + "px";

		_("match_screen_width").style.width = ( window.innerWidth * .5 ) + "px"; 
	}

	match_screen_height=__("match_screen_height");
	for (var i=0;i<match_screen_height.length;i++){
		match_screen_height[i].style.height=window.innerHeight + "px"; 
	}
}
function res_p(){
	_("res_foot1").style.display = "block";
	_("res_foot2").style.display = "none";
	
	_("cell1").style.width=window.innerWidth * 0.28 + "px";
	_("cell2").style.width=window.innerWidth * 0.72 + "px";
	_("cell3").style.width=window.innerWidth * 0 + "px";

	_("wall_table").style.height = (window.innerHeight * 0.5) + "px";
	//_("wall_parent").style.height = (window.innerHeight ) * 0.7 + "px";
	_("nav_1").style.height = (window.innerHeight ) * 0.1 + "px";
	_("nav_2").style.height = (window.innerHeight ) * 0.1 + "px";
	_("nav_3").style.height = (window.innerHeight ) * 0.1 + "px";
	
	
	
	if(window.innerHeight < 900 ){
		_("res_foot1").style.display = "none";
	}else{
	
	_("wall_table").style.height = (window.innerHeight * 0.5) + "px";
	//_("wall_parent").style.height = (window.innerHeight * 0.5 ) * 0.7 + "px";
	_("nav_1").style.height = (window.innerHeight * 0.5 ) * 0.1 + "px";
	_("nav_2").style.height = (window.innerHeight * 0.5 ) * 0.1 + "px";
	_("nav_3").style.height = (window.innerHeight * 0.5 ) * 0.1 + "px";
	
	_("res_foot1").style.display = "block";
	__("foot_1")[0].style.height = ((window.innerHeight * 0.5 ) * 0.25) - 20  + "px";
	__("foot_2")[0].style.height = ((window.innerHeight * 0.5 ) * 0.25) - 20  + "px";
	__("foot_3")[0].style.height = ((window.innerHeight * 0.5 ) * 0.25) - 20  + "px";
	__("foot_4")[0].style.height = ((window.innerHeight * 0.5 ) * 0.25) - 20  + "px";
	}
	
	_("match_screen_width").style.width = ( window.innerWidth * .72 ) + "px"; 

	match_screen_height=__("match_screen_height");
	for (var i=0;i<match_screen_height.length;i++){
		match_screen_height[i].style.height=window.innerHeight + "px"; 
	}
}