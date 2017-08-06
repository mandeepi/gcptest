<?php

require __DIR__ . '/vendor/autoload.php';

const DEFAULT_URL = 'https://presentation-bb.firebaseio.com/';
const DEFAULT_TOKEN = 'yaB7bgMeJhKI9uP9fkJ9sHi01cnoucOzBdJIjZgO';
const DEFAULT_PATH = '/';

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);
$products = $firebase->get(DEFAULT_PATH);
$json=json_decode($products, true);

$numOfSugg=5;
$numOfSuggFound=0;

foreach($json as $key => $value)
{
	if ($numOfSuggFound==$numOfSugg)
	{
		break;
	}
	if (strpos($value['name'], $_GET['term']) === 0)
	{
		$arr[$numOfSuggFound]=$value['name'];
		$numOfSuggFound=$numOfSuggFound+1;
	}
}
echo json_encode($arr);

?>