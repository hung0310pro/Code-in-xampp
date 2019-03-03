 function chonuser(){
  var _token = $("input[name='_token']").val();
     var url = "{!! url('/aucation/chonuser') !!}";
     var user = $("#user").val();
         $.ajax({
            url: url,
            method: 'POST',
            data: {
                user: user,
                 _token:_token,
            },
            success: function(data) {
               $('#email1').empty();
                $.each(JSON.parse(data), function (key, value) {
                    $('#email1').append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.email));

                     $("#email2").val(value.email);
                });
                $('#email1').trigger("chosen:updated");
            }

        });
}

function vebang(){
  $("#show").append('<input type="text">');
}

function themajax(){
  var _token = $("input[name='_token']").val();
  var fullnameajax = $("#fullnameajax").val();
  var emailajax = $("#emailajax").val();
  var password = $("#password").val();
  var re_password = $("#re_password").val();
  var url = "{{ url('/aucation/themdulieumoi') }}";
         $.ajax({
            url: url,
            method: 'POST',
            data: {
                fullnameajax: fullnameajax,
                emailajax: emailajax,
                password: password,
                re_password: re_password,
                 _token:_token,
            },
            success: function(data) {
              if(data == 1){
              makeSAlertright("Thêm thành công", 5000);
              window.setTimeout(function(){location.reload()},1000);
            }
            }

        });
}

