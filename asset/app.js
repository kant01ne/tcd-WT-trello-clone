
function addBoard() {
	document.getElementsByClassName("tc-form-add-board")[0].style.display = "block";
}

function getBoards() {
	var base_url = document.URL.split('?')[0];
	var params = getQueryParams(document.URL.split('index.php?')[1]);
	console.log(params.page);
	//Not secure
	if(params.user){
		var new_url = base_url + "?page=profile&user=" + params.user;
		window.location.replace(new_url);
	}
}


// http://stackoverflow.com/questions/979975/how-to-get-the-value-from-the-url-parameter
function getQueryParams(qs) {
    qs = qs.split('+').join(' ');
    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }

    return params;
}