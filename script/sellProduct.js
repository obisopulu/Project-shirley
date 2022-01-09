_("category").onchange = function (){
	
	if (_("category").value == "Pet" || _("category").value == "Livestock"){
		
	x = "<select name='sub_category' id='lga' style='background:rgba(0,0,0,.2); border:none; height:40px; padding:10px; margin:10px; width:90%'><option disabled selected>Select Sub Category</option>";

	if (_("category").value == "Pet"){
		x += "<option>Birds</option> <option>Camels</option> <option>Cats</option> <option>Dogs</option> <option>Donkeys</option> <option>Fish</option> <option>Hamsters</option> <option>Horses</option> <option>Rabbits</option> <option>Other</option>"	}
		
	if (_("category").value == "Livestock"){
		x += "<option>Cows</option> <option>Chicken</option> <option>Ducks</option> <option>Fish</option> <option>Goats</option> <option>Pigs</option> <option>Rabbits</option> <option>Sheep</option> <option>Turkey</option> <option>Other</option>"	}
		
		x += "</select>";
		
		_("category_options").innerHTML = x
		
	}else{
		
		_("category_options").innerHTML = ""
		
	}
}