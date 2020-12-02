<?php
// debug($add_info);
// debug($_SERVER['REQUEST_URI']);
// var_dump($this->$controller);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
  <title>Главная</title>
  <style>
    /* div.menu-top { */
    /* border: 1px solid red; */
    /* width: 90%; */
    /* align-items: center; */
    /* } */
    .nav a,
    body,
    a {
      color: blueviolet;

    }
ul li a {
  font-size: 18px;
}
    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      border: 1px solid grey;
    }

    .sub-menu {
      opacity: 0;
      visibility: hidden;
      /* transform: scaleY(0); */
      position: absolute;
      /* z-index: 999; */
      top: 100%;
      left: auto;
      width: 600px;
      transition: all 0.5s 0s;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
      list-style: none;
      padding: 0;
      margin: 0;
      background-color: white;
    }

    ul.nav li.catalogue:hover .sub-menu {
      opacity: 1;
      visibility: visible;
      /* transform: scaleY(1); */
      z-index: 999;
    }

    form {
      margin: 15px;
    }

    button.close {
      top: 20%;
      right: 3%;
    }

    .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100%;
    }

    /* .content {
      flex: 1 0 auto;
    } */

    .footer {
      flex: 0 0 auto;
      background-color: #A14882;
      color: white;
    }

    .footer-contact ul {
      list-style: none;
      padding-left: 0;
    }
    .footer-contact p {
    font-weight: bold;
    margin-top: 10px;
    font-size: 22px;
    }
  </style>
</head>

<body>
  <ul class="nav navbar-light justify-content-around align-items-center " style="background-color: #eeee;">
    <li class="nav-item">
      <a class="navbar-brand" href="/">
        <img src="/public/images/layout/logo.png" alt="" height="70px" alt="" loading="lazy">
      </a>
    </li>
    <li class="nav-item catalogue position-relative" style="height: 100%;">
      <a class="nav-link" href="/catalogue">Каталог</a>
      <!-- <ul class='sub-menu text-decoration-none d-flex flex-wrap list-categories'>
        <?php //foreach //($data as $product) : 
        ?>
          <li>
            <div class="card" style="width: 300px;">
              <a href="" class="list-categories-select" data-path="<?= $product['path']; ?>">
                <img style="width: 40px;padding-top: 10px" class="mx-auto d-block rounded" src=" <?= $product['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <p class="card-text">  //$product['name']; </p>
                  <span id="catalogue_id" hidden> //$product['id']; </span>
                </div>
              </a>
            </div>
          </li>
        <?php //endforeach; 
        ?>
      </ul> -->
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/sale">Распродажа</a>
    </li>
    <?php if (!isset($_SESSION['auth'])) : ?>
      <li class="nav-item">
        <a class="nav-link" href=" #" data-toggle="modal" data-target="#modal-enter">
          Войти
          <svg style="width: 25px;" height: 1.5em; viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
          </svg>
          <!-- <a href="" style="position: absolute; bottom: 0; right: 0; ">
            <svg style="width: 13px" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z" />
            </svg>
          </a> -->
        </a>
      </li>
    <?php else : ?>
      <li class="nav-item dropdown d-flex">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Личный кабинет
          <svg viewBox="0 0 16 16" style="width: 27px; " class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
          </svg>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/personalInfo">Личные данные</a>
          <a class="dropdown-item" href="/cart">Корзина</a>
          <a class="dropdown-item" href="/orders">Заказы</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?do=exit">Выйти</a>
        </div>
        <a class="nav-link cart-user" href="/cart">
          <svg style="width: 29px; " viewBox="0 0 16 16" class="bi bi-basket3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z" />
          </svg>
          <span style="font-size:18px;" class="count-products-cart"><?php //echo count($data); 
                                                                    ?></span>
        </a>
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    <?php endif; ?>
  </ul>



  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    Launch static backdrop modal
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="modal-enter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> -->
        <ul class="nav nav-tabs position-relative" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Вход</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="reg-tab" data-toggle="tab" href="#reg" role="tab" aria-controls="reg" aria-selected="false">Регистрация</a>
          </li>
          <button type="button" class="close position-absolute" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <!-- форма входа -->
            <form method="POST" id="modal-login" class="validate-form">
              <div class="form-group row">
                <label for="inputEmailEnter" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control " id="inputEmailEnter" name="emailEnter" pattern="^([A-Za-z0-9_-]+\.)*[A-Za-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" required>
                  <div class="invalid-feedback invalid-email-enter">

                  </div>
                  <p class="feedbackEmailEnter text-danger ">

                  </p>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPasswordEnter" class="col-sm-2 col-form-label">Пароль</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPasswordEnter" name="passwordEnter" pattern="^(?=.*[a-z])(?=.*[0-9])(?=.*[^\w\s]).{4,15}" required>
                  <div class="invalid-feedback invalid-password-enter">
                        
                  </div>
                  <p class="feedbackPasswordEnter text-danger ">

                  </p>
                </div>
              </div>

              <button type="submit" class="btn btn-success" style="width: 100%">Войти</button>
            </form>
          </div>
          <div class="tab-pane fade" id="reg" role="tabpanel" aria-labelledby="reg-tab">

            <!-- форма регистрации -->
            <form method="POST" id="modal-reg" class="validate-form" novalidate>
              <!-- <p class='reg-acess-msg bg-success'></p> -->
              <!-- <div class="card" hidden> -->
              <!-- <div class="alert alert-success" role="alert"> -->
              <!-- Это уведомление об успехе — check it out!
                </div> -->
              <div class="alert alert-success reg-acess-msg" hidden>

              </div>
              <!-- </div> -->

              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="nameUser">Имя<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control reset" id="nameUser" placeholder="Jane Doe" name="firstName" required>
                  <div class="invalid-feedback invalidTextName">

                  </div>
                </div>

              </div>

              <div class="form-group row">
                <label for="inputEmailReg" class="col-sm-2 col-form-label ">Email<span class="text-danger">*</span></label>

                <div class="col-sm-8">
                  <input type="text" class="form-control reset" id="inputEmailReg" name="email" pattern="^([A-Za-z0-9_-]+\.)*[A-Za-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" required>
                  <div class="invalid-feedback invalidTextEmail">

                  </div>
                  <p class="feedbackEmail text-danger">

                  </p>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPasswordReg" class="col-sm-2 col-form-label">Пароль<span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control reset " id="inputPasswordReg" name="password" pattern="^(?=.*[a-z])(?=.*[0-9])(?=.*[^\w\s]).{4,15}" aria-describedby="passwordHelpInline" required>
                  <small id="passwordHelpInline" class="text-muted">
                    от 4 до 15 знаков, латинские буквы, цифры и символы
                  </small>
                  <div class="invalid-feedback invalidTextPassword">
                    <!-- Некорректный пароль! -->
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Выберите пол</label>

                <div class="col-sm-8">
                  <select class="form-control reset" id="exampleFormControlSelect1" name="sex">
                    <option></option>
                    <option>Мужской</option>
                    <option>Женский</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputDate" class="col-sm-2 col-form-label">Дата рождения</label>

                <div class="col-sm-8">
                  <input type="date" class="form-control reset" id="inputDate" name="birthdate">
                </div>
              </div>

              <button type="submit" class="btn btn-success" style="width: 100%">Регистрация</button>
            </form>
          </div>
        </div>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

      </div>
    </div>
  </div>






  <?php echo $content; ?>

  <!-- 
  <footer id="footer" class="footer navbar-fixed-bottom">
    <p>Все права защищены</p>
    <p>
      FOOTER
    </p>
  </footer> -->
  <div class="wrapper">

    <!-- <div class="content"></div> -->

    <div class="footer d-flex  justify-content-around">
      <a class="navbar-brand" href="#">
        <img src="/public/images/layout/logowhite.png" alt="">
      </a>
      <div class="footer-contact">
        <p>Контакты:</p>
        <ul>
          <li>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
            </svg>
            +7(915)801-08-04</li>
          <li>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
            </svg>
            +7(960)548-03-18</li>
          <li>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
            </svg>
            +7(980)338-12-24</li>
        </ul>
      </div>
      <div class="footer-contact">
        <p>Наши магазины:</p>
        <ul>
          <li>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            Центральный дом быта, проспект Ленина, 67, 2й этаж.</li>
          <li>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            ул. Костычева, 70.</li>
          <li>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            ул.Пушкина, 28, остановка «Кинотеатр «Салют»</li>
        </ul>
      </div>
    </div>

  </div>


</body>

</html>







<script>
  //переход по категориям и отображение товаров по категориям - передача id категории товара для отображения
  $('.list-categories').on('click', 'a.list-categories-select', function(e) { //нажатие на категрию
    e.preventDefault();
    const catalogue_id = ($(this).find('#catalogue_id').text()); //взять id категории
    const path = ($(this).data('path')); //путь из бд для формирования url
    location.replace(`catalogue/${path}?cat_id=${catalogue_id}`); //переход на страницу по сформированному url
  })
</script>


<!-- Валидация формы регистрации -->
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('validate-form');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();

            //для входа
            $('.invalid-email-enter').empty();
            $('.invalid-password-enter').empty();

            // if () {

            // }
            //для входа 

            const temp = `Поле обязательно для заполнения!`;
            $('.invalidTextEmail').empty();
            $('.invalidTextName').empty();
            $('.invalidTextPassword').empty();
            $('.feedbackEmail').text('');
            if (($('#inputEmailReg').val()) == '') {
              $('.invalidTextEmail').append(temp);
            } else {
              $('.invalidTextEmail').append('Некорректный email!');
            }
            if (($('#nameUser').val() == '')) {
              $('.invalidTextName').append(temp);
            } else {
              $('.invalidTextName').append('Некорректное имя');
            }
            if (($('#inputPasswordReg').val() == '')) {
              $('.invalidTextPassword').append(temp);
            } else {
              $('.invalidTextPassword').append('Некорректный пароль!');
            }
            event.stopPropagation();
          } else { //если форма валидна, то выполняется проверка на email пользователя


            $('.feedbackEmail').text('');
            $('.reg-acess-msg').attr('hidden');
            event.preventDefault();
            $('.invalidTextEmail').empty();
            $('.invalidTextName').empty();
            $('.invalidTextPassword').empty();
            const email = $('#inputEmailReg').val();
            const firstName = $('#nameUser').val();
            const password = $('#inputPasswordReg').val();
            const sex = $('#exampleFormControlSelect1').val();
            const birthdate = $('#inputDate').val();

            const emailEnter = $('#inputEmailEnter').val();
            const passwordEnter = $('#inputPasswordEnter').val();
            if (email) { //если данные в input были заполнены с формы регистрации, то валидация регистрации
              console.log(email);
              $.ajax({
                  method: "POST",
                  url: "/catalogue/ajax_processing_email",
                  data: {
                    email: email,
                    firstName: firstName,
                    password: password,
                    sex: sex,
                    birthdate: birthdate
                  }
                })
                .done(function(msg) {
                  const answer = JSON.parse(msg);
                  console.log(answer);
                  if (answer == 'Пользователь с такой почтой уже зарегистрирован') {
                    $('.feedbackEmail').text(answer);
                  } else if (answer == 'Регистрация прошла успешно') {
                    $('.reg-acess-msg').append(answer + ' .Теперь вы можете зайти на сайт!');
                    $('.reg-acess-msg').removeAttr('hidden');
                    $('#modal-reg')[0].reset();
                  } else if (answer == 'Произошла ошибка при регистрации.') {
                    $('.reg-acess-msg').append(answer);
                    $('.reg-acess-msg').removeAttr('hidden');
                    $('#modal-reg')[0].reset();
                  }
                });



            } else { //если отправка с формы входа
              $('.feedbackPasswordEnter').empty();
              $('.feedbackEmailEnter').empty();
              console.log(emailEnter);
              console.log(passwordEnter);
              $.ajax({
                  method: "POST",
                  url: "/catalogue/auth",
                  data: {
                    email: emailEnter,
                    password: passwordEnter
                  }
                })
                .done(function(msg) {
                  const answer = JSON.parse(msg);
                  console.log(answer);
                  if (answer == 'true') {
                    location.reload();
                  } else if (answer == 'Неправильно введена электронная почта.') {
                    $('.feedbackEmailEnter').append(answer);

                  } else if (answer == 'Неверно указан пароль.') {
                    $('.feedbackPasswordEnter').append(answer);
                  }
                  // if (answer == 'Пользователь с такой почтой уже зарегистрирован') {
                  //   $('.feedbackEmail').text(answer);
                  // } else if (answer == 'Регистрация прошла успешно') {
                  //   $('.reg-acess-msg').append(answer + ' .Теперь вы можете зайти на сайт!');
                  //   $('.card').removeAttr('hidden');
                  //   $('#modal-reg')[0].reset();
                  // } else if (answer == 'Произошла ошибка при регистрации.') {
                  //   $('.reg-acess-msg').append(answer);
                  //   $('.card').removeAttr('hidden');
                  //   $('#modal-reg')[0].reset();
                  // }
                });
            }

          }
          form.classList.add('was-validated');

        }, false);
      });
    }, false);
  })();
</script>