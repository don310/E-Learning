$(document).ready(function(){
    //Ajax Call From Already Exists Email Verification
    $("#stuemail").on("keypress blur", function(){
        var reg = /^[A-Z0-9._%+-]+@[A-Z0-9-]+\.[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function (data){
                //console.log(data)
                if(data!=0){
                    $("#statusMsg2").html(
                        '<small style="color:red;">Email ID Already Used !</small>'
                      );
                    $("#signup").attr("disabled", true);
                }else if(data == 0 && reg.test(stuemail)){
                    $("#statusMsg2").html(
                        '<small style="color:green;">There You Go!</small>'
                      );
                    $("#signup").attr("disabled", false);
                }else if(!reg.test(stuemail)){
                    $("#statusMsg2").html(
                        '<small style="color:red;">Please Enter valid Email e.g. example@gmail.com !</small>'
                      );
                    $("#signup").attr("disabled", false);  
                }
                if(stuemail == ""){
                    $("#statusMsg2").html(
                        '<small style="color:red;">Please Enter Email !</small>'
                      );
                }
            },
        });
    });
});


function addStu() {
  // Get input values
  var reg = /^[A-Z0-9._%+-]+@[A-Z0-9-]+\.[A-Z]{2,4}$/i;
  var stuname = $("#stuname").val();
  var stuemail = $("#stuemail").val();
  var stupass = $("#stupass").val();

  //Checking Form Fields on Form Submission
  if (stuname.trim() == "") {
    $("#statusMsg1").html(
      '<small style="color:red;">Please Enter Name !</small>'
    );
    $("#stuname").focus();
    return false;
  } else if (stuemail.trim() == "") {
    $("#statusMsg2").html(
      '<small style="color:red;">Please Enter Email !</small>'
    );
    $("#stuemail").focus();
    return false;
  }else if(stuemail.trim() !="" && !reg.test(stuemail)){
    $("#statusMsg2").html(
        '<small style="color:red;">Please Enter valid Email e.g. example@gmail.com !</small>'
      );
      $("#stuemail").focus();
    return false;
  }else if (stupass.trim() == "") {
    $("#statusMsg3").html(
      '<small style="color:red;">Please Enter Password !</small>'
    );
    $("#stupass").focus();
    return false;
  } else {
    // AJAX request
    $.ajax({
      url: "Student/addstudent.php",
      method: "POST",
      dataType: "json",
      data: {
        stusignup: "stusignup",
        stuname: stuname,
        stuemail: stuemail,
        stupass: stupass,
      },
      success: function (data) {
        console.log(data);
        if (data == "OK") {
          $("#successMsg").html(
            "<span class='alert alert-success'>Registration Successfully !</span>"
          );
          clearStuRegField();
        } else if (data == "Failed") {
          $("#successMsg").html(
            "<span class='alert alert-danger'>Unable to Register</span>"
          );
        }
      },
    });
  }
}

//Empty All Fields 
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#stuRegMsg1").html("");
    $("#stuRegMsg2").html("");
    $("#stuRegMsg3").html("");
}


//Ajax Call for Student Login verification
function checkStuLogin() {
  var stuLogEmail = $("#stuLogemail").val();
  var stuLogPass = $("#stuLogpass").val();

  $.ajax({
    url: "Student/addstudent.php",
    method: "POST",
    data: {
      checkLogemail: "checklogemail",
      stuLogEmail: stuLogEmail,
      stuLogPass: stuLogPass,
    },
    success: function (data) {
      if (data == 0) {
        $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
      } else if (data == 1) {
        $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');

        // Redirect to index.php after a delay
        setTimeout(() => {
          window.location.href = "index.php";
        }, 1000);
      }
    },
  });
}
