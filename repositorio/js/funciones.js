//funciones de js
function grabar(opc){
	switch(opc) {
		case 'alumno':
			document.getElementById("txtOpc").value = 'add';
			if(document.getElementById("txtMatricula").value == '') {
				alert('Error en los datos, reviselos!');
				document.getElementById("txtMatricula").focus();
				return false;
			}
			if(document.getElementById("txtNombre").value == '') {
				alert('Error en los datos, reviselos!');
				document.getElementById("txtNombre").focus();
				return false;
			}
			if(document.getElementById("txtAPaterno").value == '') {
				alert('Error en los datos, reviselos!');
				document.getElementById("txtAPaterno").focus();
				return false;
			}
			if(document.getElementById("txtAMaterno").value == '') {
				alert('Error en los datos, reviselos!');
				document.getElementById("txtAMaterno").focus();
				return false;
			}

			if(document.getElementById("txtEdad").value == '') {
				alert('Error en los datos, reviselos!');
				document.getElementById("txtEdad").focus();
				return false;
			}

			document.getElementById("frmAddAlumno").submit();
			break;

		case 'curso':
			break;

		case 'calificacion':
			break;
	}
}

function solonumero(){
	$(document).ready(function (){
		$('.solo-numero').keyup(function (){
			this.value = (this.value + '').replace(/[^0-9]/g, '');
		});
	});
}
