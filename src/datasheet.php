<?php

// SETTINGS

$country = "nl";
$apiKey = "dk4q9ss8cxttdzjddw7v83mw";

// ------------

require_once('workflows.php');
$wf = new Workflows();

$farnell = array(
	"http://api.element14.com//catalog/products?term=any:" . str_replace(" ", "+", "{query}"),
	"storeInfo.id=$country.farnell.com",
	"resultsSettings.offset=0",
	"resultsSettings.numberOfResults=25",
	"resultsSettings.refinements.filters=",
	"resultsSettings.responseGroup=medium",
	"callInfo.omitXmlSchema=false",
	"callInfo.callback=",
	"callInfo.responseDataFormat=json",
	"callinfo.apiKey=p69bn6eddxvtnpj6eqz7ecgr"
);

$json = $wf->request( implode("&", $farnell) );
$json = json_decode( $json, true );
$json = $json['keywordSearchReturn'];
$json = $json['products'];

$datasheetList = array();

if ($json)
{
	usort($json, function($a, $b) { return strcmp($a['brandName'], $b['brandName']); });
	foreach( $json as $result )
	{
		if ( $result['datasheets'] )
		{
			$datasheets = $result['datasheets'];
			foreach ( $datasheets AS $datasheet )
			{
				if ($datasheet['type'] == 'T' && !in_array($datasheet['url'], $datasheetList))
				{
					$desc = $result['displayName'];
					$desc = str_replace($result['brandName'], "", $desc);
					$desc = str_replace($result['translatedManufacturerPartNumber'], "", $desc);
					$desc = preg_replace("/^[-\s]+/", "", $desc);

					$wf->result( 
						$result['id'],
						$datasheet['url'],
						ucwords(strtolower($result['brandName'])) . " - " . $result['translatedManufacturerPartNumber'],
						$desc,
						"pdf.png",
						"yes"
					);
					array_push($datasheetList, $datasheet['url']);
				}
			}
		}
	}
}

if ( count($wf->results()) <= 0 )
{
	$wf->result( 'google', 'https://www.google.com/search?ie=UTF-8&oe=UTF-8&q='.urlencode( "{query} datasheet filetype:pdf" ), 'Nothing Found', 'Datasheet not found. Look for {query} datasheet on Google', 'google.png' );
}

echo $wf->toxml();

?>