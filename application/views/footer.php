
<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="col-md-12 text-center content" id="contact_us">
            <h2>Contact Us</h2>
            <div class="container">
                <div class="row justify-content-center text-left">
                    <div class="col-md-4 content">
                        <img src="<?php echo base_url()?>assets/img/logo.png" alt="" style="width: 20em">
                    </div>
                    <div class="col-md-4 content">
                        <p>Jalan Cinta, Kota Cinta, Provinsi Jiwa no. 21</p>
                        <p>Opening Hours: 9 a.m.
                            <br><br>
                            Phone: 6794 6625 <br>
                            SMS: 9825 6625 (Input your Name, NRIC, Date, Time and Duration of your game) <br><br>
                            Fax: <br>
                            E-mail: business@golazo.com.sg</p><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-left footer bg-primary" style="color: white">
            <h6>Copyright 2016 FutsalArena @ FutsalCorner| All Rights Reserved | Powered by NoerRPL |Terms & Conditions</h6>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="loginModalLabel">Login to Your FutsalCorner Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="">
                        <div>
                            <div class="login-panel panel panel-success">
                                <?php
                                $success_msg= $this->session->flashdata('success_msg');
                                $error_msg= $this->session->flashdata('error_msg');

                                if($success_msg){
                                    ?>
                                    <div class="alert alert-success">
                                        <?php echo $success_msg; ?>
                                    </div>
                                    <?php
                                }
                                if($error_msg){
                                    ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error_msg; ?>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="panel-body">
                                    <form role="form" method="post" action="<?php echo base_url('user/login_user'); ?>">
                                        <fieldset>
                                            <div class="form-group"  >
                                                <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                                            </div>
                                            <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container text-center">
                    <p>Don't have an account?<a href="#" style="background-color: white; border-color: white; color: #51bcda; text-transform: none;font-weight: 550;" data-dismiss="modal" data-toggle="modal" data-target="#registModal"> Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registModal" tabindex="-1" role="dialog" aria-labelledby="registModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="registModalLabel">Sign Up for Your FutsalCorner Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span style="background-color:red;">
                  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
                      <div class=""><!-- row class is used for grid system in Bootstrap-->
                          <di><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                              <div class="login-panel panel panel-success">
                                  <div class="panel-body">

                                  <?php
                                  $error_msg=$this->session->flashdata('error_msg');
                                  if($error_msg){
                                      echo $error_msg;
                                  }
                                  ?>

                                      <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
                                          <fieldset>
                                              <div class="form-group">
                                                  <input class="form-control" placeholder="Name" name="user_name" type="text" autofocus>
                                              </div>

                                              <div class="form-group">
                                                  <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
                                              </div>
                                              <div class="form-group">
                                                  <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                                              </div>

                                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                                          </fieldset>
                                      </form>
                                  </div>
                              </div>
                          </di>
                      </div>
                  </div>
                </span>
            </div>

            <div class="modal-footer">
                <div class="container text-center">
                    <p>Already have an account?<a href="#" style="background-color: white; border-color: white; color: #51bcda; text-transform: none;font-weight: 550;" data-dismiss="modal" data-toggle="modal" data-target="#loginModal"> Log in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
    if ($this->session->flashdata('error_msg')) {
        ?>
        <script type="text/javascript">
            $(window).load(function(){
                $('#registModal').modal('show');
            });
        </script>
        <?php
    }
?>
<script>
    document.getElementById("myDate").disabled = true;
</script>
<script type="text/javascript">
    function showText(num)
    {
        if(num==0) {
            document.getElementById('jadwalcourt1').style.display = 'block';
            document.getElementById('jadwalcourt2').style.display = 'none';
            document.getElementById('jadwalcourt3').style.display = 'none';
        }else if(num==1) {
            document.getElementById('jadwalcourt1').style.display = 'none';
            document.getElementById('jadwalcourt2').style.display = 'block';
            document.getElementById('jadwalcourt3').style.display = 'none';
        }else if(num==2) {
            document.getElementById('jadwalcourt1').style.display='none';
            document.getElementById('jadwalcourt2').style.display='none';
            document.getElementById('jadwalcourt3').style.display='block';
        }
        return;
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>