<link rel="stylesheet" href="/public/styles/banner.css">
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <h1 class="">Каталог</h1>
            </div>
        </div>
    </div>
</div>
<div class="row row-cols-1 row-cols-xl-5  row-cols-lg-3 row-cols-md-2  row-cols-sm-2 list-categories" style="margin: 25px;">
    <?php foreach ($data as $product) : ?>
        <div class="col mb-4" style="height: 220px;  ">
            <div class="card h-100" style="box-shadow: 0 0 4px">
                <a href="" class="list-categories-select" data-path="<?= $product['path']; ?>">
                    <img src="<?= $product['image']; ?>" style="width: 40px;padding-top: 10px" class="card-img-top mx-auto d-block rounded" alt="...">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name']; ?></h5>
                        <span>(Кол-во товаров:<?php echo $product['count'][0]['total_count']; ?>)</span>
                        <span id="catalogue_id" hidden><?= $product['id']; ?></span>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
