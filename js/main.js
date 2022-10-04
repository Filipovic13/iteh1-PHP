$("#formaDodajClana").submit(function () {
     event.preventDefault();
     console.log("Dodaj je pokrenuto");
     const $form = $(this);
     const $inputs = $form.find("input, select, button, textarea");
     const serijalizacija = $form.serialize();
     console.log(serijalizacija);

     request = $.ajax({
          url: "handler/createClan.php",
          type: "post",
          data: serijalizacija,
     });

     request.done(function (response, textStatus, jqXHR) {
          if (response == "uspelo") {
               alert("Clan je uspesno dodat");
               console.log("Uspesno dodat clan");
               location.reload(true);
          } else {
               console.log("Caln nije dodat " + response);
          }
          console.log(response);
     });

     request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error("Sledeca greska se desila: " + textStatus, errorThrown);
     });
});
