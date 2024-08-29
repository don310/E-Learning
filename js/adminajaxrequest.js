//Ajax Call for Admin Login verification
function checkAdminLogin() {
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();
  
    $.ajax({
      url: "Admin/admin.php",
      method: "POST",
      data: {
        checkLogemail: "checklogemail",
        adminLogEmail: adminLogEmail,
        adminLogPass: adminLogPass,
      },
      success: function (data) {
        if (data == 0) {
          $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
        } else if (data == 1) {
          $("#statusAdminLogMsg").html('<small class="alert alert-success">Successfully Loading...</small>');
  
          // Redirect to index.php after a delay
          setTimeout(() => {
            window.location.href = "Admin/adminDashboard.php";
          }, 1000);
        }
      },
    });
  }
  