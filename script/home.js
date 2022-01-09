var t=setInterval("im()",5000);
x = 0;
im();
function im(){
		x += 1;
	_("wall_parent1").style.backgroundImage = "url(img/wall" + x + ".jpg)"
	if( x == 1 ){w1 = "1%"}
	if( x == 2 ){w1 = "50%"}
	if( x == 3 ){w1 = "100%"}
	
	_("wallSlider").style.width = w1;
	
	if (x == 3){x = 0}
}