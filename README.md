#ОПИСАНИЕ
![version](https://img.shields.io/badge/version-1.1-red.svg?style=flat-square "Version")
![DLE](https://img.shields.io/badge/DLE-10.x-green.svg?style=flat-square "DLE Version")

Модуль очень простенький. Выводить постер при редактировнии. Может выводить {image-1} или с доп поли или с поля модуля ZeoParser. Не требует много правок. Просто надо подключить модуль. Что делает его очень гибким. 

# НА ЧИПСЫ
1. Qiwi: +79994768647
2. WM: R246895222292 , Z869848337718

#УСТАНОВКА 
> ##ШАГ 1

	 /engine/inc/editnews.php

найти 

	if( $row['comm_num'] > 0 ) {

вставить перед

	include(ENGINE_DIR . "/inc/poster.php");
	
> ##ШАГ 2 

<b>ЕСЛИ У ВАС НЕ УСТАНОВЛЕН МОДУЛЬ ZeoParser, ЭТО ШАГ НЕ ДЕЛАЙТЕ !</b> 

найти 

	 p.short_story,
	 
дальше вставить

	 p.poster,
