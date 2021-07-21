
$(document).ready(function () {
    console.log('bdjfid');
  $("form").submit(function (event) {
    var formData = {
      from: $("#from").val(),
      to: $("#to").val(),
      amount: $("#amount").val(),
    };

    $.ajax({
      type: "POST",
      url: "valid.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
        if(data.succes==true){
        alert("Transaction sucessfull");
        $("#button").attr('disabled', true);
        $("#to").attr('disabled', true);
        $("#amount").attr('disabled', true);
        
        }else{
            alert("Insufficient Funds");
        }
     
    });

    event.preventDefault();
  });
});