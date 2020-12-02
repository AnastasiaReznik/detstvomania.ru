<?php
$file = "C:/webCourse/OpenServer/domains/detstvomania.ru/app/views/catalogue/products_modal_inc.php";
if (file_exists($file)) {
  include $file;
} else {
  echo '<img src="/public/images/errors/404.jpg">';
}
// debug($add_info)
?>
<style>
  .title {
    background-image: url('//xn--80adferwifzjb6n.xn--p1ai/wp-content/uploads/slider2/shutterstock_768644317.png');
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 500px;
    background-position: 50% 50%;
    margin-bottom: 50px;
    /* z-index: 5; */
    /* position: absolute; */
    /* top: 0;
    right: 0; */
  }

  .title h1 {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 52px;
    font-weight: bold;

  }

  .title p {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
    font-size: 32px;
    color: #646464;
  }

  .title a  {
    font-size: 22px;
    /* color: #646464; */
  }

  .info {
    /* margin-top: 100px;
    margin-bottom: 100px; */
    /* margin-top: 50px; */
    /* padding-top: 50px; */
    /* margin: 0 auto; */
    margin-left: 100px;
    padding-top: 10%;
    vertical-align: middle;
    /* border: 1px solid red; */
  }
</style>

<div class="title">
  <div class="info">
    <h1>ДЕТСТВОМАНИЯ</h1>
    <p>
      Огромный ассортимент игрушек для детей
    </p>
    <a href="/catalogue" class="btn btn-warning rounded-pill">Каталог</a>
  </div>
  <!-- <img src="//xn--80adferwifzjb6n.xn--p1ai/wp-content/uploads/slider2/shutterstock_768644317.png" class="img "> -->
</div>


<a href="/sale" style="width: 100px; font-size: 26px; font-weight: bold" >
  Все товары распродажи...
</a>



<div class="row row-cols-1 row-cols-md-5 ">
  <?php foreach ($add_info as $index => $product) : ?>
    <?php if ($index <= 4) : ?>
      <div class="bg-light col mb-4" style="width: 18rem; ">
        <div class="card h-100">
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
            <a href="" data-toggle="modal" data-target="#exampleModal" class="showProduct" data-index=<?= $product['id']; ?>>
              Смотреть
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<script src="/public/script/modal_ajax.js"></script>