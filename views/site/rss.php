<?php
use yii\helpers\Html;
use tugmaks\RssFeed\RssReader;
$this->title = 'RSS лента новостей';
?>

    <div class="col-md-10">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <br>

<?php
echo RssReader::widget([
    'channel' => 'https://news.tut.by/rss/finance.rss',
    'pageSize' => 2,
    'itemView' => '@app/views/site/_rss_item',
    'wrapTag' => 'div',
    'wrapClass' => 'rss-wrap',
]);