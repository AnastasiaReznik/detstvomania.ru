<?php
//debug($data);
if (!isset($_SESSION['auth']['id'])) {
    header('Location: http://detstvomania.ru/');
} else
?>
<!-- <div class="text-center"> -->
<form action="" class="person" novalidate>
    <h3 class="text-center">Личная информация</h3>
    <div class=" msg-change" role="alert">
    </div>
    <div class="col-sm-8">
        <label class="col-sm-2 col-form-label" for="name">Имя<span class="text-danger"></span></label>
        <input type="text" class="form-control reset" id="firstName" name="firstName" value="<?= $data[0]['firstName']; ?> " required>
    </div>


    <div class="col-sm-8">
        <label class="col-sm-2 col-form-label" for="name">Фамилия<span class="text-danger"></span></label>
        <input type="text" class="form-control reset" id="lastName" name="lastName" value="<?php if ($data[0]['lastName'] == 'NULL') {
                                                                                                echo $data[0]['lastName'] = '';
                                                                                            } else echo $data[0]['lastName']; ?>">
    </div>


    <div class="col-sm-8">
        <label for="inputEmailReg" class="col-sm-2 col-form-label ">Email</label>
        <input type="text" class="form-control reset" id="inputEmail" name="email" pattern="^([A-Za-z0-9_-]+\.)*[A-Za-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" value="<?= $data[0]['email']; ?>" required>
    </div>


    <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Выберите пол</label>
    <div class="col-sm-8">
        <select class="form-control reset" id="selectSex" name="sex">
            <option><?php if ($data[0]['sex'] == 'NULL') {
                        echo  $data[0]['sex'] = '';
                    } else {
                        echo  $data[0]['sex'];
                    }
                    ?></option>
            <option></option>
            <option>Мужской</option>
            <option>Женский</option>
        </select>
    </div>

    <label for="inputDate" class="col-sm-2 col-form-label">Дата рождения</label>

    <div class="col-sm-8">
        <input type="date" class="form-control reset" id="birthdayUser" name="birthdate" value="<?= $data[0]['birthdate'] ?>">
    </div>
    <div class="col-sm-8 text-center" style="margin-top: 20px;">
        <button type="submit" class="btn btn-success save-person-info ">Сохранить</button>
    </div>
</form>
<!-- </div> -->

<!-- валидация -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('person');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        event.preventDefault();
                        const name = $('#firstName').val();
                        const lastName = $('#lastName').val();
                        const email = $('#inputEmail').val();
                        const sex = $('#selectSex').val();
                        const birthdate = $('#birthdayUser').val();
                        // console.log(name);
                        // console.log(lastName);
                        // console.log(email);
                        // console.log(sex);
                        // console.log(birthdate);
                        // отправить данные в бд - обновить поля в бд у пользователя
                        // вывести что данные сохранены

                        $.ajax({
                            method: "POST",

                            //файл на кот передается инфа
                            url: "/personalInfo/save_change",

                            //инфа, кот передается на php
                            data: {
                                name_change: name,
                                lastName_change: lastName,
                                email_change: email,
                                sex_change: sex,
                                birthdate_change: birthdate,
                            }

                        }).done(function(resp) {
                            if (resp == false) {
                                alert('Error!');
                            } else {
                                const answer = JSON.parse(resp);
                                console.log(answer);
                                if (answer == 'true') {
                                    $('.msg-change').addClass('alert alert-success').text('Данные были успешно обновлены!');
                                } else {
                                    $('.msg-change').addClass('alert alert-danger').text('При обновлении данных произошла ошибка. Повторите позже!');
                                }
                            }
                        })
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<!-- <script>
    $('.save-person-info').on('click', function(e) {
        e.preventDefault();
        const name = $('#firstName').val();
        const lastName = $('#lastName').val();
        const email = $('#inputEmail').val();
        const sex = $('#selectSex').val();
        const birthdate = $('#birthdayUser').val();
        // отправить данные в бд - обновить поля в бд у пользователя
        // вывести что данные сохранены

        $.ajax({
            method: "POST",

            //файл на кот передается инфа
            url: "/personalInfo/save_change",

            //инфа, кот передается на php
            data: {
                name_change: name,
                lastName_change: lastName,
                email_change: email,
                sex_change: sex,
                birthdate_change: birthdate,
            }
            // dataType: "json"
            //показать сообщение на экране перед отправкой информации
            // beforeSend: function(){
            //     alert('start sending');
            // }

        }).done(function(resp) {
            if (resp == false) {
                alert('Error!');
            } else {
                const answer = JSON.parse(resp);
                console.log(answer);

                if (answer) {
                    $('.msg-change').addClass('alert alert-success').text('Данные были успешно обновлены!');
                } else {
                    $('.msg-change').addClass('alert alert-danger').text('При обновлении данных произошла ошибка. Повторите позже!');
                }
                // console.log(products);
            }

        })




    });
</script> -->