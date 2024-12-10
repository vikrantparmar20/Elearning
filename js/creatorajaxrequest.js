$(document).ready(function () {
  //Ajax call form already exists email verification
  $("#creatoremail").on("keypress blur", function () {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var creatoremail = $("#creatoremail").val();
    $.ajax({
      url: "Creator/addcreator.php",
      method: "POST",
      dataType: "json",
      data: {
        checkemail: "checkemail",
        creatoremail: creatoremail,
      },
      success: function (data) {
        console.log(data);
        if (data != 0) {
          $("#statusMsg5").html(
            '<small style="color:red;">Email ID Already Used!</small>'
          );
          $("#signup1").attr("disabled", true);
        } else if (data == 0 && reg.test(creatoremail)) {
          $("#statusMsg5").html(
            '<small style="color:green;">Valid Email!</small>'
          );
          $("#signup1").attr("disabled", false);
        } else if (!reg.test(creatoremail)) {
          $("#statusMsg5").html(
            '<small style="color:red;">Please Enter Valid Email e.g. example@gmail.com</small>'
          );
          $("#signup1").attr("disabled", false);
        }
        if (creatoremail == "") {
          $("#statusMsg5").html(
            '<small style="color:red;">Please Enter  Email </small>'
          );
        }
      },
    });
  });
});

function addcreator() {
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var creatorname = $("#creatorname").val();
  var creatoremail = $("#creatoremail").val();
  var creatorpass = $("#creatorpass").val();
  console.log(creatorname);
  console.log(creatoremail);
  console.log(creatorpass);

  //Checking Form fields on form submission
  if (creatorname.trim() == "") {
    $("#statusMsg4").html(
      '<small style="color:red;">Please Enter Name!</small>'
    );
    $("#creatorname").focus();
    return false;
  } else if (creatoremail.trim() == "") {
    $("#statusMsg5").html(
      '<small style="color:red;">Please Enter Email!</small>'
    );
    $("#creatoremail").focus();
    return false;
  } else if (creatoremail.trim() != "" && !reg.test(creatoremail)) {
    $("#statusMsg5").html(
      '<small style="color:red;">Please Enter Valid Email e.g. example@gmail.com</small>'
    );
    $("#creatoremail").focus();
    return false;
  } else if (creatorpass.trim() == "") {
    $("#statusMsg6").html(
      '<small style="color:red;">Please Enter Password!</small>'
    );
    $("#creatorpass").focus();
    return false;
  } else {
    $.ajax({
      url: "Creator/addcreator.php",
      method: "POST",
      dataType: "json",
      data: {
        creatorsignup: "creatorsignup",
        creatorname: creatorname,
        creatoremail: creatoremail,
        creatorpass: creatorpass,
      },
      success: function (data) {
        console.log(data);
        if (data == "OK") {
          $("#successMsg1").html(
            "<span class='alert alert-success'>Registration Successful !</span>"
          );
          clearcreatorRegField();
        } else if (data == "Failed") {
          $("#successMsg1").html(
            "<span class='alert alert-danger'>Unable to Register !</span>"
          );
        }
      },
    });
  }
}

//Empty all fields
function clearcreatorRegField() {
  $("#creatorRegForm").trigger("reset");
  $("#statusMsg4").html("");
  $("#statusMsg5").html("");
  $("#statusMsg6").html("");
}

//Ajax call for creator login registration
function checkcreatorLogin() {
  console.log("clicked");
  var creatorLogEmail = $("#creatorLogemail").val();
  var creatorLogPass = $("#creatorLogpass").val();
  console.log(creatorLogEmail);
  console.log(creatorLogPass);
  $.ajax({
    url: "Creator/addcreator.php",
    method: "POST",
    dataType: "json",
    data: {
      checkLogemail: "checklogemail",
      creatorLogEmail: creatorLogEmail,
      creatorLogPass: creatorLogPass,
    },
    success: function (data) {
      if (data == 0) {
        $("#statusLogMsg1").html(
          "<small class='alert alert-danger'>Invalid Email Id or Password !</small>"
        );
      } else if (data == 1) {
        $("#statusLogMsg1").html(
          '<div class="spinner-border text-success" role="status"></div>'
        );
        setTimeout(() => {
          window.location.href = "Creator/creatorProfile.php";
        }, 1000);
      }
    },
  });
}
