// https://tc39.github.io/ecma262/#sec-array.prototype.find
if (!Array.prototype.find) {
  Object.defineProperty(Array.prototype, 'find', {
    value: function(predicate) {
     // 1. Let O be ? ToObject(this value).
      if (this == null) {
        throw new TypeError('"this" is null or not defined');
      }

      var o = Object(this);

      // 2. Let len be ? ToLength(? Get(O, "length")).
      var len = o.length >>> 0;

      // 3. If IsCallable(predicate) is false, throw a TypeError exception.
      if (typeof predicate !== 'function') {
        throw new TypeError('predicate must be a function');
      }

      // 4. If thisArg was supplied, let T be thisArg; else let T be undefined.
      var thisArg = arguments[1];

      // 5. Let k be 0.
      var k = 0;

      // 6. Repeat, while k < len
      while (k < len) {
        // a. Let Pk be ! ToString(k).
        // b. Let kValue be ? Get(O, Pk).
        // c. Let testResult be ToBoolean(? Call(predicate, T, « kValue, k, O »)).
        // d. If testResult is true, return kValue.
        var kValue = o[k];
        if (predicate.call(thisArg, kValue, k, o)) {
          return kValue;
        }
        // e. Increase k by 1.
        k++;
      }

      // 7. Return undefined.
      return undefined;
    }
  });
}





var country_es = [ 
{id:"Afganistán", text:"Afganistán" },
 {id:"Albania", text:"Albania" },
 {id:"Alemania", text:"Alemania" },
 {id:"Andorra", text:"Andorra" },
 {id:"Angola", text:"Angola" },
 {id:"Anguilla", text:"Anguilla" },
 {id:"Antigua y Barbuda", text:"Antigua y Barbuda" },
 {id:"Antillas Holandesas", text:"Antillas Holandesas" },
 {id:"Argelia", text:"Argelia" },
 {id:"Argentina", text:"Argentina" },
 {id:"Armenia", text:"Armenia" },
 {id:"Aruba", text:"Aruba" },
 {id:"ARY Macedonia", text:"ARY Macedonia" },
 {id:"Australia", text:"Australia" },
 {id:"Austria", text:"Austria" },
 {id:"Bahamas", text:"Bahamas" },
 {id:"Bangladesh", text:"Bangladesh" },
 {id:"Barbados", text:"Barbados" },
 {id:"Belice", text:"Belice" },
 {id:"Benin", text:"Benin" },
 {id:"Bermudas", text:"Bermudas" },
 {id:"Bielorrusia", text:"Bielorrusia" },
 {id:"Bolivia", text:"Bolivia" },
 {id:"Bosnia y Herzegovina", text:"Bosnia y Herzegovina" },
 {id:"Botsuana", text:"Botsuana" },
 {id:"Brasil", text:"Brasil" },
 {id:"Bulgaria", text:"Bulgaria" },
 {id:"Burkina Faso", text:"Burkina Faso" },
 {id:"Burundi", text:"Burundi" },
 {id:"Bélgica", text:"Bélgica" },
 {id:"Cabo Verde", text:"Cabo Verde" },
 {id:"Camboya", text:"Camboya" },
 {id:"Camerún", text:"Camerún" },
 {id:"Canadá", text:"Canadá" },
 {id:"Chad", text:"Chad" },
 {id:"Chile", text:"Chile" },
 {id:"China", text:"China" },
 {id:"Chipre", text:"Chipre" },
 {id:"Ciudad del Vaticano", text:"Ciudad del Vaticano" },
 {id:"Colombia", text:"Colombia" },
 {id:"Comoras", text:"Comoras" },
 {id:"Congo", text:"Congo" },
 {id:"Corea del Norte", text:"Corea del Norte" },
 {id:"Corea del Sur", text:"Corea del Sur" },
 {id:"Costa de Marfil", text:"Costa de Marfil" },
 {id:"Costa Rica", text:"Costa Rica" },
 {id:"Croacia", text:"Croacia" },
 {id:"Cuba", text:"Cuba" },
 {id:"Dinamarca", text:"Dinamarca" },
 {id:"Dominica", text:"Dominica" },
 {id:"Ecuador", text:"Ecuador" },
 {id:"Egipto", text:"Egipto" },
 {id:"El Salvador", text:"El Salvador" },
 {id:"Emiratos çrabes Unidos", text:"Emiratos Árabes Unidos" },
 {id:"Eritrea", text:"Eritrea" },
 {id:"Eslovaquia", text:"Eslovaquia" },
 {id:"Eslovenia", text:"Eslovenia" },
 {id:"España", text:"España" },
 {id:"Estados Unidos", text:"Estados Unidos" },
 {id:"Estonia", text:"Estonia" },
 {id:"Etiop’a", text:"Etiopía" },
 {id:"Filipinas", text:"Filipinas" },
 {id:"Finlandia", text:"Finlandia" },
 {id:"Fiyi", text:"Fiyi" },
 {id:"Francia", text:"Francia" },
 {id:"Gambia", text:"Gambia" },
 {id:"Georgia", text:"Georgia" },
 {id:"Ghana", text:"Ghana" },
 {id:"Gibraltar", text:"Gibraltar" },
 {id:"Granada", text:"Granada" },
 {id:"Grecia", text:"Grecia" },
 {id:"Groenlandia", text:"Groenlandia" },
 {id:"Guadalupe", text:"Guadalupe" },
 {id:"Guam", text:"Guam" },
 {id:"Guatemala", text:"Guatemala" },
 {id:"Guayana Francesa", text:"Guayana Francesa" },
 {id:"Guinea Ecuatorial", text:"Guinea Ecuatorial" },
 {id:"Guinea", text:"Guinea" },
 {id:"Guinea-Bissau", text:"Guinea-Bissau" },
 {id:"Guyana", text:"Guyana" },
 {id:"Haití", text:"Haití" },
 {id:"Honduras", text:"Honduras" },
 {id:"Hong Kong", text:"Hong Kong" },
 {id:"Hungría", text:"Hungría" },
 {id:"India", text:"India" },
 {id:"Indonesia", text:"Indonesia" },
 {id:"Iran", text:"Iran" },
 {id:"Iraq", text:"Iraq" },
 {id:"Irlanda", text:"Irlanda" },
 {id:"Isla Bouvet", text:"Isla Bouvet" },
 {id:"Isla de Navidad", text:"Isla de Navidad" },
 {id:"Isla Norfolk", text:"Isla Norfolk" },
 {id:"Islandia", text:"Islandia" },
 {id:"Islas Caim‡n", text:"Islas Caimín" },
 {id:"Islas Cocos", text:"Islas Cocos" },
 {id:"Islas Cook", text:"Islas Cook" },
 {id:"Islas Feroe", text:"Islas Feroe" },
 {id:"Islas Georgias del Sur y Sandwich del Sur", text:"Islas Georgias del Sur y Sandwich del Sur" },
 {id:"Islas Gland", text:"Islas Gland" },
 {id:"Islas Heard y McDonald", text:"Islas Heard y McDonald" },
 {id:"Islas Malvinas", text:"Islas Malvinas" },
 {id:"Islas Marianas del Norte", text:"Islas Marianas del Norte" },
 {id:"Islas Marshall", text:"Islas Marshall" },
 {id:"Islas Pitcairn", text:"Islas Pitcairn" },
 {id:"Islas Salom—n", text:"Islas Salomón" },
 {id:"Islas Turcas y Caicos", text:"Islas Turcas y Caicos" },
 {id:"Islas ultramarinas de Estados Unidos", text:"Islas ultramarinas de Estados Unidos" },
 {id:"Israel", text:"Israel" },
 {id:"Italia", text:"Italia" },
 {id:"Jamaica", text:"Jamaica" },
 {id:"Japon", text:"Japon" },
 {id:"Jordania", text:"Jordania" },
 {id:"Kazajst‡n", text:"Kazajstán" },
 {id:"Kenia", text:"Kenia" },
 {id:"Kirguist‡n", text:"Kirguistán" },
 {id:"Kiribati", text:"Kiribati" },
 {id:"Kuwait", text:"Kuwait" },
 {id:"Laos", text:"Laos" },
 {id:"Lesotho", text:"Lesotho" },
 {id:"Letonia", text:"Letonia" },
 {id:"Liberia", text:"Liberia" },
 {id:"Libia", text:"Libia" },
 {id:"Liechtenstein", text:"Liechtenstein" },
 {id:"Lituania", text:"Lituania" },
 {id:"Luxemburgo", text:"Luxemburgo" },
 {id:"Macao", text:"Macao" },
 {id:"Madagascar", text:"Madagascar" },
 {id:"Malasia", text:"Malasia" },
 {id:"Malawi", text:"Malawi" },
 {id:"Maldivas", text:"Maldivas" },
 {id:"Malta", text:"Malta" },
 {id:"Marruecos", text:"Marruecos" },
 {id:"Martinica", text:"Martinica" },
 {id:"Mauricio", text:"Mauricio" },
 {id:"Mauritania", text:"Mauritania" },
 {id:"Mayotte", text:"Mayotte" },
 {id:"Mexico", text:"Mexico" },
 {id:"Micronesia", text:"Micronesia" },
 {id:"Moldavia", text:"Moldavia" },
 {id:"Monaco", text:"Monaco" },
 {id:"Mongolia", text:"Mongolia" },
 {id:"Montserrat", text:"Montserrat" },
 {id:"Mozambique", text:"Mozambique" },
 {id:"Myanmar", text:"Myanmar" },
 {id:"Namibia", text:"Namibia" },
 {id:"Nauru", text:"Nauru" },
 {id:"Nepal", text:"Nepal" },
 {id:"Nicaragua", text:"Nicaragua" },
 {id:"Nigeria", text:"Nigeria" },
 {id:"Niue", text:"Niue" },
 {id:"Noruega", text:"Noruega" },
 {id:"Nueva Caledonia", text:"Nueva Caledonia" },
 {id:"Nueva Zelanda", text:"Nueva Zelanda" },
 {id:"Paises Bajos", text:"Paises Bajos" },
 {id:"Palau", text:"Palau" },
 {id:"Palestina", text:"Palestina" },
 {id:"Paraguay", text:"Paraguay" },
 {id:"Polinesia Francesa", text:"Polinesia Francesa" },
 {id:"Polonia", text:"Polonia" },
 {id:"Portugal", text:"Portugal" },
 {id:"Puerto Rico", text:"Puerto Rico" },
 {id:"Qatar", text:"Qatar" },
 {id:"Reino Unido", text:"Reino Unido" },
 {id:"República Centroafricana", text:"República Centroafricana" },
 {id:"Reuni—n", text:"Reunión" },
 {id:"Ruanda", text:"Ruanda" },
 {id:"Rumania", text:"Rumania" },
 {id:"Rusia", text:"Rusia" },
 {id:"Sahara Occidental", text:"Sahara Occidental" },
 {id:"Samoa Americana", text:"Samoa Americana" },
 {id:"Samoa", text:"Samoa" },
 {id:"San Crist—bal y Nevis", text:"San Cristóbal y Nieves" },
 {id:"San Marino", text:"San Marino" },
 {id:"San Pedro y Miquel—n", text:"San Pedro y Miquelón" },
 {id:"San Vicente y las Granadinas", text:"San Vicente y las Granadinas" },
 {id:"Santa Helena", text:"Santa Helena" },
 {id:"Senegal", text:"Senegal" },
 {id:"Serbia y Montenegro", text:"Serbia y Montenegro" },
 {id:"Seychelles", text:"Seychelles" },
 {id:"Sierra Leona", text:"Sierra Leona" },
 {id:"Singapur", text:"Singapur" },
 {id:"Siria", text:"Siria" },
 {id:"Somalia", text:"Somalia" },
 {id:"Sri Lanka", text:"Sri Lanka" },
 {id:"Suazilandia", text:"Suazilandia" },
 {id:"Suecia", text:"Suecia" },
 {id:"Suiza", text:"Suiza" },
 {id:"Surinam", text:"Surinam" },
 {id:"Svalbard y Jan Mayen", text:"Svalbard y Jan Mayen" },
 {id:"Tailandia", text:"Tailandia" },
 {id:"Tanzania", text:"Tanzania" },
 {id:"Territorios Australes Franceses", text:"Territorios Australes Franceses" },
 {id:"Timor", text:"Timor Oriental"},
 {id:"Togo", text:"Togo" },
 {id:"Tokelau", text:"Tokelau" },
 {id:"Tonga", text:"Tonga" },
 {id:"Trinidad y Tobago", text:"Trinidad y Tobago" },
 {id:"Turqu’a", text:"Turquía" },
 {id:"Tuvalu", text:"Tuvalu" },
 {id:"Tœnez", text:"Túnez" },
 {id:"Ucrania", text:"Ucrania" },
 {id:"Uganda", text:"Uganda" },
 {id:"Uruguay", text:"Uruguay" },
 {id:"Vanuatu", text:"Vanuatu" },
 {id:"Venezuela", text:"Venezuela" },
 {id:"Vietnam", text:"Vietnam" },
 {id:"Wallis y Futuna", text:"Wallis y Futuna" },
 {id:"Yemen", text:"Yemen" },
 {id:"Yibuti", text:"Yibuti" },
 {id:"Zambia", text:"Zambia" },
 {id: "Zimbabue", text:"Zimbabue" }]


 //-------------------

var country_en = [{id:"Afghanistan",text:"Afghanistan"},
        {id:"Albania",text:"Albania"},
        {id:"Algeria",text:"Algeria"},
        {id:"American Samoa",text:"American Samoa"},
        {id:"Andorra",text:"Andorra"},
        {id:"Angola",text:"Angola"},
        {id:"Anguilla",text:"Anguilla"},
        {id:"Antarctica",text:"Antarctica"},
        {id:"Antigua and Barbuda",text:"Antigua and Barbuda"},
        {id:"Argentina",text:"Argentina"},
        {id:"Armenia",text:"Armenia"},
        {id:"Aruba",text:"Aruba"},
        {id:"Australia",text:"Australia"},
        {id:"Austria",text:"Austria"},
        {id:"Azerbaijan",text:"Azerbaijan"},
        {id:"Bahamas",text:"Bahamas"},
        {id:"Bahrain",text:"Bahrain"},
        {id:"Bangladesh",text:"Bangladesh"},
        {id:"Barbados",text:"Barbados"},
        {id:"Belarus",text:"Belarus"},
        {id:"Belgium",text:"Belgium"},
        {id:"Belize",text:"Belize"},
        {id:"Benin",text:"Benin"},
        {id:"Bermuda",text:"Bermuda"},
        {id:"Bhutan",text:"Bhutan"},
        {id:"Bolivia",text:"Bolivia"},
        {id:"Bosnia and Herzegovina",text:"Bosnia and Herzegovina"},
        {id:"Botswana",text:"Botswana"},
        {id:"Bouvet Island",text:"Bouvet Island"},
        {id:"Brazil",text:"Brazil"},
        {id:"British Indian Ocean Territory",text:"British Indian Ocean Territory"},
        {id:"Brunei Darussalam",text:"Brunei Darussalam"},
        {id:"Bulgaria",text:"Bulgaria"},
        {id:"Burkina Faso",text:"Burkina Faso"},
        {id:"Burundi",text:"Burundi"},
        {id:"Cambodia",text:"Cambodia"},
        {id:"Cameroon",text:"Cameroon"},
        {id:"Canada",text:"Canada"},
        {id:"Cape Verde",text:"Cape Verde"},
        {id:"Cayman Islands",text:"Cayman Islands"},
        {id:"Central African Republic",text:"Central African Republic"},
        {id:"Chad",text:"Chad"},
        {id:"Chile",text:"Chile"},
        {id:"China",text:"China"},
        {id:"Christmas Island",text:"Christmas Island"},
        {id:"Colombia",text:"Colombia"},
        {id:"Comoros",text:"Comoros"},
        {id:"Congo",text:"Congo"},
        {id:"Congo",text:"Congo"},
        {id:"Cook Islands",text:"Cook Islands"},
        {id:"Costa Rica",text:"Costa Rica"},
        {id:"Cote D'Ivoire",text:"Cote D'Ivoire"},
        {id:"Croatia",text:"Croatia"},
        {id:"Cuba",text:"Cuba"},
        {id:"Cyprus",text:"Cyprus"},
        {id:"Czech Republic",text:"Czech Republic"},
        {id:"Denmark",text:"Denmark"},
        {id:"Djibouti",text:"Djibouti"},
        {id:"Dominica",text:"Dominica"},
        {id:"Dominican Republic",text:"Dominican Republic"},
        {id:"Ecuador",text:"Ecuador"},
        {id:"Egypt",text:"Egypt"},
        {id:"El Salvador",text:"El Salvador"},
        {id:"Equatorial Guinea",text:"Equatorial Guinea"},
        {id:"Eritrea",text:"Eritrea"},
        {id:"Estonia",text:"Estonia"},
        {id:"Ethiopia",text:"Ethiopia"},
        {id:"Falkland Islands (Malvinas)",text:"Falkland Islands (Malvinas)"},
        {id:"Faroe Islands",text:"Faroe Islands"},
        {id:"Fiji",text:"Fiji"},
        {id:"Finland",text:"Finland"},
        {id:"France",text:"France"},
        {id:"French Guiana",text:"French Guiana"},
        {id:"French Polynesia",text:"French Polynesia"},
        {id:"French Southern Territories",text:"French Southern Territories"},
        {id:"Gabon",text:"Gabon"},
        {id:"Gambia",text:"Gambia"},
        {id:"Georgia",text:"Georgia"},
        {id:"Germany",text:"Germany"},
        {id:"Ghana",text:"Ghana"},
        {id:"Gibraltar",text:"Gibraltar"},
        {id:"Greece",text:"Greece"},
        {id:"Greenland",text:"Greenland"},
        {id:"Grenada",text:"Grenada"},
        {id:"Guadeloupe",text:"Guadeloupe"},
        {id:"Guam",text:"Guam"},
        {id:"Guatemala",text:"Guatemala"},
        {id:"Guinea",text:"Guinea"},
        {id:"Guinea-Bissau",text:"Guinea-Bissau"},
        {id:"Guyana",text:"Guyana"},
        {id:"Haiti",text:"Haiti"},
        {id:"Heard Island and Mcdonald Islands",text:"Heard Island and Mcdonald Islands"},
        {id:"Holy See (Vatican City State)",text:"Holy See (Vatican City State)"},
        {id:"Honduras",text:"Honduras"},
        {id:"Hong Kong",text:"Hong Kong"},
        {id:"Hungary",text:"Hungary"},
        {id:"Iceland",text:"Iceland"},
        {id:"India",text:"India"},
        {id:"Indonesia",text:"Indonesia"},
        {id:"Iran",text:"Iran"},
        {id:"Iraq",text:"Iraq"},
        {id:"Ireland",text:"Ireland"},
        {id:"Israel",text:"Israel"},
        {id:"Italy",text:"Italy"},
        {id:"Jamaica",text:"Jamaica"},
        {id:"Japan",text:"Japan"},
        {id:"Jordan",text:"Jordan"},
        {id:"Kazakhstan",text:"Kazakhstan"},
        {id:"Kenya",text:"Kenya"},
        {id:"Kiribati",text:"Kiribati"},
        {id:"Korea, Democratic People's Republic of",text:"Korea, Democratic People's Republic of"},
        {id:"Korea, Republic of",text:"Korea, Republic of"},
        {id:"Kuwait",text:"Kuwait"},
        {id:"Kyrgyzstan",text:"Kyrgyzstan"},
        {id:"Lao People's Democratic Republic",text:"Lao People's Democratic Republic"},
        {id:"Latvia",text:"Latvia"},
        {id:"Lebanon",text:"Lebanon"},
        {id:"Lesotho",text:"Lesotho"},
        {id:"Liberia",text:"Liberia"},
        {id:"Libyan Arab Jamahiriya",text:"Libyan Arab Jamahiriya"},
        {id:"Liechtenstein",text:"Liechtenstein"},
        {id:"Lithuania",text:"Lithuania"},
        {id:"Luxembourg",text:"Luxembourg"},
        {id:"Macao",text:"Macao"},
        {id:"Madagascar",text:"Madagascar"},
        {id:"Malawi",text:"Malawi"},
        {id:"Malaysia",text:"Malaysia"},
        {id:"Maldives",text:"Maldives"},
        {id:"Mali",text:"Mali"},
        {id:"Malta",text:"Malta"},
        {id:"Marshall Islands",text:"Marshall Islands"},
        {id:"Martinique",text:"Martinique"},
        {id:"Mauritania",text:"Mauritania"},
        {id:"Mauritius",text:"Mauritius"},
        {id:"Mayotte",text:"Mayotte"},
        {id:"Mexico",text:"Mexico"},
        {id:"Monaco",text:"Monaco"},
        {id:"Mongolia",text:"Mongolia"},
        {id:"Montserrat",text:"Montserrat"},
        {id:"Morocco",text:"Morocco"},
        {id:"Mozambique",text:"Mozambique"},
        {id:"Myanmar",text:"Myanmar"},
        {id:"Namibia",text:"Namibia"},
        {id:"Nauru",text:"Nauru"},
        {id:"Nepal",text:"Nepal"},
        {id:"Netherlands Antilles",text:"Netherlands Antilles"},
        {id:"Netherlands",text:"Netherlands"},
        {id:"New Caledonia",text:"New Caledonia"},
        {id:"New Zealand",text:"New Zealand"},
        {id:"Nicaragua",text:"Nicaragua"},
        {id:"Niger",text:"Niger"},
        {id:"Nigeria",text:"Nigeria"},
        {id:"Niue",text:"Niue"},
        {id:"Norfolk Island",text:"Norfolk Island"},
        {id:"Northern Mariana Islands",text:"Northern Mariana Islands"},
        {id:"Norway",text:"Norway"},
        {id:"Oman",text:"Oman"},
        {id:"Pakistan",text:"Pakistan"},
        {id:"Palau",text:"Palau"},
        {id:"Panama",text:"Panama"},
        {id:"Papua New Guinea",text:"Papua New Guinea"},
        {id:"Paraguay",text:"Paraguay"},
        {id:"Peru",text:"Peru"},
        {id:"Philippines",text:"Philippines"},
        {id:"Pitcairn",text:"Pitcairn"},
        {id:"Poland",text:"Poland"},
        {id:"Portugal",text:"Portugal"},
        {id:"Puerto Rico",text:"Puerto Rico"},
        {id:"Qatar",text:"Qatar"},
        {id:"Reunion",text:"Reunion"},
        {id:"Romania",text:"Romania"},
        {id:"Russian Federation",text:"Russian Federation"},
        {id:"Rwanda",text:"Rwanda"},
        {id:"Saint Helena",text:"Saint Helena"},
        {id:"Saint Kitts and Nevis",text:"Saint Kitts and Nevis"},
        {id:"Saint Lucia",text:"Saint Lucia"},
        {id:"Saint Pierre and Miquelon",text:"Saint Pierre and Miquelon"},
        {id:"Saint Vincent and the Grenadines",text:"Saint Vincent and the Grenadines"},
        {id:"Samoa",text:"Samoa"},
        {id:"San Marino",text:"San Marino"},
        {id:"Sao Tome and Principe",text:"Sao Tome and Principe"},
        {id:"Saudi Arabia",text:"Saudi Arabia"},
        {id:"Senegal",text:"Senegal"},
        {id:"Serbia and Montenegro",text:"Serbia and Montenegro"},
        {id:"Seychelles",text:"Seychelles"},
        {id:"Sierra Leone",text:"Sierra Leone"},
        {id:"Singapore",text:"Singapore"},
        {id:"Slovakia",text:"Slovakia"},
        {id:"Slovenia",text:"Slovenia"},
        {id:"Solomon Islands",text:"Solomon Islands"},
        {id:"Somalia",text:"Somalia"},
        {id:"South Africa",text:"South Africa"},
        {id:"South Georgia and the South Sandwich Islands",text:"South Georgia and the South Sandwich Islands"},
        {id:"Spain",text:"Spain"},
        {id:"Sri Lanka",text:"Sri Lanka"},
        {id:"Sudan",text:"Sudan"},
        {id:"Suriname",text:"Suriname"},
        {id:"Svalbard and Jan Mayen",text:"Svalbard and Jan Mayen"},
        {id:"Swaziland",text:"Swaziland"},
        {id:"Sweden",text:"Sweden"},
        {id:"Switzerland",text:"Switzerland"},
        {id:"Syrian Arab Republic",text:"Syrian Arab Republic"},
        {id:"Tajikistan",text:"Tajikistan"},
        {id:"Thailand",text:"Thailand"},
        {id:"Timor-Leste",text:"Timor-Leste"},
        {id:"Togo",text:"Togo"},
        {id:"Tokelau",text:"Tokelau"},
        {id:"Tonga",text:"Tonga"},
        {id:"Trinidad and Tobago",text:"Trinidad and Tobago"},
        {id:"Tunisia",text:"Tunisia"},
        {id:"Turkey",text:"Turkey"},
        {id:"Turkmenistan",text:"Turkmenistan"},
        {id:"Turks and Caicos Islands",text:"Turks and Caicos Islands"},
        {id:"Tuvalu",text:"Tuvalu"},
        {id:"Uganda",text:"Uganda"},
        {id:"Ukraine",text:"Ukraine"},
        {id:"United Arab Emirates",text:"United Arab Emirates"},
        {id:"United Kingdom",text:"United Kingdom"},
        {id:"United States Minor Outlying Islands",text:"United States Minor Outlying Islands"},
        {id:"United States",text:"United States"},
        {id:"Uruguay",text:"Uruguay"},
        {id:"Uzbekistan",text:"Uzbekistan"},
        {id:"Vanuatu",text:"Vanuatu"},
        {id:"Venezuela",text:"Venezuela"},
        {id:"Viet Nam",text:"Viet Nam"},
        {id:"Wallis and Futuna",text:"Wallis and Futuna"},
        {id:"Western Sahara",text:"Western Sahara"},
        {id:"Yemen",text:"Yemen"},
        {id:"Zambia",text:"Zambia"},
        {id:"Zimbabwe",text:"Zimbabwe"}]
        
$.noConflict();
jQuery( document ).ready(function( $ ) {
sessionStorage.removeItem("idioma_select");
function verificaridioma() {
	 
		
		
		var url = window.location;

		var pathname = url.pathname;
		
		pathname = pathname.split("/");
		
		function findLang(lang) { 
			if(lang === 'en'){
				return lang === 'en';
			}else if(lang === 'ja'){
				return lang === 'ja';
			}else if(lang === 'zh-hant'){
				return lang === "zh-hant";
			}else{
				return lang === 'es';
			}
		    //return lang === 'en';
		}		
		
		//console.log(pathname);
		
		var ln = pathname.find(findLang);
		
		//console.log(ln)
	
		
		if(ln == 'en' || ln == 'en-US' || ln == 'ru' || ln == 'uk'){
         $(".select_paises").select2({
              data: country_en ,
              placeholder: "* Select a country",
              width: '100%'
              // width: 'resolve',
            })  
          sessionStorage.setItem("idioma_select", "ingles");
        
        }
        
        if(ln == 'es' || typeof(ln) == 'undefined'){
          $(".select_paises").select2({
              data: country_es ,
              placeholder: "* Seleccione el país",
              width: '100%'
              // width: 'resolve',
            })  
          sessionStorage.setItem("idioma_select", "español");
        
        }
        if(ln == 'zh-hant'){
          $(".select_paises").select2({
              data: country_es ,
              placeholder: "* 国家",
              width: '100%'
              // width: 'resolve',
            })  
          sessionStorage.setItem("idioma_select", "chino");
        
        }
        
        if(ln == 'ja' ){
         $(".select_paises").select2({
          data: country_en ,
          placeholder: "* 国",
          width: '100%'
          // width: 'resolve',
        })  
          sessionStorage.setItem("idioma_select", "japones");
        
        }
		return false;
	}
	 
	var datostorage = sessionStorage.getItem("idioma_select");
	
	//console.log(datostorage )
	
	if(datostorage == null){
	  verificaridioma();
	}


  /* $(".select_paises").select2({
  data: country_es ,
  placeholder: "Seleccione el país",
})   
*/
//$('.dd-options > li:last-child').addClass('hidden');
//setTimeout(function(){ $('.dd-options > li:last-child').addClass('hidden'); }, 2000);

  
});
        
        