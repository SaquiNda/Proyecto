let base_url = 'http://35.225.56.11/';

//----------------------------------------------------------------------

/**
* Método para llamar a un servicio de tipo POST
* @param {string} url URL del servicio a llamar (Sin la url base)
* @param {object} data arreglo de los parámetros a concatenar en la petición
*/
function _post(url,data){

	 return new Promise(async (resolve,reject)=>{
		const response = await fetch(url, {
			method: 'POST',
			mode: 'cors',
			cache: 'no-cache',
			credentials: 'same-origin',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(data)
		});


		resolve(response.json());
	});
}

//----------------------------------------------------------------------

/**
* Método para llamar a un servicio de tipo GET
* @param {string} url URL del servicio a llamar (Sin la url base)
*/
function _get(url){
	return new Promise(async (resolve,reject)=>{
		const response = await fetch(url, {
		    method: 'GET',
		    mode: 'cors',
		    cache: 'no-cache',
		    credentials: 'same-origin',
		    headers: {
		      'Content-Type': 'application/json'
		    },
		  });
		  
		  resolve(response.json());
	});
}

//----------------------------------------------------------------------

/**
	Type => Tipo de mensaje (Solo es el icono que va mostrar) warning/danger/success
	title => Titulo
	description => Descripcion del mensaje, acepta arrays
	action => redijire a un lugar luego de que el usuario lo oculta
	pr => true para que devuelva una respuesta como promesa
*/
function show_alert(type,title,description = "",action = '',pr = false){

	var desc = "";
	var count = 0;

		var promise = new Promise((resolve, reject) => {

			if(typeof(description) == "object"){
				for(let d in description){
					desc += description[d]+"<br><br>";
					count++;
				}
			}else{
				desc = description;
			}

			Swal.fire({
			  icon: type,
			  title: title,
			  html: desc,
			  showCloseButton: pr,
		  	  showCancelButton: pr,
			}).then((result) => {

				try{
				  if (action != '') window.location.href= action;
				  if(pr) resolve((result.value ? result.value : false));
				}catch(e){}

			});

	}); /*End promise*/

	return promise;
}

//----------------------------------------------------------------------

/**
* Establecer token de sesión
* @param {string} token Token obtenida del request de inicio de sesión
*/
function set_token($token){
	return localStorage.setItem('token',$token);
}

//----------------------------------------------------------------------

/**
* Devolver el token guardado
*/
function get_token(){
	return localStorage.getItem('token');
}
