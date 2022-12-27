document.addEventListener('DOMContentLoaded',function(){
	var form_login = document.getElementById('form_login');
	
	if(form_login){
		form_login.addEventListener('submit',function(e){
			e.preventDefault();
			
			const body = {
				email: (document.getElementById('email')).value,
				password: (document.getElementById('password')).value
			}
			
			_post('session/validate',body).then((res)=>{
				if(res['codeStatus'] == 200){
					set_token(res['token']);
					window.location.href="/";
				}else{
					show_alert('warning','Aviso',res['message']);
				}
			});
		});
	}
});