_("state").onchange = function (){
		_("lga_options").style.display = "inline-block"
		_("lga_options").style.width = "90%"
		
	x = "<select name='lga' id='lga' style='background:rgba(0,0,0,.2); border:none; height:40px; padding:10px;'><option disabled selected>Select Area</option>";

	if (_("state").value == "Abia"){
		x += "<option>Aba North</option> <option>Aba South</option> <option>Arochukwu</option> <option>Bende</option> <option>Ikwuano</option> <option>Isiala Ngwa North</option> <option>Isiala Ngwa South</option> <option>Isuikwuato</option> <option>Obi Ngwa</option> <option>Ohafia</option> <option>Osisioma</option> <option>Ugwunagbo</option> <option>Ukwa East</option> <option>Ukwa West</option> <option>Umuahia North</option> <option>Umuahia South</option> <option>Umu Nneochi</option>"	}
	if (_("state").value == "Adamawa"){
		x += "<option>Demsa</option> <option>Fufure</option> <option>Ganye</option> <option>Gayuk</option> <option>Gombi</option> <option>Grie</option> <option>Hong</option> <option>Jada</option> <option>Lamurde</option> <option>Madagali</option> <option>Maiha</option> <option>Mayo Belwa</option> <option>Michika</option> <option>Mubi North</option> <option>Mubi South</option> <option>Numan</option> <option>Shelleng</option> <option>Song</option> <option>Toungo</option> <option>Yola North</option> <option>Yola South</option>"	}
	if (_("state").value == "Akwa Ibom"){
		x += "<option>Abak</option> <option>Eastern Obolo</option> <option>Eket</option> <option>Esit Eket</option> <option>Essien Udim</option> <option>Etim Ekpo</option> <option>Etinan</option> <option>Ibeno</option> <option>Ibesikpo Asutan</option> <option>Ibiono-Ibom</option> <option>Ika</option> <option>Ikono</option> <option>Ikot Abasi</option> <option>Ikot Ekpene</option> <option>Ini</option> <option>Itu</option> <option>Mbo</option> <option>Mkpat-Enin</option> <option>Nsit-Atai</option> <option>Nsit-Ibom</option> <option>Nsit-Ubium</option> <option>Obot Akara</option> <option>Okobo</option> <option>Onna</option> <option>Oron</option> <option>Oruk Anam</option> <option>Udung-Uko</option> <option>Ukanafun</option> <option>Uruan</option> <option>Urue-Offong/Oruko</option> <option>Uyo</option>"	}
	if (_("state").value == "Anambra"){
		x += "<option>Aguata</option> <option>Anambra East</option> <option>Anambra West</option> <option>Anaocha</option> <option>Awka North</option> <option>Awka South</option> <option>Ayamelum</option> <option>Dunukofia</option> <option>Ekwusigo</option> <option>Idemili North</option> <option>Idemili South</option> <option>Ihiala</option> <option>Njikoka</option> <option>Nnewi North</option> <option>Nnewi South</option> <option>Ogbaru</option> <option>Onitsha North</option> <option>Onitsha South</option> <option>Orumba North</option> <option>Orumba South</option> <option>Oyi</option>"	}
	if (_("state").value == "Bauchi"){
		x += "<option>Alkaleri</option> <option>Bauchi</option> <option>Bogoro</option> <option>Damban</option> <option>Darazo</option> <option>Dass</option> <option>Gamawa</option> <option>Ganjuwa</option> <option>Giade</option> <option>Itas/Gadau</option> <option>Jama'are</option>, <option>Katagum</option> <option>Kirfi</option> <option>Misau</option> <option>Ningi</option> <option>Shira</option> <option>Tafawa Balewa</option> <option>Toro</option> <option>Warji</option> <option>Zaki</option>"	}
	if (_("state").value == "Bayelsa"){
		x += "<option>Brass</option> <option>Ekeremor</option> <option>Kolokuma/Opokuma</option> <option>Nembe</option> <option>Ogbia</option> <option>Sagbama</option> <option>Southern Ijaw</option> <option>Yenagoa</option>"	}
	if (_("state").value == "Benue"){
		x += "<option>Agatu</option> <option>Apa</option> <option>Ado</option> <option>Buruku</option> <option>Gboko</option> <option>Guma</option> <option>Gwer East</option> <option>Gwer West</option> <option>Katsina-Ala</option> <option>Konshisha</option> <option>Kwande</option> <option>Logo</option> <option>Makurdi</option> <option>Obi</option> <option>Ogbadibo</option> <option>Ohimini</option> <option>Oju</option> <option>Okpokwu</option> <option>Oturkpo</option> <option>Tarka</option> <option>Ukum</option> <option>Ushongo</option> <option>Vandeikya</option>"	}
	if (_("state").value == "Borno"){
		x += "<option>Abadam</option> <option>Askira/Uba</option> <option>Bama</option> <option>Bayo</option> <option>Biu</option> <option>Chibok</option> <option>Damboa</option> <option>Dikwa</option> <option>Gubio</option> <option>Guzamala</option> <option>Gwoza</option> <option>Hawul</option> <option>Jere</option> <option>Kaga</option> <option>Kala/Balge</option> <option>Konduga</option> <option>Kukawa</option> <option>Kwaya Kusar</option> <option>Mafa</option> <option>Magumeri</option> <option>Maiduguri</option> <option>Marte</option> <option>Mobbar</option> <option>Monguno</option> <option>Ngala</option> <option>Nganzai</option> <option>Shani</option>"	}
	if (_("state").value == "Cross River"){
		x += "<option>Abi</option> <option>Akamkpa</option> <option>Akpabuyo</option> <option>Bakassi</option> <option>Bekwarra</option> <option>Biase</option> <option>Boki</option> <option>Calabar Municipal</option> <option>Calabar South</option> <option>Etung</option> <option>Ikom</option> <option>Obanliku</option> <option>Obubra</option> <option>Obudu</option> <option>Odukpani</option> <option>Ogoja</option> <option>Yakuur</option> <option>Yala</option>"	}
	if (_("state").value == "Delta"){
		x += "<option>Aniocha North</option> <option>Aniocha South</option> <option>Bomadi</option> <option>Burutu</option> <option>Ethiope East</option> <option>Ethiope West</option> <option>Ika North East</option> <option>Ika South</option> <option>Isoko North</option> <option>Isoko South</option> <option>Ndokwa East</option> <option>Ndokwa West</option> <option>Okpe</option> <option>Oshimili North</option> <option>Oshimili South</option> <option>Patani</option> <option>Sapele</option> <option>Udu</option> <option>Ughelli North</option> <option>Ughelli South</option> <option>Ukwuani</option> <option>Uvwie</option> <option>Warri North</option> <option>Warri South</option> <option>Warri South West</option>"	}
	if (_("state").value == "Ebonyi"){
		x += "<option>Abakaliki</option> <option>Afikpo North</option> <option>Afikpo South</option> <option>Ebonyi</option> <option>Ezza North</option> <option>Ezza South</option> <option>Ikwo</option> <option>Ishielu</option> <option>Ivo</option> <option>Izzi</option> <option>Ohaozara</option> <option>Ohaukwu</option> <option>Onicha</option>"	}
	if (_("state").value == "Edo"){
		x += "<option>Akoko-Edo</option> <option>Egor</option> <option>Esan Central</option> <option>Esan North-East</option> <option>Esan South-East</option> <option>Esan West</option> <option>Etsako Central</option> <option>Etsako East</option> <option>Etsako West</option> <option>Igueben</option> <option>Ikpoba Okha</option> <option>Orhionmwon</option> <option>Oredo</option> <option>Ovia North-East</option> <option>Ovia South-West</option> <option>Owan East</option> <option>Owan West</option> <option>Uhunmwonde</option>"	}
	if (_("state").value == "Ekiti"){
		x += "<option>Ado Ekiti</option> <option>Efon</option> <option>Ekiti East</option> <option>Ekiti South-West</option> <option>Ekiti West</option> <option>Emure</option> <option>Gbonyin</option> <option>Ido Osi</option> <option>Ijero</option> <option>Ikere</option> <option>Ikole</option> <option>Ilejemeje</option> <option>Irepodun/Ifelodun</option> <option>Ise/Orun</option> <option>Moba</option> <option>Oye</option>"	}
	if (_("state").value == "Enugu"){
		x += "<option>Aninri</option> <option>Awgu</option> <option>Enugu East</option> <option>Enugu North</option> <option>Enugu South</option> <option>Ezeagu</option> <option>Igbo Etiti</option> <option>Igbo Eze North</option> <option>Igbo Eze South</option> <option>Isi Uzo</option> <option>Nkanu East</option> <option>Nkanu West</option> <option>Nsukka</option> <option>Oji River</option> <option>Udenu</option> <option>Udi</option> <option>Uzo Uwani</option>"	}
	if (_("state").value == "Gombe"){
		x += "<option>Akko</option> <option>Balanga</option> <option>Billiri</option> <option>Dukku</option> <option>Funakaye</option> <option>Gombe</option> <option>Kaltungo</option> <option>Kwami</option> <option>Nafada</option> <option>Shongom</option> <option>Yamaltu/Deba</option>"	}
	if (_("state").value == "Imo"){
		x += "<option>Aboh Mbaise</option> <option>Ahiazu Mbaise</option> <option>Ehime Mbano</option> <option>Ezinihitte</option> <option>Ideato North</option> <option>Ideato South</option> <option>Ihitte/Uboma</option> <option>Ikeduru</option> <option>Isiala Mbano</option> <option>Isu</option> <option>Mbaitoli</option> <option>Ngor Okpala</option> <option>Njaba</option> <option>Nkwerre</option> <option>Nwangele</option> <option>Obowo</option> <option>Oguta</option> <option>Ohaji/Egbema</option> <option>Okigwe</option> <option>Orlu</option> <option>Orsu</option> <option>Oru East</option> <option>Oru West</option> <option>Owerri Municipal</option> <option>Owerri North</option> <option>Owerri West</option> <option>Unuimo</option>"	}
	if (_("state").value == "Jigawa"){
		x += "<option>Auyo</option> <option>Babura</option> <option>Biriniwa</option> <option>Birnin Kudu</option> <option>Buji</option> <option>Dutse</option> <option>Gagarawa</option> <option>Garki</option> <option>Gumel</option> <option>Guri</option> <option>Gwaram</option> <option>Gwiwa</option> <option>Hadejia</option> <option>Jahun</option> <option>Kafin Hausa</option> <option>Kazaure</option> <option>Kiri Kasama</option> <option>Kiyawa</option> <option>Kaugama</option> <option>Maigatari</option> <option>Malam Madori</option> <option>Miga</option> <option>Ringim</option> <option>Roni</option> <option>Sule Tankarkar</option> <option>Taura</option> <option>Yankwashi</option>"	}
	if (_("state").value == "Kaduna"){
		x += "<option>Birnin Gwari</option> <option>Chikun</option> <option>Giwa</option> <option>Igabi</option> <option>Ikara</option> <option>Jaba</option> <option>Jema'a</option>, <option>Kachia</option> <option>Kaduna North</option> <option>Kaduna South</option> <option>Kagarko</option> <option>Kajuru</option> <option>Kaura</option> <option>Kauru</option> <option>Kubau</option> <option>Kudan</option> <option>Lere</option> <option>Makarfi</option> <option>Sabon Gari</option> <option>Sanga</option> <option>Soba</option> <option>Zangon Kataf</option> <option>Zaria</option>"	}
	if (_("state").value == "Kano"){
		x += "<option>Ajingi</option> <option>Albasu</option> <option>Bagwai</option> <option>Bebeji</option> <option>Bichi</option> <option>Bunkure</option> <option>Dala</option> <option>Dambatta</option> <option>Dawakin Kudu</option> <option>Dawakin Tofa</option> <option>Doguwa</option> <option>Fagge</option> <option>Gabasawa</option> <option>Garko</option> <option>Garun Mallam</option> <option>Gaya</option> <option>Gezawa</option> <option>Gwale</option> <option>Gwarzo</option> <option>Kabo</option> <option>Kano Municipal</option> <option>Karaye</option> <option>Kibiya</option> <option>Kiru</option> <option>Kumbotso</option> <option>Kunchi</option> <option>Kura</option> <option>Madobi</option> <option>Makoda</option> <option>Minjibir</option> <option>Nasarawa</option> <option>Rano</option> <option>Rimin Gado</option> <option>Rogo</option> <option>Shanono</option> <option>Sumaila</option> <option>Takai</option> <option>Tarauni</option> <option>Tofa</option> <option>Tsanyawa</option> <option>Tudun Wada</option> <option>Ungogo</option> <option>Warawa</option> <option>Wudil</option>"	}
	if (_("state").value == "Kastina"){
		x += "<option>Bakori</option> <option>Batagarawa</option> <option>Batsari</option> <option>Baure</option> <option>Bindawa</option> <option>Charanchi</option> <option>Dandume</option> <option>Danja</option> <option>Dan Musa</option> <option>Daura</option> <option>Dutsi</option> <option>Dutsin Ma</option> <option>Faskari</option> <option>Funtua</option> <option>Ingawa</option> <option>Jibia</option> <option>Kafur</option> <option>Kaita</option> <option>Kankara</option> <option>Kankia</option> <option>Katsina</option> <option>Kurfi</option> <option>Kusada</option> <option>Mai'Adua</option>, <option>Malumfashi</option> <option>Mani</option> <option>Mashi</option> <option>Matazu</option> <option>Musawa</option> <option>Rimi</option> <option>Sabuwa</option> <option>Safana</option> <option>Sandamu</option> <option>Zango</option>"	}
	if (_("state").value == "Kebbi"){
		x += "<option>Aleiro</option> <option>Arewa Dandi</option> <option>Argungu</option> <option>Augie</option> <option>Bagudo</option> <option>Birnin Kebbi</option> <option>Bunza</option> <option>Dandi</option> <option>Fakai</option> <option>Gwandu</option> <option>Jega</option> <option>Kalgo</option> <option>Koko/Besse</option> <option>Maiyama</option> <option>Ngaski</option> <option>Sakaba</option> <option>Shanga</option> <option>Suru</option> <option>Wasagu/Danko</option> <option>Yauri</option> <option>Zuru</option>"	}
	if (_("state").value == "Kogi"){
		x += "<option>Adavi</option> <option>Ajaokuta</option> <option>Ankpa</option> <option>Bassa</option> <option>Dekina</option> <option>Ibaji</option> <option>Idah</option> <option>Igalamela Odolu</option> <option>Ijumu</option> <option>Kabba/Bunu</option> <option>Kogi</option> <option>Lokoja</option> <option>Mopa Muro</option> <option>Ofu</option> <option>Ogori/Magongo</option> <option>Okehi</option> <option>Okene</option> <option>Olamaboro</option> <option>Omala</option> <option>Yagba East</option> <option>Yagba West</option>"	}
	if (_("state").value == "Kwara"){
		x += "<option>Asa</option> <option>Baruten</option> <option>Edu</option> <option>Ekiti</option> <option>Ifelodun</option> <option>Ilorin East</option> <option>Ilorin South</option> <option>Ilorin West</option> <option>Irepodun</option> <option>Isin</option> <option>Kaiama</option> <option>Moro</option> <option>Offa</option> <option>Oke Ero</option> <option>Oyun</option> <option>Pategi</option>"	}
	if (_("state").value == "Lagos"){
		x += "<option>Agege</option> <option>Ajeromi-Ifelodun</option> <option>Alimosho</option> <option>Amuwo-Odofin</option> <option>Apapa</option> <option>Badagry</option> <option>Epe</option> <option>Eti Osa</option> <option>Ibeju-Lekki</option> <option>Ifako-Ijaiye</option> <option>Ikeja</option> <option>Ikorodu</option> <option>Kosofe</option> <option>Lagos Island</option> <option>Lagos Mainland</option> <option>Mushin</option> <option>Ojo</option> <option>Oshodi-Isolo</option> <option>Shomolu</option> <option>Surulere</option>"	}
	if (_("state").value == "Nasarawa"){
		x += "<option>Akwanga</option> <option>Awe</option> <option>Doma</option> <option>Karu</option> <option>Keana</option> <option>Keffi</option> <option>Kokona</option> <option>Lafia</option> <option>Nasarawa</option> <option>Nasarawa Egon</option> <option>Obi</option> <option>Toto</option> <option>Wamba</option>"	}
	if (_("state").value == "Niger"){
		x += "<option>Agaie</option> <option>Agwara</option> <option>Bida</option> <option>Borgu</option> <option>Bosso</option> <option>Chanchaga</option> <option>Edati</option> <option>Gbako</option> <option>Gurara</option> <option>Katcha</option> <option>Kontagora</option> <option>Lapai</option> <option>Lavun</option> <option>Magama</option> <option>Mariga</option> <option>Mashegu</option> <option>Mokwa</option> <option>Moya</option> <option>Paikoro</option> <option>Rafi</option> <option>Rijau</option> <option>Shiroro</option> <option>Suleja</option> <option>Tafa</option> <option>Wushishi</option>"	}
	if (_("state").value == "Ogun"){
		x += "<option>Abeokuta North</option> <option>Abeokuta South</option> <option>Ado-Odo/Ota</option> <option>Egbado North</option> <option>Egbado South</option> <option>Ewekoro</option> <option>Ifo</option> <option>Ijebu East</option> <option>Ijebu North</option> <option>Ijebu North East</option> <option>Ijebu Ode</option> <option>Ikenne</option> <option>Imeko Afon</option> <option>Ipokia</option> <option>Obafemi Owode</option> <option>Odeda</option> <option>Odogbolu</option> <option>Ogun Waterside</option> <option>Remo North</option> <option>Shagamu</option>"	}
	if (_("state").value == "Ondo"){
		x += "<option>Akoko North-East</option> <option>Akoko North-West</option> <option>Akoko South-West</option> <option>Akoko South-East</option> <option>Akure North</option> <option>Akure South</option> <option>Ese Odo</option> <option>Idanre</option> <option>Ifedore</option> <option>Ilaje</option> <option>Ile Oluji/Okeigbo</option> <option>Irele</option> <option>Odigbo</option> <option>Okitipupa</option> <option>Ondo East</option> <option>Ondo West</option> <option>Ose</option> <option>Owo</option>"	}
	if (_("state").value == "Osun"){
		x += "<option>Atakunmosa East</option> <option>Atakunmosa West</option> <option>Aiyedaade</option> <option>Aiyedire</option> <option>Boluwaduro</option> <option>Boripe</option> <option>Ede North</option> <option>Ede South</option> <option>Ife Central</option> <option>Ife East</option> <option>Ife North</option> <option>Ife South</option> <option>Egbedore</option> <option>Ejigbo</option> <option>Ifedayo</option> <option>Ifelodun</option> <option>Ila</option> <option>Ilesa East</option> <option>Ilesa West</option> <option>Irepodun</option> <option>Irewole</option> <option>Isokan</option> <option>Iwo</option> <option>Obokun</option> <option>Odo Otin</option> <option>Ola Oluwa</option> <option>Olorunda</option> <option>Oriade</option> <option>Orolu</option> <option>Osogbo</option>"	}
	if (_("state").value == "Oyo"){
		x += "<option>Afijio</option> <option>Akinyele</option> <option>Atiba</option> <option>Atisbo</option> <option>Egbeda</option> <option>Ibadan North</option> <option>Ibadan North-East</option> <option>Ibadan North-West</option> <option>Ibadan South-East</option> <option>Ibadan South-West</option> <option>Ibarapa Central</option> <option>Ibarapa East</option> <option>Ibarapa North</option> <option>Ido</option> <option>Irepo</option> <option>Iseyin</option> <option>Itesiwaju</option> <option>Iwajowa</option> <option>Kajola</option> <option>Lagelu</option> <option>Ogbomosho North</option> <option>Ogbomosho South</option> <option>Ogo Oluwa</option> <option>Olorunsogo</option> <option>Oluyole</option> <option>Ona Ara</option> <option>Orelope</option> <option>Ori Ire</option> <option>Oyo</option> <option>Oyo East</option> <option>Saki East</option> <option>Saki West</option> <option>Surulere</option>"	}
	if (_("state").value == "Plateau"){
		x += "<option>Bokkos</option> <option>Barkin Ladi</option> <option>Bassa</option> <option>Jos East</option> <option>Jos North</option> <option>Jos South</option> <option>Kanam</option> <option>Kanke</option> <option>Langtang South</option> <option>Langtang North</option> <option>Mangu</option> <option>Mikang</option> <option>Pankshin</option> <option>Qua'an Pan</option>, <option>Riyom</option> <option>Shendam</option> <option>Wase</option>"	}
	if (_("state").value == "Rivers"){
		x += "<option>Bokkos</option> <option>Barkin Ladi</option> <option>Bassa</option> <option>Jos East</option> <option>Jos North</option> <option>Jos South</option> <option>Kanam</option> <option>Kanke</option> <option>Langtang South</option> <option>Langtang North</option> <option>Mangu</option> <option>Mikang</option> <option>Pankshin</option> <option>Qua'an Pan</option>, <option>Riyom</option> <option>Shendam</option> <option>Wase</option> <option>Okrika</option> <option>Omuma</option> <option>Opobo/Nkoro</option> <option>Oyigbo</option> <option>Port Harcourt</option> <option>Tai</option>"	}
	if (_("state").value == "Sokoto"){
		x += "<option>Binji</option> <option>Bodinga</option> <option>Dange Shuni</option> <option>Gada</option> <option>Goronyo</option> <option>Gudu</option> <option>Gwadabawa</option> <option>Illela</option> <option>Isa</option> <option>Kebbe</option> <option>Kware</option> <option>Rabah</option> <option>Sabon Birni</option> <option>Shagari</option> <option>Silame</option> <option>Sokoto North</option> <option>Sokoto South</option> <option>Tambuwal</option> <option>Tangaza</option> <option>Tureta</option> <option>Wamako</option> <option>Wurno</option> <option>Yabo</option>"	}
	if (_("state").value == "Taraba"){
		x += "<option>Ardo Kola</option> <option>Bali</option> <option>Donga</option> <option>Gashaka</option> <option>Gassol</option> <option>Ibi</option> <option>Jalingo</option> <option>Karim Lamido</option> <option>Kumi</option> <option>Lau</option> <option>Sardauna</option> <option>Takum</option> <option>Ussa</option> <option>Wukari</option> <option>Yorro</option> <option>Zing</option>"	}
	if (_("state").value == "Yobe"){
		x += "<option>Bade</option> <option>Bursari</option> <option>Damaturu</option> <option>Fika</option> <option>Fune</option> <option>Geidam</option> <option>Gujba</option> <option>Gulani</option> <option>Jakusko</option> <option>Karasuwa</option> <option>Machina</option> <option>Nangere</option> <option>Nguru</option> <option>Potiskum</option> <option>Tarmuwa</option> <option>Yunusari</option> <option>Yusufari</option>"	}
	if (_("state").value == "Zamfara"){
		x += "<option>Anka</option> <option>Bakura</option> <option>Birnin Magaji/Kiyaw</option> <option>Bukkuyum</option> <option>Bungudu</option> <option>Gummi</option> <option>Gusau</option> <option>Kaura Namoda</option> <option>Maradun</option> <option>Maru</option> <option>Shinkafi</option> <option>Talata Mafara</option> <option>Chafe</option> <option>Zurmi</option>"	}
	if (_("state").value == "Abuja"){
		x += "<option>Abaji</option> <option>Bwari</option> <option>Gwagwalada</option> <option>Kuje</option> <option>Kwali</option> <option>Municipal Area Council</option>"	}
		
		x += "</select>";
		
		_("lga_options").innerHTML = x
}