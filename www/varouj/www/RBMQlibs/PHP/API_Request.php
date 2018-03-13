<?







function RecieveCoinAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "GET":
	    curl_setopt($curl, CURLOPT_GET, 1);
			
	    if ($data)
	        curl_setopt($curl, CURLOPT_GETFIELDS, $data);
            break;
	default:
	    if ($data)
		$url = sprintf("%s?%s", $url, http_build_query($data));
    }
	
    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
