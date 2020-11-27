<?php
$login = 'admin';
$password = 'faAr2010';
$url = 'http://gattisa.com.ar/crm/api/v1/Account';
$postFields = '';
$httpMethod = "GET";
$httpHeaders = [];
$httpHeaders['Authorization'] = 'Basic ' . base64_encode($login.':'.$password);
$httpHeaders["Content-type"] = "application/json";
$curlOptions = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_SSL_VERIFYPEER => true,
	CURLOPT_CUSTOMREQUEST => $httpMethod
);
$curlOptions[CURLOPT_POST] = true;
$curlOptions[CURLOPT_POSTFIELDS] = $postFields;
$curlOptions[CURLOPT_URL] = $url;
$curlOptHttpHeader = array();
foreach ($httpHeaders as $key => $value) {
	$curlOptHttpHeader[] = "{$key}: {$value}";
}
$curlOptions[CURLOPT_HTTPHEADER] = $curlOptHttpHeader;
$ch = curl_init();
curl_setopt_array($ch, $curlOptions);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$responceHeader = substr($response, 0, $headerSize);
$responceBody = substr($response, $headerSize);
$resultArray = null;
if ($curlError = curl_error($ch)) {
	throw new Exception($curlError);
} else {
	$resultArray = json_decode($responceBody, true);	
}
$resultArray = json_decode($responceBody, true);
curl_close($ch);
for($i=0;$i <= ($resultArray["total"]-1);$i++) {
	if(strstr($resultArray["list"][$i]["emailAddress"],"facundo@estudiorochayasoc.com.ar")) {
		$resultado = "si";
	} else {
		$resultado = "no";
	}	
};
echo $resultado;
?>


