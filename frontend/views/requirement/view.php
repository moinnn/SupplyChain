<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */

$this->title = 'Requirement '.$model->requirement_id;
$this->params['breadcrumbs'][] = ['label' => 'Requirements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->requirement_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'requirement_id',
            'requirement_time_limit',
            'requirement_cost',
            [
                'attribute' => 'startDepot.name',
                'label' => 'Start Depot',
                'format' => 'html',
                'value' => '<a href=../warehouse/'.$model->startDepot->depot_id.'>'.$model->startDepot->name.'</a>',
            ],
            [
                'attribute' => 'endDepot.name',
                'label' => 'End Depot',
                'format' => 'html',
                'value' => '<a href=../warehouse/'.$model->endDepot->depot_id.'>'.$model->endDepot->name.'</a>',
            ],
            [
                'attribute' => 'depots',
                'value' => implode(', ', ArrayHelper::getColumn($model->depots, 'name')),
                'format' => 'html',
                'label' => 'Pass Depots',
            ],
            'requirement_path:ntext',
        ],
    ]) ?>

</div>
