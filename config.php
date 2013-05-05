<?php
//simple config
$config=array(
	'Default'=>array( //default params
		'key'=>'YOUR_GOOGLE_MAPS_API_KEY', 
		'width'=>12050,
		'height'=>7050,
		'centerN'=>37.650101, 
		'centerE'=>55.778781,
		'zoom'=>16,
		'size'=>640, //shud be always whit sides 1:1 (200x200,320x320,640x640)
		'scale'=>1,
	),
	'Menu'=>array(
		'zoom'=>array(
			15=>array(
				'ctocN'=>0.027450,
				'ctocE'=>0.015430,
			),
			16=>array(
				'ctocN'=>0.013750,
				'ctocE'=>0.007730,
			),
			17=>array(
				'ctocN'=>0.006850,
				'ctocE'=>0.003850,
			),
		),
	),
);
?>