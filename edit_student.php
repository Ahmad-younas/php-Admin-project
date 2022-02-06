<?php 
include('includes/header.php');
include('includes/navbar.php');
global $id, $username, $email, $password, $phoneNumber; 
?>

<div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          
           


          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="container-login">
            <div class="row justify-content-center ">
                 <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update Student</h1>
                        </div>

                        <?php 
                        $connection = new mysqli("localhost","root","","adminpanel");
                        if(isset($_POST['btn_update'])){
                            $id = $_POST['id'];
                             $query = "SELECT * FROM student WHERE id=$id;";
                             $query_run = mysqli_query($connection,$query);
                            if($query_run){
                                if(mysqli_num_rows($query_run)>0){
                                    while($row = mysqli_fetch_row($query_run)){
                                        $id=$row[0];
                                        $username=$row[1]; 
                                        $email=$row[2];
                                        $password=$row[3];
                                        $phoneNumber=$row[5];
                                    }
                                    ?>
                                    <form action="code.php" method="POST">
                            <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username ?>" id="exampleInputFirstName" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email"value="<?php echo $email ?>" id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Email Address" required>
                            </div>
                            <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"value="<?php echo $password ?>" id="exampleInputPassword" placeholder="Password" require>
                            </div>
                            <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="password" class="form-control" name="cpassword" value="<?php echo $password ?>" id="exampleInputPasswordRepeat"
                                placeholder="Repeat Password" required>
                            </div>
                            <div class="form-group">
                            <label for="phone">Enter a phone number:</label>
                                <input type="tel" id="phone" name="phone" class="form-control"value="<?php echo $phoneNumber ?>" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required><br>
                                <small>Format: 123-45-678</small>
                            </div>
                            <div class="form-group">
                            <select class="form-select" aria-label="form-select-lg example" name="department">
                                <option selected>Select Department</option>
                                <option value="BSCS">BSCS</option>
                                <option value="BBA">BBA</option>
                                <option value="HND">HND</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?php echo($id) ?>">
                            <div class="form-group">
                            <button type="submit" name="btn_edit" class="btn btn-primary btn-block">save</button>
                            </div>
                        </form>
                                

                            <?php
                                }
                            }
                        }
                        ?>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
  </div>

        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
      </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<?php 
 include('includes/script.php');
 include('includes/footer.php');
 
 ?>   
