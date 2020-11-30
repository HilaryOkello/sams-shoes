<?php
/** @var $dataProvider \yii\data\ActiveDataProvider */

?>



<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class,
    ],
    'itemView' => '_shoe_item',
    'layout' => '<div class="col-sm-12 d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>