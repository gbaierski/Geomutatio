// seleciona o modal
	var modal = document.getElementById("modal-login");

	// seleciona o botão que abre o modal
	var btn = document.getElementById("botao-login");

	// seleciona o elemento <span> que fecha o modal
	var span = document.getElementsByClassName("fechar")[0];

	// quando o usuário clicar no botão, abre o modal 
	btn.onclick = function() {
	  modal.style.display = "block";
	}

	// quando o usuário clicar em <span> (x), fecha o modal
	// não utilizada por enquanto
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// quando o usuário clicar em qualquer lugar fora da tela, fecha-o
	window.onclick = function(event) {
	  if (event.target == modal) {
		modal.style.display = "none";
	  }
	}