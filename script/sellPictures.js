_("picture_1").onchange = function () {
var reader = new FileReader();
    reader.onload = function (e) {
		_("picture_1_preview").style.background = "url("+e.target.result+") center no-repeat";
		_("picture_1_preview").style.backgroundSize = 'cover';
    };    
	reader.readAsDataURL(this.files[0]);
}
_("picture_2").onchange = function () {
var reader = new FileReader();
    reader.onload = function (e) {
		_("picture_2_preview").style.background = "url("+e.target.result+") center no-repeat";
		_("picture_2_preview").style.backgroundSize = 'cover';
    };    
	reader.readAsDataURL(this.files[0]);
}
_("picture_3").onchange = function () {
var reader = new FileReader();
    reader.onload = function (e) {
		_("picture_3_preview").style.background = "url("+e.target.result+") center no-repeat";
		_("picture_3_preview").style.backgroundSize = 'cover';
    };    
	reader.readAsDataURL(this.files[0]);
}