<?php
$this->load->view('inc/header');
?>

    <body onload="myFunction()" style="margin:0;">

        <div class="error_page">

            <div class="error-top">
                <h2 class="inner-tittle page"></h2>
                <div class="login">
                    <!-- <h3 class="inner-tittle t-inner">FBP Login</h3> -->
                    <div class="buttons login">
                        <ul>
                            <a href="login.html"><img src="<?=base_url('assets/');?>images/logo.png"></a>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                    <?php

            if ($this->session->flashdata('error')) {
                ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong style="color: #a94442;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong> <span style="color: #a94442;"><?= $this->session->flashdata('error') ?></span>
                        </div>
                        <?php
            } 
            ?>
                            <form action="<?php echo base_url()?>login" method="POST" enctype="multipart/form-data" role="form" autocomplete="off">
                                <input type="text" class="text" value="username" name="userName" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'username';}">
                                <input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">

                                <input type="submit" class="btn btn-success" name="login" value="Login" onclick="showloader()">
                                <div class="clearfix"></div>

                                <div class="new">
                                    <p>
                                        <label class="checkbox11">
                                            <input type="checkbox" name="checkbox"><i> </i>Forgot Password ?</label>
                                        <!-- <button class="">Forgot Password</button> -->
                                    </p>

                                    <div class="clearfix"></div>
                                </div>
                            </form>
                </div>

            </div>

        </div>

        <div class="footer">
            <div class="error-btn">

            </div>

        </div>

        <script src="<?=base_url('assets/');?>js/bootstrap.min.js"></script>

        <script type="text/javascript">
        </script>
    </body>

    </html>