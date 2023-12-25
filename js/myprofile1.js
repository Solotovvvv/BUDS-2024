$(document).ready(function(){
  $("#inputSurname").hide();
  $("#inputFirstname").hide();
  $("#inputMiddlename").hide();
  $("#inputAge").hide();
  $("#inputAddress").hide();
  $("#inputContactnumber").hide();

  $("#btnsave").hide();
  $("#btncancel").hide();

  $("#btnupdate").click(function(){
    $("#btnupdate").hide();
    $("#btnsave").show();
    $("#btncancel").show();

    $("#inputSurname").show();
    $("#inputFirstname").show();
    $("#inputMiddlename").show();
    $("#inputAge").show();
    $("#inputAddress").show();
    $("#inputContactnumber").show();

    $("p.dispname").hide();
    $("p.dispage").hide();
    $("p.dispaddress").hide();
    $("p.dispcontactnumber").hide();
  })

  $("#btnsave").click(function(){
    $("#btnupdate").show();
    $("#btnsave").hide();
    $("#btncancel").hide();

    $("#inputSurname").hide();
    $("#inputFirstname").hide();
    $("#inputMiddlename").hide();
    $("#inputAge").hide();
    $("#inputAddress").hide();
    $("#inputContactnumber").hide();

    $("p.dispname").show();
    $("p.dispage").show();
    $("p.dispaddress").show();
    $("p.dispcontactnumber").show();
  })

  $("#btncancel").click(function(){
    $("#btnupdate").show();
    $("#btnsave").hide();
    $("#btncancel").hide();

    $("#inputSurname").hide();
    $("#inputFirstname").hide();
    $("#inputMiddlename").hide();
    $("#inputAge").hide();
    $("#inputAddress").hide();
    $("#inputContactnumber").hide();

    $("p.dispname").show();
    $("p.dispage").show();
    $("p.dispaddress").show();
    $("p.dispcontactnumber").show();
  });

});

