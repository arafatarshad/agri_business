function requestCrossDomain(site,callback) {
	if (!site) {
		alert("no site added");
		return false;
	}
	var yql="https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D'180.211.159.171%2FPublicPortal%2FMarketDisplayFullScreenBangla.php'";
	$.getJSON(yql,	function(data){
		if (data.results[0]) {
			data=data.results[0].replace(/<script[^>]*>[\s\S]*?<\/script>/,'');
			if (typeof callback==='function') {
				callback(data);
			}
		}else{
			throw new Error('Nothing Found');
		}
	});
}