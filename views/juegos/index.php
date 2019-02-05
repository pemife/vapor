<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JuegosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Juegos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="juegos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Juegos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'imagen',
                'value' => function ($model){
                    return '<a href="' .
                    Url::to(['juegos/view', 'id' => $model->id]) .
                    '"><img src="' . Html::encode($model->imagen) .
                    '" width="150" height="75"></a>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'titulo',
                'value' => function ($model){
                    return '<a href="' .
                    Url::to(['juegos/view', 'id' => $model->id]) .
                    '">' . Html::encode($model->titulo) . '</a>';
                },
                'format' => 'html',
            ],
            'descripcion:ntext',
            'precio:currency',
            //'dev',
            //'publisher',
            'fecha_salida:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
