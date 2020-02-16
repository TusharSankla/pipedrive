$(document).ready(function() {
    $("#submit").click(function() {
      var token = $("#token").val();
      console.log(token)
      $("#returnmessage").empty(); // To empty previous error/success message.
      // Checking for blank fields.
      if (token == "") {
        alert("Please Fill Required Fields");
      } else {
        // Returns successful data submission message when the entered information is stored in database.
        $.post(
          "contact_form.php",
          {
            token1: token
          },
          function(data) {
            $("#returnmessage").append(data); // Append returned message to message paragraph.
            if (
              data == "Your Query has been received, We will contact you soon."
            ) {
              $("#form")[0].reset(); // To reset form fields on success.
            }
          }
        );
      }
    });
  });
