<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',
            'descripcion:ntext',
            'precio',
            'dev',
            //'publisher',
            //'fecha_salida',
            //'portada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
