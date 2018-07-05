Yii2 Widgets Extensions  (yii2-pjax3 => Yii2 pjax3 yang compatible dengan jquery versi 3 ke atas)
===============
Extensions ini diperuntukan untuk kebutuhan penggunaan pjax di yii2,
masalah yang ada, bila kita telah mengubah theme, layout kita dengan berbagai css, js, yang berbeda dari core nya yii2,
(terutama jquery nya) terkadang akan confict atau pjax tidak terdeteksi,
maka dengan extensions ini akan memperbaiki masalah tersebut



Installation
------------

Install From the Archive
------------
Download the latest release dari sini [realeses](https://github.com/ichsanmust/yii2-widgets/releases)., dan extract di project. 
di config aplikasi , tambakan aliases dan path untuk extension ini.

...
return [
    
    'aliases' => [
        '@ichsanmust/widgets' => 'path/to/your/extracted',
        // contoh: '@ichsanmust/widgets' => '@app/extensions/ichsanmust/widgets',
        
    ]
];
...


Contoh Penggunaan 
------------

// controller 
```
public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
```

// view 

```
<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
	\ichsanmust\widgets\Pjax3::begin([  //di pake di sini
		'id'=>'pjax-product-gridview',
		'enablePushState'=>false,
		'timeout'=>100000,
	]); 
?>

<?= GridView::widget([
	'id'=>'crud-product-ichsanmust',
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		'id_product',
		'product_name',
		'id_product_category',
		'stok',
		
		['class' => 'yii\grid\ActionColumn'],
	],
]); ?>
<?php \ichsanmust\widgets\Pjax3::end(); //di pake di sini ?>

<?php
	$this->registerJs(
		   '
			$("#pjax-product-gridview").on("pjax:send", function() { // beforeSend
				$("#loader").show();
			})
			$("#pjax-product-gridview").on("pjax:complete", function() { // complete
				$("#loader").hide();
				$("select").material_select();
			})
			'
		);
?>
...
					




