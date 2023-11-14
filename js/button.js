document.addEventListener('DOMContentLoaded', function() {
	document.body.addEventListener('click', function(e) {
		// Verifica se o elemento clicado possui a classe 'tracked-button'
		if (e.target.classList.contains('tracked-button')) {

			// Código para fazer a requisição AJAX (comentado para o exemplo)
			var xhr = new XMLHttpRequest();
			xhr.open('POST', ajax_object.ajax_url, true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
			xhr.send('action=register_click&button_id='+e.target.id);
			xhr.onload = function() {
				if (xhr.status >= 200 && xhr.status < 400) {
					// Lida com a resposta do servidor, se necessário
					// console.log(xhr.responseText);
				} else {
					// Lida com erros de requisição, se necessário
					console.error(xhr.statusText);
				}
			};

			xhr.onerror = function() {
				// Lida com erros de rede
				console.error('Erro de rede');
			};
		}
	});
});
