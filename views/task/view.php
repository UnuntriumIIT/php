<?php

/**
 * @var $title
 * @var $description
 * @var $status
 * @var $type
 * @var $comments
 * @var $author
 * @var $costs
 */

?>
<a href='/task/list' class='btn-default btn'>< Назад</a>
<h1><?php echo $title; ?></h1>
<p>Описание: <br /><?php echo $description; ?></p>
<p>Автор: <?php echo $author; ?></p>
<p>Статус: <?php echo $status; ?></p>
<p>Тип: <?php echo $type; ?></p>
<h3>Комментарии:</h3>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Комментарий</th>
        <th scope="col">Автор комментария</th>
        <th scope="col">Дата комментария</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($comments as $item) {
        echo '<tr>
            <td>' . $item->getText() . '</td>
            <td>' . $item->getAuthor() . '</td>
            <td>' . $item->getDate() . '</td>
        </tr>';
    }
    ?>
    </tbody>
</table>

<h3>Трудозатраты:</h3>
<?php foreach ($costs as $item) {
    echo '<p>Кол-во часов: '. $item->getCost() .'</p>
            <p>Описание: '. $item->getText() .'</p><br/>';
}

