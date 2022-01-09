_("category").onchange = function(){

	if( this.value == "pet" || this.value == "livestock" ){
		_("category").style.width = "49%"
		_("sub_category_options").style.display = "inline-block"
	
	x = "<select name='sub_category' id='sub_category'><option selected value = 'any'>Any Type</option>";
	
	if (_("category").value == "pet"){
		x += "<option>Bird</option> <option>Camel</option> <option>Cat</option> <option>Dog</option> <option>Donkey</option> <option>Fish</option> <option>Hamster</option> <option>Horse</option> <option>Rabbit</option> <option>Other</option>"	}
		
	if (_("category").value == "livestock"){
		x += "<option>Cow</option> <option>Chicken</option> <option>Duck</option> <option>Fish</option> <option>Goat</option> <option>Pig</option> <option>Rabbit</option> <option>Sheep</option> <option>Turkey</option> <option>Other</option>"
		}

	x += "</select>";

	_("sub_category_options").innerHTML = x
	
	}else{
		
		_("category").style.width = "100%"
		_("sub_category_options").style.display = "none"
		
	}

}