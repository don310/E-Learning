<!--Start Footer-->
<style>
    .footer-link {
        text-decoration: none;
        font-weight: bold;
    }
</style>

<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2024 || Designed by IntraCobroid || <a href="#login" data-bs-toggle="modal" data-bs-target="#adminLoginModalCenter" class="footer-link"> Admin Login</a></small>
</footer>


    <!--End Footer-->

    <!--Start Student Registration Modal-->
  <!-- Modal -->
  <div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden = "true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
    <!-- Start Student Registration form -->
    <?php
    include('studentRegistration.php'); 
    ?>
    <!-- End Student Registration form -->
</div>

        <div class="modal-footer">
          <span id="successMsg" ></span>
          <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Signup</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!--End Student Registration Modal-->

    <!--Start Student Login Modal-->
  <!-- Modal -->
  <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stuLoginModalCenter">Student Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="stuLoginForm">
                <div class="mb-3">
                    <label for="stuLogemail" class="pl-2 font-weight-bold"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" id="stuLogemail" name="stuLogemail" placeholder="Email" aria-describedby="emailHelp">
                </div>
                         
                <div class="mb-3">
                  <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
                  <input type="password" placeholder="Password" class="form-control" id="stuLogpass" name="stuLogpass">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <small id="statusLogMsg"></small>
          <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
    <!--End Student Login Modal-->

    <!--Start Admin Login Modal-->
  <!-- Modal -->
  <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminLoginModalCenter">Admin Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="adminLoginForm">
                <div class="mb-3">
                    <label for="adminLogemail" class="pl-2 font-weight-bold"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" class="form-control" id="adminLogemail" name="adminLogemail" placeholder="Email" aria-describedby="emailHelp">
                </div>
                         
                <div class="mb-3">
                  <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
                  <input type="password" placeholder="Password" class="form-control" id="adminLogpass" name="adminLogpass">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
    <!--End Admin Login Modal-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
   <script type="text/Javascript" src="js/script.js"></script>
 
   <!--Student Ajax Call JavaScript-->
   <script type="text/Javascript" src="js/ajaxrequest.js"></script>
   <!--Admin Ajax Call JavaScript-->
   <script type="text/Javascript" src="js/adminajaxrequest.js"></script>
  
</body>

</html>