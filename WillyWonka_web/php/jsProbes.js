function noCanviarMail(){
			var mail = document.getElementById('correuCheckbox');
			var text = document.getElementById('textCanviar');
			if (mail.disabled == false) {
				alert("está disabled");
				mail.setDisa = true;
				frase.innerHTML = "<a href='#' onclick='canviarMail()'><text id='frase'>No vull canviar el email</text></a>";
			} 
		}