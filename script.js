window.onload = function () {
	document.getElementById("sample").addEventListener("click", jokeSampler);
	var departureContainer = document.getElementById("laughHolder");
}
function jokeSampler() {
	const request = new XMLHttpRequest();
	request.open('GET', 'http://localhost:80/serverside.php', true);
	request.onreadystatechange = function () {
		if(request.readyState === 4 && request.status === 200) {
			console.log(request.responseText);
		}
	}
	request.send();
    //var htmlString = " "
    //htmlString += "<p>Insertjoke here</p>"
    //laughHolder.insertAdjacentHTML('beforeend', htmlString)
}
