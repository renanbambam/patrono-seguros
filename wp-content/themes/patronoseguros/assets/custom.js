$(function () {
  $(".owl-carousel").owlCarousel({
    // items: 5,
    nav: true,
    dots: false,
    // margin: 10,
    loop: false,
    responsiveClass: true,
    autoplay: true,
    responsive: {
      0: {
        items: 2,
      },
      768: {
        items: 4,
      },
    },
  });
});

$(document).ready(function () {
  $("#menu-item-13").click(function () {
    $("html, body").animate(
      {
        scrollTop: $("#about").offset().top - 70,
      },
      "fast"
    );
  });
});

$(".submenu > button").click(function () {
  let submenu = $(this).next();

  submenu.removeClass("closed");
  submenu.fadeIn();
});

$(".submenu .submenu--close").click(function () {
  let submenu = $(this).closest(".submenu").find(".header__mobile");

  submenu.addClass("closed");
  submenu.fadeOut();
});

$(function () {
  if (document.getElementsByClassName("wpcf7-not-valid-tip").length) {
    var teste = $(".wpcf7-form-control-wrap");

    for (let span of teste) {
      let title = $(span).parent().contents()[0];
      let divFormBox = $(span).closest(".form-box__item");
      let html = `<div class="title-forms-item">${title.data}</div>${span.outerHTML}`;

      if ($(span.firstChild).hasClass("wpcf7-not-valid")) {
        divFormBox.addClass("form-box-invalid");
        divFormBox.children().addClass("p-0");
      } else {
        divFormBox.removeClass("form-box-invalid");
        divFormBox.children().removeClass("p-0").removeAttr("class");
      }

      $(span).parent()[0].setHTML(html);
    }

    if ($(".wpcf7-response-output")[0].innerText.length > 0) {
      let errorMessage = document.getElementsByClassName(
        "wpcf7-response-output"
      )[0];
      let errorHtml = `<div class="wpcf7-response-output wpcf7-response-output--error" style="box-shadow: 0px 0px 12px 3px rgb(0 0 0 / 10%)" aria-hidden="true">
        <h3 class="wpcf7-response-output--error__title"> OPS!!! ALGO DEU ERRADO </h3>
        <p class="wpcf7-response-output--error__text">${errorMessage.outerText}</p>
      </div>`;

      errorMessage.setHTML(errorHtml);

      setTimeout(() => {
        errorMessage.remove();
      }, 5000);
    }
  } else if ($(".wpcf7-response-output")[0].innerText.length > 0) {
    let successMessage = document.getElementsByClassName(
      "wpcf7-response-output"
    )[0];
    let successHtml = `<div class="wpcf7-response-output wpcf7-response-output--success" style="box-shadow: 0px 0px 12px 3px rgb(0 0 0 / 10%)" aria-hidden="true">
      <h3 class="wpcf7-response-output--success__title"> FORMULARIO ENVIADO COM SUCESSO! </h3>
      <p class="wpcf7-response-output--success__text">${successMessage.outerText}</p>
    </div>`;

    successMessage.setHTML(successHtml);
    setTimeout(() => {
      successMessage.remove();
    }, 5000);
  }

  $(".wpcf7-tel").on("keyup", function (e) {
    handlePhone(e);
  });

  const handlePhone = (event) => {
    let input = event.target;
    input.value = phoneMask(input.value);
  };

  const phoneMask = (value) => {
    if (!value) return "";
    value = value.replace(/\D/g, "");
    value = value.replace(/(\d{2})(\d)/, "($1) $2");
    value = value.replace(/(\d)(\d{4})$/, "$1-$2");
    return value;
  };

  $(".cpf").on("keyup", formatarCPF);

  function formatarCPF(e) {
    var v = e.target.value.replace(/\D/g, "");
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    e.target.value = v;
    return v;
  }

  $(".cnpj").on("keyup", formatarCNPJ);

  function formatarCNPJ(e) {
    var v = e.target.value.replace(/\D/g, "");
    v = v.replace(/^(\d{2})(\d)/, "$1.$2");
    v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
    v = v.replace(/\.(\d{3})(\d)/, ".$1/$2");
    v = v.replace(/(\d{4})(\d)/, "$1-$2");
    e.target.value = v;
  }

  $(".cep").on("keyup", formatarCep);

  function formatarCep(e){
    var v= e.target.value.replace(/\D/g,"")                
    v=v.replace(/^(\d{5})(\d)/,"$1-$2") 
    e.target.value = v;
  }

  $(".currency").on("keyup", formatarMoeda);

  function formatarMoeda(e) {
    var v = e.target.value.replace(/\D/g,"");    
    v = (v/100).toFixed(2) + "";   
    v = v.replace(".", ",");    
    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");    
    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");    
    e.target.value = v;    
    }

    $(".data").on("keyup", formatarData);

    function formatarData(e){
      var v=e.target.value.replace(/\D/g,"");
      v=v.replace(/(\d{2})(\d)/,"$1/$2")    
      v=v.replace(/(\d{2})(\d)/,"$1/$2")     
      e.target.value = v;     
      }
});
