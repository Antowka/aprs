<?php

/**
 * Created by Anton Nikanorov on 4/20/15.
 * Email: 662307@gmail.com
 */

require_once 'APRS.php';

$params = array(
	'server'   => 'russia.aprs2.net',
	'callsign' => 'UC6KFQ',       //your callsign
	'port' => '14580',
	'pass' => '00000',            //your aprs pass
	'ico'  => 'y'	              //aprs icon (y - red car)
);

$lat = '4456.38N';                //lat
$long = '3407.74E';               //long
$comment = 'op.Anton 145.500Mhz'; //coment for marker on map

$aprs = new APRS($params);
$aprs->sendPosition($lat, $long, $comment);