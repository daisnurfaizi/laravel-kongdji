function myFunction(){
	var v1 = document.getElementById('v1');
	var more1 = document.getElementById('more1');
	var ahref = document.getElementById('misi1');

	if (v1.style.display === "none") {
		v1.style.display = "inline";
		ahref.innerHTML = "Read More";
		more1.style.display = "none";
	} else {
		v1.style.display = "none";
		ahref.innerHTML = "Read More";
		more1.style.display = "inline";
	}
}