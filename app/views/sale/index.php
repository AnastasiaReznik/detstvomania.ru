<? //debug($data); ?>
<?php
$file = "C:/webCourse/OpenServer/domains/detstvomania.ru/app/views/catalogue/products_modal_inc.php";
if (file_exists($file)) {
    include $file;
} else {
    echo '<img src="/public/images/errors/404.jpg">';
}
?>
<link rel="stylesheet" href="/public/styles/banner.css">
<style>
    .sort {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <h1 class="">Распродажа</h1>
            </div>
        </div>
    </div>
</div>

<!-- <ul class="list-group list-group-horizontal sort ">
    <li class="list-group-item border border-secondary"><a href="" class="asc sortby"> По возрастанию цены </a> </li>
    <li class="list-group-item border border-secondary"> <a href="" class="desc sortby"> По убыванию цены </a> </li>
</ul> -->

<div class="row row-cols-1 row-cols-md-4 srt">
    <?php foreach ($data as $index => $product) : ?>
        <div class="bg-light col mb-4 " style="width: 18rem; ">
            <div class="card h-100 border border-danger rounded shadow-sm p-3 mb-5 bg-white ">
                <div class="position-relative  rounded-circle border border-danger text-center bg-danger" style="width: 55px; height: 55px; margin: 8px">
                    <span style="vertical-align: middle; font-size: 17px; top:20%; left:12%; color:cornsilk;" class="position-absolute text-center font-weight-bold"> <?= '-' . $product['discount'] . ' %'; ?> </span>
                </div>
                <img src="<?= $product['image'] ?>" class="card-img-top bg-light" alt="..." style="height: 340px">
                <div class="card-body ">
                    <h5 class="card-title" style="height: 50px;"><?= $product['name'] ?> </h5>
                    <p class="card-text" style="margin-bottom: 15px; height: 50px">
                        <span style='text-decoration: line-through; text-decoration-color: grey; margin-right: 10px;'><?= $product['price'] . ' Р'; ?> </span>
                        <?php echo ($product['price'] - (($product['price'] * $product['discount']) / 100)) . ' Р ' ?>
                    </p>
                    <a href="" data-toggle="modal" data-target="#exampleModal" class="showProduct btn btn-warning" data-index=<?= $product['id']; ?>>
                        Смотреть
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script src="/public/script/modal_ajax.js"></script>