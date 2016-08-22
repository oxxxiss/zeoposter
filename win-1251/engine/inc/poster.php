 <?PHP
/*
=====================================================
 Модуль ZeoPoster для DLE - by LisER 
=====================================================
 Данный код защищен авторскими правами
=====================================================
 Файл: poster.php
-----------------------------------------------------
 Назначение: Обработчик модуля
=====================================================
*/
if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
	die( "Hacking attempt!" );
}
	// Чтобы обновить
	// открыть файл /inc/editnews.php
	// найти p.id,
	// заменить на p.id, p.xfields,

	include(ENGINE_DIR . "/engine/modules/functions.php");

	$cfg_poster = array(		
		'width' 	  => "100",	 // Размер постера 		
		'no_img'      => "", 	 // Ссылка на no image	
		'zeoposter'   => false, // Если установлен модуль ZeoPoster то установите эту функцию (true)	
		'xfields'     => 'poster', // Название доп поли
		'xfields_use' => true,
	);
		if( isset( $cfg_poster[no_img] ) AND trim( $cfg_poster[no_img] ) )
			$no_poster = $cfg_poster[no_img];
		else
			$no_poster = $config['http_home_url'] . "templates/" . $config['skin'] . "/dleimages/no_image.jpg";
	
	if ($cfg_poster[xfields_use] == false)
	{	
		if($cfg_poster[zeoposter] == true){
			$images = array();
			$data[] = $row[poster];		
		}elseif($cfg_poster[zeoposter] == false OR $cfg_poster[zeoposter] == "" OR trim ( $cfg_poster[zeoposter] ) == ""){
			$short_story = stripslashes($row['short_story']);
			$images = array();
			preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $short_story, $media);
			$data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);
		}
		
			foreach($data as $url) {
				$info = pathinfo($url);
				if (isset($info['extension'])) {
					$info['extension'] = strtolower($info['extension']);
					if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png')) array_push($images, $url);
				}
			}
		
		if ( count( $images ) ) 
			$image = $url;
		 else 
			$image = $no_poster;
	}
	else
	{		
		$xfieldsdata = xfieldsdataload( $row['xfields'] );
		
		if($xfieldsdata[$cfg_poster[xfields]])
			$image = $xfieldsdata[$cfg_poster[xfields]];
		else			
			$image = $no_poster;
		
 	}
	    
	$title = $title. '</a> <td style="text-align: center"><a  href="'.$PHP_SELF.'?mod=editnews&action=editnews&id='.$row['id'].'"><img src="'.$image.'"style="width:'. $cfg_poster[width] .'px;"></a></td>';
	
	if($i == 1) $lang['edit_title'] = $lang['edit_title']. '</td><td style="width: 140px" ><i class="icon-picture tip" data-original-title="Постер"></i>';

?>