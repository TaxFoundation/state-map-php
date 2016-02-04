<?php

function colorReplace($map,$state,$color) {
	return preg_replace('/<path\n.*\n.*style=".*\n.*id="'.$state.'/','<path inkscape:connector-curvature="0" style="fill:'.$color.';stroke:#ffffff;stroke-width:1;stroke-miterlimit:4;stroke-dasharray:none" id="'.$state,$map);
}
$vectorMap = file_get_contents('map_v2-11-2014.svg');

function textReplace($map,$state,$figure,$rank) {
		$newText= preg_replace("/%".strtolower($state)."f/",$figure,$map);
		return preg_replace("/%".strtolower($state)."r/",$rank,$newText);
}

function boxReplace($map,$state,$color) {
	$newmap = preg_replace('/style="fill:#c8c8c8;.*"/','',$map);
	return preg_replace('/id="'.strtolower($state).'rect"/','id="'.strtolower($state).'rect" style="fill:'.$color.';fill-opacity:1;stroke:#ffffff;stroke-opacity:1;stroke-width:1;stroke-miterlimit:4;stroke-dasharray:none"',$newmap);
}

function handleState($state,$map,$red,$green,$blue,$figure,$rank) {
	$color = rgb2html($red,$green,$blue);
	$map = textReplace($map,$state,$figure,$rank);
	$map = boxReplace($map,$state,$color);
	$map = colorReplace($map,$state,$color);
	return $map;
}

function rgb2html($r, $g=-1, $b=-1)
{
    if (is_array($r) && sizeof($r) == 3)
        list($r, $g, $b) = $r;

    $r = intval($r); $g = intval($g);
    $b = intval($b);

    $r = dechex($r<0?0:($r>255?255:$r));
    $g = dechex($g<0?0:($g>255?255:$g));
    $b = dechex($b<0?0:($b>255?255:$b));

    $color = (strlen($r) < 2?'0':'').$r;
    $color .= (strlen($g) < 2?'0':'').$g;
    $color .= (strlen($b) < 2?'0':'').$b;
    return '#'.$color;
}


//Paste in excel file output here
$vectorMap = handleState('AL',$vectorMap,191,74,76,'36.5%','#9');
$vectorMap = handleState('AK',$vectorMap,253,171,64,'20.0%','#50');
$vectorMap = handleState('AZ',$vectorMap,191,74,76,'36.5%','#10');
$vectorMap = handleState('AR',$vectorMap,201,89,74,'34.5%','#21');
$vectorMap = handleState('CA',$vectorMap,239,149,67,'27.2%','#40');
$vectorMap = handleState('CO',$vectorMap,232,138,68,'28.8%','#35');
$vectorMap = handleState('CT',$vectorMap,249,165,65,'23.6%','#46');
$vectorMap = handleState('DE',$vectorMap,247,162,65,'24.5%','#45');
$vectorMap = handleState('FL',$vectorMap,214,111,72,'32.1%','#30');
$vectorMap = handleState('GA',$vectorMap,186,65,77,'37.9%','#7');
$vectorMap = handleState('HI',$vectorMap,249,165,65,'23.5%','#47');
$vectorMap = handleState('ID',$vectorMap,199,86,75,'34.9%','#16');
$vectorMap = handleState('IL',$vectorMap,244,157,66,'25.7%','#43');
$vectorMap = handleState('IN',$vectorMap,213,109,72,'32.3%','#29');
$vectorMap = handleState('IA',$vectorMap,209,102,73,'33.1%','#26');
$vectorMap = handleState('KS',$vectorMap,240,151,67,'27.0%','#41');
$vectorMap = handleState('KY',$vectorMap,195,80,76,'35.7%','#14');
$vectorMap = handleState('LA',$vectorMap,175,47,80,'44.0%','#2');
$vectorMap = handleState('ME',$vectorMap,193,76,76,'36.2%','#11');
$vectorMap = handleState('MD',$vectorMap,225,127,70,'30.2%','#33');
$vectorMap = handleState('MA',$vectorMap,232,138,68,'28.8%','#36');
$vectorMap = handleState('MI',$vectorMap,205,95,74,'33.8%','#24');
$vectorMap = handleState('MN',$vectorMap,235,144,68,'28.1%','#39');
$vectorMap = handleState('MS',$vectorMap,174,46,80,'45.3%','#1');
$vectorMap = handleState('MO',$vectorMap,181,58,78,'39.4%','#5');
$vectorMap = handleState('MT',$vectorMap,183,60,78,'39.0%','#6');
$vectorMap = handleState('NE',$vectorMap,203,92,74,'34.2%','#22');
$vectorMap = handleState('NV',$vectorMap,245,158,66,'25.5%','#44');
$vectorMap = handleState('NH',$vectorMap,231,137,69,'29.0%','#34');
$vectorMap = handleState('NJ',$vectorMap,243,155,66,'26.2%','#42');
$vectorMap = handleState('NM',$vectorMap,191,73,76,'36.6%','#8');
$vectorMap = handleState('NY',$vectorMap,210,104,73,'32.8%','#27');
$vectorMap = handleState('NC',$vectorMap,208,101,73,'33.2%','#25');
$vectorMap = handleState('ND',$vectorMap,252,171,64,'20.5%','#49');
$vectorMap = handleState('OH',$vectorMap,199,86,75,'34.9%','#17');
$vectorMap = handleState('OK',$vectorMap,196,81,75,'35.5%','#15');
$vectorMap = handleState('OR',$vectorMap,193,77,76,'36.1%','#12');
$vectorMap = handleState('PA',$vectorMap,223,124,70,'30.6%','#32');
$vectorMap = handleState('RI',$vectorMap,204,94,74,'34.0%','#23');
$vectorMap = handleState('SC',$vectorMap,213,108,72,'32.4%','#28');
$vectorMap = handleState('SD',$vectorMap,178,53,79,'40.8%','#4');
$vectorMap = handleState('TN',$vectorMap,178,53,79,'41.0%','#3');
$vectorMap = handleState('TX',$vectorMap,201,89,74,'34.5%','#20');
$vectorMap = handleState('UT',$vectorMap,217,115,71,'31.6%','#31');
$vectorMap = handleState('VT',$vectorMap,200,87,75,'34.8%','#18');
$vectorMap = handleState('VA',$vectorMap,249,165,65,'23.5%','#48');
$vectorMap = handleState('WA',$vectorMap,233,140,68,'28.6%','#37');
$vectorMap = handleState('WV',$vectorMap,200,88,75,'34.7%','#19');
$vectorMap = handleState('WI',$vectorMap,235,143,68,'28.2%','#38');
$vectorMap = handleState('WY',$vectorMap,194,78,76,'36.0%','#13');
$vectorMap = handleState('DC',$vectorMap,255,255,255,'0.0%','Not ranked');



echo $vectorMap;


?>
