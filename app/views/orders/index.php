<?php //debug($data); ?>
<h1>Мои заказы</h1>
<?php if ($data == []) : ?>
    <p>У вас еще не было совершенно заказов...</з>
    <?php else : ?>
        <?php foreach ($data as $key => $order) : ?>
            <div class="card bg-light mb-3 border-secondary">
                <div class="card-header">Дата заказа: <?= $order[0][0]['date']; ?></div>
                <?php foreach ($order as $index => $product) : ?>
                    <div class="card-body text-dark">
                        <h5 class="card-title"><?= $product[0]['name']; ?></h5>
                        <p class="card-text">Количество:<?= $product[0]['count']; ?></p>
                        <p class="card-text"></p> Стоимость заказа: <?= $product[0]['price']; ?> P</p>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
    <?php endforeach; ?>
<?php endif ?>