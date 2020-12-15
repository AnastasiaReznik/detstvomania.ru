<?php
$file = "app/views/catalogue/products_modal_inc.php";
if (file_exists($file)) {
    include $file;
} else {
    echo '<img src="/public/images/errors/404error.webp">';
}
// debug($data);
// debug($_SESSION['cat_id']);
?>
<link rel="stylesheet" href="/public/styles/banner.css">
<!-- <link rel="stylesheet" href="/public/styles/default.css"> -->

<style>
    .card-img-top {
        height: 270px;
    }

    .card-title {
        height: 50px;
        /* margin-bottom: 10px; */
        /* border: 1px solid red; */
    }

    .card-text {
        height: 25px;
        /* border: 1px solid red; */
        margin-bottom: 25px;
    }

    .sort {
        margin: 10px;
        margin-left: 20px;
    }

    .tovar {
        margin-left: 10px;
        margin-bottom: 10px;

    }

    .car {
        margin-bottom: 15px;
    }
    
</style>
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <h1 class=""><?php echo $data['nameCat'] ?></h1>
            </div>
        </div>
    </div>
</div>

<ul class="list-group list-group-horizontal sort ">
    <li class="list-group-item border border-secondary"><a href="" class="asc sortby"> По возрастанию цены </a> </li>
    <li class="list-group-item border border-secondary"> <a href="" class="desc sortby"> По убыванию цены </a> </li>
</ul>

<div class="row row-cols-2 row-cols-md-3  row-cols-sm-2 row-cols-lg-3  row-cols-xl-4 tovar">
    <?php foreach ($data as $ind => $infoProduct) : ?>
        <?php if (is_int($ind)) : ?>
            <div class="col col-xl-3 col-md-4 row-cols-sm-1 col-7 car">
                <div class="card h-100 border border-secondary">
                    <a href="" data-toggle="modal" data-target="#exampleModal" class="showProduct" data-index=<?= $infoProduct['id']; ?>>
                        <img src="<?= $infoProduct['image']; ?>" class="card-img-top" alt="...">
                        <h5 class="card-title"><?= $infoProduct['name']; ?></h5>
                        <div class="card-body">

                            <p class="card-text">
                                <?php $newPrice = $infoProduct['price'] - (($infoProduct['price'] * $infoProduct['discount']) / 100);
                                $oldPrce = $infoProduct['price'];
                                if ($newPrice == $oldPrce) : ?>
                                    <span class="new-price-product price-product"><?= $infoProduct['price']; ?></span> P
                                <?php else :  ?>
                                    <span class="new-price-product price-product"><?= $newPrice; ?></span> P
                                    <span class="old-price-product" style="text-decoration: line-through; text-decoration-color: grey">
                                        <?php echo $infoProduct['price']; ?> Р</span>
                                    <span class="sale text-danger">SALE!</span>
                                <?php endif ?>
                            </p>
                            <!-- <div>
                            <div class="card-footer">
                                Card footer
                            </div>
                        </div> -->
                            <p class="btn btn-warning  open-modal ">В корзину
                                <svg style=" width: 30px; height: 30px" viewBox="0 0 16 16" class="bi bi-cart-check " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </p>
                        </div>

                    </a>
                    <!-- <div class="card-body"> -->

                    <!-- <a href="" class="btn btn-warning into-basket">В корзину
                                <svg style=" width: 30px; height: 30px" viewBox="0 0 16 16" class="bi bi-cart-check " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </a> -->
                    <!-- </div> -->
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>





<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<button type="button" class="show" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button> -->

<script src="/public/script/modal_ajax.js">
</script>
<script>
    let typeSort = '';
    $('.sort').on('click', '.sortby', function(e) {
        e.preventDefault();
        if ($(this).hasClass('asc')) {
            typeSort = 'asc';
            console.log(typeSort);
        } else {
            typeSort = 'desc';
            console.log(typeSort);

        }

        $.ajax({
            method: "POST",

            //файл на кот передается инфа
            url: "/catalogue/sort",

            //инфа, кот передается на php
            data: {
                typeSort: typeSort,
                // product_id: idProduct,

            }
            // dataType: "json"
            //показать сообщение на экране перед отправкой информации
            // beforeSend: function(){
            //     alert('start sending');
            // }

        }).done(function(resp) {
            if (resp == false) {
                alert('Ошибка.Повторите позже!');
            } else {
                // const newPrice = JSON.parse(resp);
                console.log(resp);
                $('.tovar').html(resp);
                // $(id).prev().text(newPrice);

                // console.log(products);
            }


        })
    })
</script>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal-cart" data-target="#exampleModal">
    Launch demo modal
</button> -->