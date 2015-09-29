<?php
	
	require_once __DIR__.'/helpers/GraphicsEditor.php';

	$shapes = [ 
		//Круги
	    ['type' => 'circle', 'params' => [
	    		'diametr' => 50, 					// диаметр окружности
	    		'borderColor' => [0,0,0], 			// Цвет границы RGB
	    		'bgColorFigure' => [100,100,255], 	// Заливка круга RGB
	    		'bgColor' => [100,255,100], 		// Заливка поля вокруг RGB
	    		'transparent' => false, 			//прозрачный фон
	    	]
	    ],

	    ['type' => 'circle', 'params' => [
	    		'diametr' => 50, 					// диаметр окружности
	    		'borderColor' => [0,0,0], 			// Цвет границы RGB
	    		'bgColorFigure' => [100,100,255], 	// Заливка круга RGB
	    		'transparent' => true, 			//прозрачный фон
	    	]
	    ],

	    ['type' => 'circle', 'params' => [
	    		'diametr' => 50, 					// диаметр окружности
	    		'bgColorFigure' => [100,100,255], 	// Заливка круга RGB
	    		'transparent' => true, 			//прозрачный фон
	    	]
	    ],

	    ['type' => 'circle', 'params' => [
	    		'diametr' => 50, 					// диаметр окружности
	    		'transparent' => true, 			//прозрачный фон
	    	]
	    ],

	    ['type' => 'circle', 'params' => [
	    		'diametr' => 50, 					// диаметр окружности
	    		'bgColor' => [100,255,100], 		// Заливка поля вокруг RGB
	    	]
	    ],

	    //Квадраты
	    ['type' => 'square', 'params' => [
	    		'side' => 30, 						// сторона квадрата
	    		'borderColor' => [255,5,5], 		// Цвет границы RGB
	    		'bgColorFigure' => [100,100,255], 	// Заливка квадрата RGB
	    		'bgColor' => [100,100,100], 		// Заливка RGB
	    		'indent' => 10,						// Отступ
	    		'transparent' => false, 			//прозрачный фон
	    	]
	    ],
	    ['type' => 'square', 'params' => [
	    		'side' => 30, 						// сторона квадрата
	    		'borderColor' => [255,5,5], 		// Цвет границы RGB
	    		'bgColorFigure' => [100,100,255], 	// Заливка квадрата RGB
	    		'bgColor' => [100,100,100], 		// Заливка RGB
	    		'indent' => 10,						// Отступ
	    		'transparent' => true, 				//прозрачный фон
	    	]
	    ],
	    ['type' => 'square', 'params' => [
	    		'side' => 30, 						// сторона квадрата
	    		'bgColorFigure' => [100,100,255], 	// Заливка квадрата RGB
	    		'bgColor' => [100,100,100], 		// Заливка RGB
	    		'indent' => 10,						// Отступ
	    		'transparent' => true, 				//прозрачный фон
	    	]
	    ],
	    ['type' => 'square', 'params' => [
	    		'side' => 30, 						// сторона квадрата
	    		'bgColor' => [100,100,100], 		// Заливка RGB
	    		'indent' => 10,						// Отступ
	    	]
	    ],
	    ['type' => 'square', 'params' => [
	    		'side' => 30, 						// сторона квадрата
	    		'bgColor' => [0,100,100], 		// Заливка RGB
	    		'indent' => 6,						// Отступ
	    	]
	    ],
	    ['type' => 'square', 'params' => [
	    		'side' => 30, 						// сторона квадрата
	    	]
	    ],
	];
?>

<h1>Круги</h1>
<?php GraphicsEditor::render($shapes,'circle');?>
<h1>Квадраты</h1>
<?php GraphicsEditor::render($shapes,'square');?>
<h1>Все вместе</h1>
<?php GraphicsEditor::render($shapes);?>