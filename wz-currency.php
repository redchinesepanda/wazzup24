<?php
/*
 * Получаем через json ip адрес теккущего пользователя через сайт https://ipinfo.io/json
 * javascript напрямую выдает ошибку: Запрос из постороннего источника заблокирован: Политика одного источника запрещает чтение удаленного ресурса на https://ipinfo.io/json (Причина: не удалось выполнить запрос CORS).
 * Взято с deti.digital
 */
/*
 * Без параметра получаем через json страну теккущего пользователя через сайт https://ipinfo.io/json
 *{
  "ip": "5.101.156.100",
  "hostname": "m1.bigbone.beget.com",
  "city": "Saint Petersburg",
  "region": "St.-Petersburg",
  "country": "RU",
  "loc": "59.9386,30.3141",
  "org": "AS198610 Beget LLC",
  "postal": "190000",
  "timezone": "Europe/Moscow",
  "readme": "https://ipinfo.io/missingauth"
 }
 * С параметром, в котором ответ json, полученный без параметра, получаем валюту этой страны, записанную на сервере. Настройки на сервере могут поменяться. Это привязано к платежным системам. Это отдаем в javascript.
 *{"data":{"country":"RU","currency":"RUR"}}
 * javascript напрямую выдает ошибку: Запрос из постороннего источника заблокирован: Политика одного источника запрещает чтение удаленного ресурса на https://ipinfo.io/json (Причина: не удалось выполнить запрос CORS).
 * Взято с deti.digital
 */
function wz_get_ipinfo($json_ipinfo = null) {
	$message = array('<pre>');
	array_push($message, 'wz_get_ipinfo');
	$ipinfo_token = 'd8cd47ccef40d3';
	$client_ip = '192.168.0.1';
	//$remote_addr = '';
	//if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
	//	$remote_addr = $_SERVER['REMOTE_ADDR'];
	//}
	/* 
	 * Extra server variables that are available to cloud flare
	 * real visitor ip address
	 * https://stackoverflow.com/questions/14985518/cloudflare-and-logging-visitor-ip-addresses-via-in-php
	 */
	$http_cf_connecting_ip = '';
	if (
		empty($http_cf_connecting_ip)
		&& array_key_exists('HTTP_CF_CONNECTING_IP', $_SERVER)
	) {
		$http_cf_connecting_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
		array_push($message, 'HTTP_CF_CONNECTING_IP: ' . $http_cf_connecting_ip);
	}
	if (
		empty($http_cf_connecting_ip)
		&& array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)
	) {
		$http_cf_connecting_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		array_push($message, 'HTTP_X_FORWARDED_FOR: ' . $http_cf_connecting_ip);
	}
	if (
		empty($http_cf_connecting_ip)
		&& array_key_exists('REMOTE_ADDR', $_SERVER)
	) {
		$http_cf_connecting_ip = $_SERVER["REMOTE_ADDR"];
		array_push($message, 'REMOTE_ADDR: ' . $http_cf_connecting_ip);
	}
	if (
		empty($http_cf_connecting_ip)
		&& array_key_exists('HTTP_CLIENT_IP', $_SERVER)
	) {
		$http_cf_connecting_ip = $_SERVER["HTTP_CLIENT_IP"];
		array_push($message, 'HTTP_CLIENT_IP: ' . $http_cf_connecting_ip);
	}
	if(filter_var($http_cf_connecting_ip, FILTER_VALIDATE_IP) !== false) {
		$client_ip = $http_cf_connecting_ip;
	}
	array_push($message, 'client_ip: ' . $client_ip);
	/* country of visitor */
	//$http_cf_ipcountry = $_SERVER["HTTP_CF_IPCOUNTRY"];
	//array_push($message, 'http_cf_ipcountry: ' . $http_cf_ipcountry);
	$url = 'https://ipinfo.io/' . $client_ip . '/json?token=' . $ipinfo_token;
	if (!empty($json_ipinfo)) {
		array_push($message, 'json_ipinfo: ' . print_r($json_ipinfo, true));
		$json_ipinfo_object = json_decode($json_ipinfo);
		array_push($message, 'json_ipinfo_object: ' . print_r($json_ipinfo_object, true));
		$url = 'https://app.wazzup24.com/api/v1/billing/currency/' . $json_ipinfo_object->{'country'};
	}
	array_push($message, 'url: ' . $url);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$json = 'error';
	if( ($json = curl_exec($ch) ) === false) {
		array_push($message, 'Curl error: ' . curl_error($ch));
	} else {
		array_push($message, 'Operation completed without any errors');
	}
	// Close handle
	curl_close($ch);
	$json_object = json_decode($json);
	$json_object->{'client_ip'} = $client_ip;
	$json_object->{'url'} = $url;
	$json = json_encode($json_object);
	array_push($message, 'json:');
	array_push($message, print_r($json, true));
	array_push($message, '</pre>');
	//if ( current_user_can('editor') || current_user_can('administrator') ) {
	//	echo implode('<br />', $message);
	//}
	
	//$json_object = json_decode($json);
	//$json_object->{'message'} = $message;
	//$json = json_encode($json_object);
	
	return $json;
}
?>