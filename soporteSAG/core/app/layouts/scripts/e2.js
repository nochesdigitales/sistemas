function markall(form) {
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox") {
			if (form.elements[i].name == "chk") {
				if (form.chkall.checked) {form.elements[i].checked = true}
				else {form.elements[i].checked = false}
			}
		}
	}
}

function remove(form, link) {
	var d = ""
	var g = false
	
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox") {
			if (form.elements[i].name == "chk") {
				if (form.elements[i].checked) {
					if (d.length > 0) {d = d + ","}
					d = d + form.elements[i].value;
					g = true;
				}
			}
		}
	}
	
	if (g) {
		if (confirm("¿ Confirma que desea eliminar los registros seleccionados ?")) {
			location.href = link + "?d=" + d
		}
	}
}
