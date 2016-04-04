<!DOCTYPE html>
<html lang="en">

<?php
/**
 * Created by PhpStorm.
 * User: KC
 * Date: 3/9/2016
 * Time: 7:34 PM
 */


include "includes/header.php";
?>

<body>
    <div id="warning-message">
        <div class="alert alert-danger text-center" role="alert">
            Please rotate device to use. </br> This website is only viewable in landscape mode.
        </div>
    </div>

    <div class="container-fluid" id="wrapper">
        <div class="row"><!--INSIDE SELECTION LIST-->
            <div class="col-sm-3 col-md-3" id="selection_list">
                <form class="form" id="form_update">
                    <button class="btn btn-primary btn-lg">Refresh</button>
                </form>
                <div class="row" id="info1"></div>
            </div>

            <div class="col-sm-9 col-md-9"><!--INSIDE EDITOR INTERFACE-->
                <form class="form">
                    <div class="col-sm-6 col-md-6"><!--LEFT SIDE OF EDITOR INTERFACE-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="GLSeq" class="form-control-label">GLSeq:</label>
                                    <input type="text" class="form-control" id="GLSeq" placeholder="Seq" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="taken_by" class="form-control-label">Taken By:</label>
                                    <input type="text" class="form-control" id="taken_by" placeholder="Taken By">
                                </div>
                            </div>
                        </div>

                        <div class="radio">
                            <label class="radio-inline">
                                <input type="radio" class="bigradio" name="groomOption" id="optionsRadios1" value="bb"> Bath and Brush
                                <input type="number" id="bbPrice" name="bbPrice" size="3" maxlength="3">
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="bigradio" name="groomOption" id="optionsRadios2" value="groom"> Groom
                                <input type="number" id="groomPrice" name="groomPrice" size="3" maxlength="3">
                            </label>
                        </div>
                        <div class="checkbox form-control">
                            <label class="control-label" for="nailfile">
                                <input type="checkbox" id="nailfile" onchange="nailFileSelect();" name="nailfile" value="Nail File: $10.00">Nail File
                            </label>
                            <label class="control-label" for="teethbrush">
                                <input type="checkbox" id="teethbrush" onchange="teethSelect();" name="teethbrush" value="Teeth Brush: $10.00">Teeth
                            </label>
                            <label class="control-label" for="flea">
                                <input type="checkbox" id="flea" onchange="fleaSelect();" name="flea" value="Flea Shampoo: $5.00">Flea Shampoo
                            </label>
                        </div>
                        <div class="checkbox form-control">
                            <label class="control-label" for="dematt">
                                <input type="checkbox" id="dematt" onchange="demattSelect();" name="dematt" value="De-matt: $15.00">De-matt
                            </label>
                            <label class="control-label" for="deskunk">
                                <input type="checkbox" id="deskunk" onchange="deskunkSelect();" name="deskunk" value="Deskunk: $30.00">Deskunk
                            </label>
                        </div>
                        <div class="dropdown">
                            <select name="shampoo" onchange="shampooSelect();" class="form-control" id="shampooselect">
                                <option  class="shampoo" value=" ">Nootie Shampoo</option>
                                <option  class="shampoo" value="Shampoo: $5.00 Oatmeal">Oatmeal</option>
                                <option  class="shampoo" value="Shampoo: $5.00 Hypo">Hypo</option>
                                <option  class="shampoo" value="Shampoo: $5.00 Tar N Sulfur">Tar and Sulfur</option>
                                <option  class="shampoo" value="Shampoo: $5.00 Whitening">Whitening</option>
                            </select>
                        </div>
                        <div class="dropdown">
                            <select name="deshed" onchange="deshedSelect();" class="form-control" id="deshedselect">
                                <option  class="deshed" value=" ">Deshed: None</option>
                                <option  class="deshed" value="Deshed: $16.00">Deshed: $16.00</option>
                                <option  class="deshed" value="Deshed: $19.00">Deshed: $19.00</option>
                                <option  class="deshed" value="Deshed: $22.00">Deshed: $22.00</option>
                                <option  class="deshed" value="Deshed: $25.00">Deshed: $25.00</option>
                                <option  class="deshed" value="Deshed: $30.00">Deshed: $30.00</option>
                            </select>
                        </div>
                        <div class="dropdown">
                            <select name="fleadip" onchange="fleaDipSelect();" class="form-control" id="fleaselect">
                                <option  class="flea" value=" ">FleaDip: None</option>
                                <option  class="flea" value="FleaDip: $16.00">FleaDip: $16.00</option>
                                <option  class="flea" value="FleaDip: $19.00">FleaDip: $19.00</option>
                                <option  class="flea" value="FleaDip: $22.00">FleaDip: $22.00</option>
                                <option  class="flea" value="FleaDip: $25.00">FleaDip: $25.00</option>
                                <option  class="flea" value="FleaDip: $30.00">FleaDip: $30.00</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtarea" class="sr-only">Text Area:</label>
                            <textarea class="form-control" rows="9" id="txtarea" name="txtarea1"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6"><!--RIGHT SIDE OF EDITOR INTERFACE-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dog_name" class="form-control-label">Dog:</label>
                                    <input type="text" class="form-control" id="dog_name" placeholder="Dog Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dog_breed" class="form-control-label">Breed:</label>
                                    <input type="text" readonly="" class="form-control" id="dog_breed" placeholder="Breed">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-control-label">First Name:</label>
                                    <input type="text" class="form-control" id="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-control-label">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">

                                    <label class="sr-only" for="address">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label class="sr-only" for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="City">
                                </div>
                                <div class="col-sm-3">
                                    <label class="sr-only" for="state">State</label>
                                    <input type="text" class="form-control" value="TX" id="state">
                                </div>
                                <div class="col-sm-4">
                                    <label class="sr-only" for="zip">Zip</label>
                                    <input type="text" class="form-control" id="zip" placeholder="Zip">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="phone1" class="sr-only">Phone Number 1:</label>
                                    <input type="text" name="phone1" placeholder="phone number" required="TRUE" class="form-control phoneNum" id="phone1">
                                    <label for="phone2" class="sr-only">Phone Number 2:</label>
                                    <input type="text" name="phone2" placeholder="phone number" class="form-control phoneNum" id="phone2">
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone3" class="sr-only">Phone Number 3:</label>
                                    <input type="text" name="phone3" placeholder="phone number" class="form-control phoneNum" id="phone3">
                                    <label for="phone4" class="sr-only">Phone Number 4:</label>
                                    <input type="text" name="phone4" placeholder="phone number" class="form-control phoneNum" id="phone4">
                                </div>
                            </div>
                        </div>
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" placeholder="Email">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/TxtAreaModify.js"></script>
    <script> <!--SCRIPT TO UPDATE LIST AND EDITOR INFORMATION -->
        $('#form_update').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'includes/ajax_selection_list.php',
            dataType: "JSON",
            success: function (data) {
                $("#info1").html(""); //clear list so list doesn't get appended
                $.each(data,function(index,value){
                    $("#info1").append("<div onclick='information_Edit("+value['Seq']+");' class='col-xs-12 dog_list' id="+value['Seq']+" style='border:solid'>" + value["TakenBy"] + " " + value["Time"] + " " + value["Pet"] + " " + value["LastName"] + " " + value["Breed"]+"</div>");
                    //console.log(value["Seq"] + value["TakenBy"] + value["Time"] + value["Pet"] + value["LastName"] +" " + value["Breed"]);
                });
            },
            error: function( data, xhr, desc, err) {
                console.log( data + "\n" + xhr + "\n" + err + "\n" + desc);
            }
        });
//            var items = $("form :input").map(function(index, elm) {
//                return {name: elm.name, type:elm.type};
//            });
//            $.each(items, function(i, d){
//                console.log("Name:" + d.name + " Type: " +  d.type);
//            });

            //$("form :input").each(function(index, elm){
              //  var $elm = $(elm);
                //$("body").append("<h1>Name:" + $(this).attr("name") + " Type: " + $(this).attr("type") + " Value: " + $(this).val() + "</h1>");
           // });
    });

    function information_Edit(sid){
        console.log("function information_Edit");
        var id = sid;
        $.ajax({
            async: 'FALSE',
            type: 'POST',
            data:{'GLSeq':id},
            url: 'includes/ajax_edit_values.php',
            dataType: "JSON",
            success: function (data) {
                //RESET FORM ELEMENTS
                $('#nailfile').removeAttr('checked');
                $('#teethbrush').removeAttr('checked');
                $('#flea').removeAttr('checked');
                $('#dematt').removeAttr('checked');
                $('#deskunk').removeAttr('checked');
                $('#shampooselect').val(" ");
                $('#deshedselect').val(" ");
                $('#fleaselect').val(" ");
                $("#optionsRadios1").prop('checked',false);
                $("#optionsRadios2").prop('checked',false);

                //FILL FORM ELEMENTS
                $("#GLSeq").val(data["Seq"]);
                $("#taken_by").val(data["TakenBy"]);
                $("#dog_name").val(data["Pet"]);
                $("#dog_breed").val(data["Breed"]);
                $("#bbPrice").val(data["BathRate"]);
                $("#groomPrice").val(data["GroomRate"]);
                $("#first_name").val(data["FirstName"]);
                $("#last_name").val(data["LastName"]);
                $("#address").val(data["Address"]);
                $("#city").val(data["City"]);
                $("#zip").val(data["Zip"]);
                $("#phone1").val(data["Phone1"]);
                $("#phone2").val(data["Phone2"]);
                $("#phone3").val(data["Phone3"]);
                $("#phone4").val(data["Phone4"]);
                $("#email").val(data["Email"]);
                $("#txtarea").val(data["Description"]);
                if( data["BoolGroom"] == "bath"){
                    $("#optionsRadios1").prop('checked',true);
                }else if(data['BoolGroom']== "groom"){
                    $("#optionsRadios2").prop('checked',true);
                }else {
                    alert("Please select Bath or Groom.");
                }

                //CALLING FUNCTION FROM TXTAREA SCRIPT
                txtEditJS();
            },
            error: function( xhr, desc, err) {
                console.log( xhr + "\n" + err + "\n" + desc);
            }
        });
    }
</script>

    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <script>$(document).ready(function(){
            jQuery(function(phoneFormat){
                $(".phoneNum").mask("(999)999-9999");
            });
        });
    </script>
</body>
</html>
