$('#modal-reg').submit(function (e) {
    // alert('YOU fine!!!');
    e.preventDefault();
    const emailUser = $('#inputEmailReg').val();
    $.ajax({
    method: "POST",
    // url: "/app/core/Controller.php", //ХЕР ЗНАЕТ КАКОЙ ТУТ УРЛ
    data: {
         email_user: emailUser,

        }
    })
  .done(function( msg ) {
    alert( "Data Saved: " + msg );
  });
})


