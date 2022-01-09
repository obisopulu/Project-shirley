 function removePost(x, y) {
	
	optionCancel()
	__("removePostOptions")[x].style.display = "block"
	__("removePost")[x].style.border = "thin #FFF solid"
}
function boostPost(x, y) {
	
	optionCancel()
	__("boostPostOptions")[x].style.display = "block"
	__("boostPost")[x].style.border = "thin #FFF solid"
}
function sharePost(x, y) {
	
	optionCancel()
	__("sharePostOptions")[x].style.display = "block"
	__("sharePost")[x].style.border = "thin #FFF solid"
}
function soldPost(x, y) {
	
	optionCancel()
	__("soldPostOptions")[x].style.display = "block"
	__("soldPost")[x].style.border = "thin #FFF solid"
}

function optionCancel() {
	boostPostOptions = __("boostPostOptions");
	boostPostx = __("boostPost")
	for (var i = 0; i < boostPostOptions.length; i++){
		boostPostOptions[i].style.display = "none"; 
		boostPostx[i].style.border = "none"
	}
	removePostOptions = __("removePostOptions");
	removePostx = __("removePost")
	for (var i = 0; i < removePostOptions.length; i++){
		removePostOptions[i].style.display = "none"; 
		removePostx[i].style.border = "none"
	}
	sharePostOptions = __("sharePostOptions");
	sharePostx = __("sharePost")
	for (var i = 0; i < sharePostOptions.length; i++){
		sharePostOptions[i].style.display = "none"; 
		sharePostx[i].style.border = "none"
	}
	soldPostOptions = __("soldPostOptions");
	soldPostx = __("soldPost")
	for (var i = 0; i < soldPostOptions.length; i++){
		soldPostOptions[i].style.display = "none"; 
		soldPostx[i].style.border = "none"
	}
}

function boostPostYes(y) {
	window.open("posts.php?xxx="+y,"_self")
}
function removePostYes(y) {
	window.open("posts.php?del="+y,"_self")
}
function soldPostYes(y) {
	window.open("posts.php?sold="+y,"_self")
}