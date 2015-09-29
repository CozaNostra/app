<?php

class GraphicsEditor {

	//Рендерим все по полученным параметрам
	public static function render($figures,$type = null){

		if(!is_array($figures)) return false;

		foreach($figures as $figure){

			if($type && $type != $figure['type']) continue;

			ob_start();
			self::$figure['type']($figure['params']);
			self::renderFigure(ob_get_clean());

		}
	}

	//Выводим фигуры на страницу
	protected static function renderFigure($data){
		echo '<img src="data:image/png;base64,'.base64_encode($data).'" >';
	}

	//Рисуем круг
	/*
	* diametr 		(int) 	- диаметр
	* borderColor 	(array) - цвет границы, RBG
	* bgColorFigure (array) - заливка фигуры, RBG
	* bgColor 		(array) - цвет заливки поля вокруг, RBG
	* transparent	(bool) 	- Прозрачный фон картинки
	*/
	protected static function circle($params){
		$borderColor	= isset($params['borderColor']) ? $params['borderColor'] : null;
		$bgColor 		= isset($params['bgColor']) ? $params['bgColor'] : null;
		$bgColorFigure 	= isset($params['bgColorFigure']) ? $params['bgColorFigure'] : null;
		$indent 		= $params['diametr']/2+1;
		// Размер картинки с отступами
		$im 	= imagecreatetruecolor($params['diametr'], $params['diametr']);
		// Устанавливаем цвет границ
		if($borderColor)
			$border = imagecolorallocate($im, $borderColor[0],$borderColor[1],$borderColor[2]);
		// Устанавливаем заливку поля
		if(empty($params['transparent'])){
			$bg = imagecolorallocate($im, $bgColor[0],$bgColor[1],$bgColor[2]);
		}else{
			$bg = imagecolorallocatealpha($im, 0, 0, 0, 127);
		}
		// Устанавливаем заливку круга
		$bgCircle 	= imagecolorallocate($im, $bgColorFigure[0],$bgColorFigure[1],$bgColorFigure[2]);
		imagefill($im, 1, 1, $bg);
		imagesavealpha($im, TRUE);
		// Рисуем круг
		imagefilledellipse($im, $indent-1, $indent-1, $params['diametr']-1, $params['diametr']-1,$bgCircle);
		if($borderColor)
			imageellipse($im, $indent-1, $indent-1, $params['diametr']-1, $params['diametr']-1, $border);
		// Выводим изображение
		imagepng($im);
	}

	//Рисуем квадрат
	/*
	* side 			(int) 	- размер стороны
	* borderColor 	(array) - цвет границы, RBG
	* bgColorFigure (array) - заливка фигуры, RBG
	* bgColor 		(array) - цвет заливки поля вокруг, RBG
	* indent 		(int) 	- отступ от стенки до внешней границы
	* transparent	(bool) 	- Прозрачный фон картинки
	*/
	protected static function square($params){
		$borderColor	= isset($params['borderColor']) ? $params['borderColor'] : null;
		$bgColor 		= isset($params['bgColor']) ? $params['bgColor'] : null;
		$bgColorFigure 	= isset($params['bgColorFigure']) ? $params['bgColorFigure'] : null;
		$indent 		= isset($params['indent']) ? $params['indent'] : 0;
		// Размер картинки с отступами
		$im 	= imagecreatetruecolor($params['side']+$indent*2, $params['side']+$indent*2);
		// Устанавливаем цвет границ
		if($borderColor)
			$border = imagecolorallocate($im, $borderColor[0],$borderColor[1],$borderColor[2]);
		// Устанавливаем заливку поля
		if(empty($params['transparent'])){
			$bg = imagecolorallocate($im, $bgColor[0],$bgColor[1],$bgColor[2]);
		}else{
			$bg = imagecolorallocatealpha($im, 0, 0, 0, 127);
		}
		// Устанавливаем заливку круга
		$bgSquare 	= imagecolorallocate($im, $bgColorFigure[0],$bgColorFigure[1],$bgColorFigure[2]);
		imagefill($im, 1, 1, $bg);
		imagesavealpha($im, TRUE);
		// Рисуем квадрат
		imagefilledrectangle($im, $indent-1, $indent-1, $params['side']+$indent, $params['side']+$indent,$bgSquare);
		
		if($borderColor){
			if($indent==0)
				imagerectangle($im, $indent, $indent, $params['side']+$indent-1, $params['side']+$indent-1, $border);
			else
				imagerectangle($im, $indent-1, $indent-1, $params['side']+$indent, $params['side']+$indent, $border);
		}
		
		// Выводим изображение
		imagepng($im);
	}
}