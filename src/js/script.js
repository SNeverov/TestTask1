$(document).ready(function() {

    //Modal
    $('.modal__close').on('click', function() {
        $('.overlay, #thanks').fadeOut('slow');
    });

    //Phone mask
    $('input[name=phone]').mask("+7 (999) 999-99-99");

    //Validate + Send Message
    $("form").each(function () {
        $(this).validate({
          rules: {
            name: {
              required: true,
              minlength: 2
            },
            phone: "required",
            city: "required",
            sum: "required",
            time: "required",
            kind: "required",
            object: "required",
            send: "required"
          },
          messages: {
            name: {
                required: "Пожалуйста, введите своё имя",
                minlength: jQuery.validator.format("Введите не менее {0}-х символов")
            },
            phone: "Пожалуйста, введите свой номер телефона",
            city: "Пожалуйста, выберите ваш город из списка",
            sum: "Пожалуйста, выберите один из вариантов",
            time: "Пожалуйста, выберите один из вариантов",
            kind: "Пожалуйста, выберите один из вариантов",
            object: "Пожалуйста, выберите один из вариантов",
            send: "Пожалуйста, выберите один из вариантов"
        },
          submitHandler: function (form) {
            $.ajax({
              type: "POST",
              url: $(form).attr('action'),
              data: $(form).serialize()
            }).done(function () {
              $(form).find("input, select, radio").val("");
              $('.overlay, #thanks').fadeIn('slow');
              $(form).trigger('reset');
            });
            return false;
          }
        });
      });

});