    //нажать посмотреть товар
    $('.tovar').on('click','.showProduct', function() {
        // $('.alert-msg').removeAttr('hidden');
        const productId = $(this).data('index');
        console.log(productId);

        $.ajax({
            method: "POST",

            //файл на кот передается инфа
            url: "/catalogue/show_info_product",

            //инфа, кот передается на php
            data: {
                product_id: productId,

            }

        }).done(function(resp) {
            if (resp == false) {
                alert('Error!');
            } else {
                const products = JSON.parse(resp);
                // console.log(productId);
                console.log(products);
                // console.log(products['id_product']);
                $('.modal-name-product').text(products[0]['name']);
                $('.modal-image-product').attr('src', products[0]['image']);
                $('.modal-description-product').text(products[0]['description']);
                // $('.modal-description-product').text(products['id_product']);
                $('.modal-id-product').text(products[0]['id']);
                var newPrice = (products[0]['price'] - ((products[0]['price'] * products[0]['discount']) / 100));

                var oldPrice = (products[0]['price']);

                console.log(oldPrice);
                console.log(newPrice);
                if (newPrice != oldPrice) {
                    $('.modal-old-price-product').text(oldPrice);
                    $('.modal-new-price-product').text(newPrice);
                    $('.modal-sale').text('SALE!');

                } else {
                    $('.modal-old-price-product').text('');
                    $('.modal-new-price-product').text(oldPrice);
                    $('.modal-sale').text('');
                }
                // console.log(products);
            }

        })
    });


    