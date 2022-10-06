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
          if (response == "kreiran") {
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

$(document).ready(function () {
     $(".edit_data").on("click", function () {
          $("#izmeni-clana-modal").modal("show");
          var edit_id = $(this).attr("id");

          $tr = $(this).closest("tr");

          var data = $tr
               .children("td")
               .map(function () {
                    return $(this).text();
               })
               .get();

          console.log(data);

          $("#edit_id").val(data[0].trim());
          $("#update-name").val(data[1].trim());
          $("#update-surname").val(data[2].trim());
          $("#update-phone").val(data[3].trim());
          $("#update-email").val(data[4].trim());
          $("#update-adress").val(data[5].trim());
     });

     $(".delete_data").on("click", function () {
          $("#brisanje-modal").modal("show");

          $tr = $(this).closest("tr");

          var data = $tr
               .children("td")
               .map(function () {
                    return $(this).text();
               })
               .get();

          console.log(data);

          $("#delete_id").val(data[0].trim());
     });
});
