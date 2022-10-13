$("#formaDodajClana").submit(function () {
     event.preventDefault();
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
     //modal za izmenu clana.... prikazivanje trenutnih vrednsoti
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

     //izbacivanje modala za potvrdu o brisanju clana
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

     // search opcija za pretrazivnaje clanova po imenu i prezimenu
     $("#search_text").keyup(function () {
          var input = $(this).val();
          $.ajax({
               url: "handler/search.php",
               method: "POST",
               data: { query: input },
               success: function (response) {
                    $("#table_id").html(response);
               },
          });

          if (input == "") {
               location.reload(true);
          }
     });

     ///////////////////////////////////////////////////////////////////
     //za ukucano ime se izabcuje isto ime ipod Welcome na pocetnoj strani
     $("#ime-input").on("keyup", function () {
          $("#paragraf-ime").text($("#ime-input").val());
     });

     ////////////////////////////////////////////////////////////////////

     //modal za izmenu polaganja.... prikazivanje trenutnih vrednsoti
     $(".edit_polaganje").on("click", function () {
          $("#izmeni-polaganje-modal").modal("show");
          var edit_id_p = $(this).attr("id");

          $tr = $(this).closest("tr");

          var data = $tr
               .children("td")
               .map(function () {
                    return $(this).text();
               })
               .get();

          console.log(data);

          $("#edit_id_p").val(data[0].trim());
          $("#update-nivo").val(data[1].trim());
          $("#update-datum").val(data[2].trim());
          $("#update-za-nivo").val(data[3].trim());
          $("#update-polozio").val(data[4].trim());
          $("#update-id-clana").val(data[5].trim());
     });
});

$("#formaDodajPolaganje").submit(function () {
     event.preventDefault();
     const $form = $(this);
     const $inputs = $form.find("input, select, button, textarea");
     const serijalizacija = $form.serialize();
     console.log(serijalizacija);

     request = $.ajax({
          url: "handler/createPolaganje.php",
          type: "post",
          data: serijalizacija,
     });

     request.done(function (response, textStatus, jqXHR) {
          if (response == "dodato") {
               alert("Polaganje je uspesno dodato");
               console.log("Uspesno dodato polaganje");
               location.reload(true);
          } else {
               console.log("Polaganje nije dodato " + response);
          }
          console.log(response);
     });

     request.fail(function (jqXHR, textStatus, errorThrown) {
          console.error("Sledeca greska se desila: " + textStatus, errorThrown);
     });
});
