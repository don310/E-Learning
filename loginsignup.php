<!-- Start Including header -->
<?php
include ('./dbConnection.php');
include ('./mainInclude/header.php');
?>
<!-- End Including header -->
<!--Start Course Page Banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="https://source.unsplash.com/1600x500/?courses, school, books" alt="courses"
            style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;" />


    </div>
</div>


<div class="container jumbotron mb-5" style=" padding: 30px;">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group mt-2">
                    <i class="fas fa-envelope"></i>
                    <label for="stuLogEmail mt-2" class="pl-2 font-weight-bold">Email:</label><small
                        id="statusLogMsg1"></small>
                    <input type="email" class="form-control mt-2" id="stuLogEmail" name="stuLogEmail"
                        placeholder="Email" required>
                </div>
                <div class="form-group mt-2">
                    <i class="fas fa-key"></i>
                    <label for="stuLogPass mt-2" class="pl-2 font-weight-bold">Password:</label>
                    <input type="password" class="form-control mt-2" id="stuLogPass" name="stuLogPass"
                        placeholder="Password" required>
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
            </form><br>
            <small id="statusLogMsg"></small>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up</h5>
            <form role="form" id="stuRegForm">
                <div class="form-group mt-2">
                    <i class="fas fa-user"></i>
                    <label for="stuname mt-2" class="pl-2 font-weight-bolder">Name:</label><small id="statusMsg1"></small>
                    <input type="text" class="form-control mt-2" id="stuname" name="stuname" placeholder="Name"
                        required>
                </div>
                <div class="form-group mt-2">
                    <i class="fas fa-envelope"></i>
                    <label for="stuemail mt-2" class="pl-2 font-weight-bolder">Email:</label><small id="statuMsg2">
                        <input type="email" class="form-control mt-2" id="stuemail" name="stuemail" placeholder="Email"
                            required>
                        <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group mt-2">
                    <i class="fas fa-key"></i>
                    <label for="stupass mt-2" class="pl-2 font-weight-bolder">New Password:</label><small id="statusMsg3"></small>
                        <input type="password" class="form-control mt-2" id="stupass" name="stupass"
                            placeholder="Password" required>
                            <div class="form-group mt-2">
                        <i class="fas fa-graduation-cap"></i>
                        <label for="stuqualification mt-2" class="pl-2 font-weight-bolder">Qualification:</label>
                        <input type="text" class="form-control mt-2" id="stuqualification" name="stuqualification" placeholder="Qualification" required>
                    </div>
                    <div class="form-group mt-2">
                        <i class="fas fa-university"></i>
                        <label for="stucourse mt-2" class="pl-2 font-weight-bolder">Course:</label>
                        <input type="text" class="form-control mt-2" id="stucourse" name="stucourse" placeholder="Course" required>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="signup" onclick="addStu()">Sign Up</button>
            </form><br />
            <small id="successMsg"></small>
        </div>
    </div>
</div>
<!--End Course Page Banner-->



<!--Start Contact Us-->
<?php
include ('./contact.php');
?>
<!--End Contact us-->
<!-- Start Including footer -->
<?php
include ('./mainInclude/footer.php');
?>
<!-- End Including footer -->