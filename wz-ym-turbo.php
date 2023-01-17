<?php
/*
 * Загрузка xml из файла https://www.php.net/manual/ru/function.simplexml-load-file.php
 * Класс SimpleXMLElement https://www.php.net/manual/ru/simplexml.examples-basic.php
 * namespaces https://www.php.net/manual/en/simplexmlelement.getdocnamespaces.php
 * Создать xml текстом https://snipp.ru/php/yandex-turbo
 */
header('Content-Type: text/html; charset=utf-8');
$message = array('<pre>');
array_push($message, 'wz-ym-turbo start');
$xml_path = './xml/wz-ym-turbo.xml';
$xml_path_output = './xml/wz-ym-turbo-output.xml';
if (file_exists($xml_path)) {
	array_push($message, 'xml_path: ' . $xml_path);
	array_push($message, 'xml_path_output: ' . $xml_path_output);
    //$xml = simplexml_load_file($xml_path, 'SimpleXMLElement', LIBXML_NOCDATA);
    $xml = simplexml_load_file($xml_path);
    //array_push($message, '$xml: ' . print_r($xml, true));
    //array_push($message, '$xml->asXML(): ' . htmlspecialchars(print_r($xml->asXML()), true));
	//$xml_namespaces = $xml->getDocNamespaces();
	$xml_namespaces = $xml->getNameSpaces( true );
	array_push($message, 'xml_namespaces: ' . print_r($xml_namespaces, true));
	//$xml_turbo = $xml->children( $xml_namespaces[ 'turbo' ] );
	//array_push($message, 'xml_turbo: ' . print_r($xml_turbo, true));
	//$xml_content = (string) $xml_turbo->{'content'};
	//array_push($message, 'xml_content: ' . htmlspecialchars(print_r($xml_content, true)));
	$xml_item_new = $xml->channel->item[0];
	array_push($message, '$xml->channel->item start');
	foreach ($xml->channel->item as $item) {
	   array_push($message, 'link: ' . $item->link);
	   //$namespaces = $item->getNameSpaces( true );
	   //array_push($message, 'namespaces: ' . print_r($namespaces, true));
	   //$turbo = $item->children( $namespaces[ 'turbo' ] );
	   $turbo = $item->children( $xml_namespaces[ 'turbo' ] );
	   array_push($message, 'turbo: ' . htmlspecialchars(print_r($turbo, true)));
	   $content = (string) $turbo->{'content'};
	   array_push($message, 'content: ' . htmlspecialchars(print_r($content, true)));
	   $extendedHtml = (string) $turbo->{'extendedHtml'};
	   array_push($message, 'extendedHtml: ' . htmlspecialchars(print_r($extendedHtml, true)));
	   //array_push($message, 'turbo: ' . print_r($item->turbo, true));
	   //array_push($message, 'turbo: ' . print_r($item->{'turbo:content'}, true));
	   //$xml_item_new = $item;
	   //array_push($message, 'xml_item_new: ' . print_r($xml_item_new, true));
	   //array_push($message, 'xml_item_new->asXML(): ' . print_r($xml_item_new->asXML(), true));
	}
	array_push($message, '$xml->channel->item end');
	//array_push($message, 'xml_item_new: ' . htmlspecialchars(print_r($xml_item_new, true)));
	$xml_item_new_children = $xml_item_new->children();
	array_push($message, 'xml_item_new_children: ' . htmlspecialchars(print_r($xml_item_new_children, true)));
	//$xml->channel[2] = $xml_item_new->asXML();
	//$xml->channel->item[] = $xml_item_new->asXML();
	$xml->channel->item[] = $xml_item_new;
	//$xml_added_child = $xml->channel->addChild('item');
	//$xml_added_child[0] = $xml_item_new->asXML();
	//$xml_added_child[0] = $xml_item_new->children( $xml_namespaces[ 'turbo' ] )->asXML();
	//$xml->channel->{$xml_item_new->getName()}[] = $xml_item_new->asXML(); 
	//$xml->channel->{$xml_item_new->getName()}[] = $xml_item_new->asXML(); 
	array_push($message, 'xml: ' . print_r($xml, true));
	//array_push($message, '$xml->asXML(): ' . htmlspecialchars(print_r($xml->asXML()), true));
	$xml->asXML($xml_path_output);
} else {
	array_push($message, 'xml_path: ' . $xml_path . ' doesn`t exists');
	array_push($message, 'xml_path_output: ' . $xml_path_output . ' doesn`t exists');
}

/*$x = new SimpleXMLElement('<root name="toplevel"></root>');
$f1 = new SimpleXMLElement('<child pos="1">alpha</child>');
$f2 = new SimpleXMLElement('<child pos="2">beta</child>');
$f3 = new SimpleXMLElement('<child pos="3">gamma</child>');

$x->{$f1->getName()} = $f1;
$x->{$f2->getName()}[] = $f2;
$x->{$f3->getName()}[] = $f3;

array_push($message, 'count child=' . $x->count());
array_push($message, $x->asXML());

foreach ( $x->children() as $foo )
{
    array_push($message, $foo);
}*/


array_push($message, 'wz-ym-turbo end');
array_push($message, '</pre>');
//if( current_user_can('administrator') ){
	echo implode('<br />', $message);
//}
?>