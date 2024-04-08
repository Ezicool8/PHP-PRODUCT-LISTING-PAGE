$(function () {
    $("#productType").change(function () {
    // Furniture
    if ($(this).val() == "Furniture") {
        $("#furniture").show();
    } else {
        $("#furniture").hide();
    }
    
    //Disk
    if ($(this).val() == "Disk") {
        $("#disk").show();
    } else {
        $("#disk").hide();
    } 
    //Book
    if ($(this).val() == "Book") {
        $("#book").show();
    } else {
        $("#book").hide();
    } 
  });
  });