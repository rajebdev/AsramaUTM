function generate_token() {
	//edit the token allowed characters
	var a = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".split("");
	var b = [];
	for (var i = 0; i < 15; i++) {
		var j = (Math.random() * (a.length - 1)).toFixed(0);
		b[i] = a[j];
	}
	document.getElementById("tokenDaftar").value = b.join("");
}
