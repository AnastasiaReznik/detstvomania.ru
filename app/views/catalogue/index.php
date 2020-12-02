<!-- <style>
    .banner {
        background-image: url('http://xn--80adferwifzjb6n.xn--p1ai/wp-content/uploads/2018/11/bg.png');
    }

    .banner {
        text-align: center;
        background-size: cover;
        width: 100%;
        height: 200px;
        /* background: #e2214b; */
        /* vertical-align: middle; */
    }

    .banner h1 {
        /* width: 500px;
        height: 200px; */
        vertical-align: middle;
        /* font-size: 36px; */
        margin: 0 auto;
        /* border: 1px solid red; */
    }

    .container {
        vertical-align: middle;
        margin-top: 0px;
        margin-bottom: 50px;
    }

    .banner h1 {
        margin-top: 60px;
        font-size: 50px;

    }
</style> -->
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
<div class="row row-cols-1 row-cols-md-5 list-categories" style="margin: 25px;">
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

<!-- <script>
    //переход по категориям и отображение товаров по категориям - передача id категории товара
    $('.list-categories').on('click', 'a.list-categories-select', function(e) {
        e.preventDefault();
        const catalogue_id = ($(this).find('#catalogue_id').text());
        const path = ($(this).data('path'));
        console.log(catalogue_id);
        console.log(path);
        location.replace(`catalogue/${path}?cat_id=${catalogue_id}`);
    })
</script> -->