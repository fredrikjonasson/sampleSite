
// Letting the DOMS load before trying to acess them.
window.onload = function () {
	document.getElementById("sample").addEventListener("click", jokeSampler);
}

// An AJAX-function that calls the serverside.php code.
function jokeSampler() {
	const request = new XMLHttpRequest();
	request.open('GET', 'http://localhost:80/serverside.php', true);
	request.onreadystatechange = function () {
		if (request.readyState === 4 && request.status === 200) {
			// Printing the resulting echo from serverside.php to the HTML-container.
			document.getElementById("laughHolder").innerHTML = request.responseText;
		}
	}
	request.send();
}
