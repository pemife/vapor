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
                    return Html::a(
                        Html::img(Html::encode($model->imagen),
                            [
                                'height' => '75',
                                'width' => '150',
                            ]
                        ),
                        ['juegos/view', 'id' => $model->id]
                    );
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'titulo',
                'value' => function ($model){
                    return Html::a(
                        Html::encode($model->titulo),
                        ['juegos/view', 'id' => $model->id]
                    );
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
