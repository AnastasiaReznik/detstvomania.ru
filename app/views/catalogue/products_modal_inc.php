<!-- Modal окно- просмотра товара-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title modal-name-product" id="exampleModalLabel"> </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class=" alert-msg" role="alert">

            </div>
            <div class="modal-body d-flex">
                <img src="" alt="" class='modal-image-product' style="width: 300px;"></>
                <div>
                    <h4>Цена:
                        <span class="modal-new-price-product"></span> P
                        <span class="modal-old-price-product " style="text-decoration: line-through; text-decoration-color: grey"></span>
                        <span class="modal-sale text-danger"></span>
                    </h4>
                    <div>
                        <span>Количество:</span>
                        <input type="number" min="1" class="countInput">

                    </div>

                    <hr>
                    <h4 style="height: 50px"> Описание:</h4>
                    <span class="modal-description-product"></span>
                    <span class="modal-id-product" hidden></span>
                    <!-- <input class="id-product"></input> -->
                </div>

            </div>
            <div class="modal-footer">
                <!-- <span class="modal-id-product" hidden></span> -->
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-warning into-basket">
                    Добавить
                    <svg style="width: 30px; height: 30px" viewBox="0 0 16 16" class="bi bi-cart-check " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    </svg>

                </button>
            </div>
        </div>
    </div>
</div>


<!-- нажали добавить в корзину в модальном окне -->
<script>
    $('.close').on('click', function() {
        $('.alert-msg').removeClass('alert alert-success').empty();
    });

    $('.into-basket').on('click', function() {
        // $('.alert-msg').hide();
        <?php if (!isset($_SESSION['auth'])) : ?>
            // console.log($(this));
            // console.log('no auth');
            alert('Для добавления в корзину необходимо авторизоваться!')
        <?php else : ?>
            let productId = $(this).closest('.modal-content').find('.modal-id-product').text();
            console.log(productId);
            let price = $(this).closest('.modal-content').find('.modal-body').find('.modal-new-price-product').text();
            let count = $(this).closest('.modal-content').find('.modal-body').find('.countInput').val();
            let image = $(this).closest('.modal-content').find('.modal-body').find('.modal-image-product').attr('src');

            // let count = $(this).closest('.modal-content').find('.modal-body').find('.countInput').val();
            if (count == '') {
                count = 1;
            }
            console.log(image);
            //добавление в корзину
            $.ajax({
                method: "POST",

                //файл на кот передается инфа
                url: "/cart/add_to_cart",

                //инфа, кот передается на php
                data: {
                    product_id: productId,
                    count: count,
                    price: price,
                    image: image
                }

            }).done(function(resp) {
                const resCart = JSON.parse(resp);
                console.log(resCart);
                if (resCart['res'] == 'false') {
                    $('.alert-msg').addClass('alert alert-danger').append('Произошла ошибка при добавлении товара. Попробуйте позже!');
                    // alert('Произошла ошибка при добавлении товара. Попробуйте позже!');
                } else {
                    $('.alert-msg').addClass('alert alert-success').append('Товар добавлен в корзину!');
                }
            });

        <?php endif; ?>
    })
</script>

<!-- модальное окно для сообщения - что товар добавлен в корзину -->
<!-- <div class="modal modal-cart" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

<!-- <script>
    $('.into-basket').on('click', function () {
    console.log($(this));
    })

</script> -->