<?php

	function parse_result($res) {
		$rows = array();
	  	while($row = mysqli_fetch_assoc($res)) {
			$rows[] = $row;
	  	}
	  	return $rows;
	}

	function get_crypt_password($pass, $key) {
		return md5($pass.$key);
	}

	function get_auth_token($time, $key) {
		return md5(sha1($time.$key));
	}

	function get_new_password() {
		$chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
		$max = 7;
		$size = strlen($chars)-1;
		$password = null;

    	while($max--) {
    		$password .= $chars[rand(0, $size)];
    	}
    	return $password;
	}
