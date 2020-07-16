<?php
    $this->load->view('inc/header');
?>
 <link rel="stylesheet" type="text/css" href="<?=base_url('../assets/')?>styles/framework.css">

<body class="theme-light"  onload="myFunction()" style="margin:0;" data-highlight="blue2">
<div id="loader"></div>  
<div id="page">


      <?php
        $this->load->view('inc/fixed_header');
     ?>
     
       <?php
          $this->load->view('inc/footer');
       ?>
          <!-- Profile -->
      <?php
            $this->load->view('profile');

        ?>
           <div class="page-content">
           <?php
              $this->load->view('inc/collapsable_header');
            ?>
            <div class="divider divider-margins"></div>

                <div class="content">

                    <div class="grid-icons grid-icons-3">
                        <a href="#"  data-type="user_total" class="bg-gradient-blue round-small  scale-hover view_callbacks"  onclick="showloader()">
                            <i class="fas fa-phone-volume"></i>
                            <span>Call for the day</span>
                        </a>
                        <a href="#"  data-type="user_overdue" class="bg-gradient-orange round-small  scale-hover view_callbacks"  onclick="showloader()">
                            <i class="fas fa-headset"></i>
                            <span>Over Due Calls</span>
                        </a>
                        <!-- <a href="<?=base_url('search_callback')?>" class="bg-gradient-blue2 round-small  scale-hover "  onclick="showloader()">
                            <i class="fab fa-searchengin"></i>
                            <span>Search</span>
                        </a> -->
                        <a href="<?=base_url('nextday_calls')?>" class="bg-gradient-purple round-small  scale-hover">
                                <i class="fas fa-mobile"></i>
                                <span>Calls for next day</span>
                            </a>
                        <a href="<?=base_url('callbacks')?>" class="bg-gradient-green round-small  scale-hover"  onclick="showloader()">
                            <i class="fa fa-phone"></i>
                            <span>View Calls</span>
                        </a>
                        <a class="bg-dar-pink round-small  scale-hover">
                            <i><?php if(isset($callsDone['totalCalls'])){echo $callsDone['totalCalls'] ? $callsDone['totalCalls'] : 0; }else{echo 0;}?></i>
                            <span>Calls Done Today</span>
                        </a>

                        
                    <!--  <a href="<?=base_url('dashboard/Registration_email');?>" class="bg-gradient-blue2 round-small  scale-hover">
                            <i class="far fa-registered"></i>
                            <span>Register</span>
                        </a>
                        <a href="<?=base_url('thankyou_mail')?>" class="bg-gradient-blue2 round-small  scale-hover">
                            <i class="fa fa-envelope"></i>
                            <span>Send Thank you Mail</span>
                        </a> -->
                        <!-- Hidden BUUTONS -->
                        <div class="" id="myDIV" style="display: none;">
                            <a href="#" class="bg-gradient-blue2 round-small  scale-hover">
                                <i class="fas fa-phone-volume"></i>
                                <span>ABC</span>
                            </a>
                            <a href="#" class="bg-gradient-blue2 round-small  scale-hover">
                                <i class="fas fa-headset"></i>
                                <span>Over</span>
                            </a>
                            <a href="#" class="bg-gradient-blue2 round-small  scale-hover">
                                <i class="fab fa-searchengin"></i>
                                <span>Search</span>
                            </a>
                            <a href="#" class="bg-gradient-blue2 round-small  scale-hover">
                                <i class="fa fa-phone"></i>
                                <span>Hot Calls</span>
                            </a>
                            <a href="#" class="bg-gradient-blue2 round-small  scale-hover">
                                <i class="far fa-registered"></i>
                                <span>Register a Client</span>
                            </a>
                            <a href="#" class="bg-gradient-blue2 round-small  scale-hover">
                                <i class="fa fa-envelope"></i>
                                <span>Send Thank Mail</span>
                            </a>
                        </div>

                    </div>
                    
                    
                    <!-- <div id="wrapper">
                        <button type="button" class="button  button-m bg-green2-dark" id="showAll">View All</button>
                        <button type="button" class="button  button-m bg-green2-dark" id="hideAll" style="display: none;">hide</button>

                    </div> -->
                </div>
            <div class="clear"></div>

            <!-- <div class="top-20"></div> -->
            <div style="margin-bottom: 80px">
            <!-- button -->
        </div>

   
        <div class="menu-hider"></div>

    </div>
    </div>

    <script>
        $("#showAll").click(function() {
            $("#myDIV").show();
            $("#showAll").hide();
            $("#hideAll").show();

        });

        $("#hideAll").click(function() {
            $("#myDIV").hide();
            $("#showAll").show();
            $("#hideAll").hide();

        });
         $('.view_callbacks').click(function(){
            var type = $(this).data('type');
            var data = {};
            switch (type)
            {
                case "user_total":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date = "<?php echo date('Y-m-d'); ?>";
                    data.access = 'read_write'; 
                    break;

                case "user_overdue":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.due_date_to = "<?php echo date('Y-m-d H:i:s'); ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "user_close": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;

                case "user_important":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.access = 'read_write'; 
                    data.important = 1;
                    break;

                case "manager_active": 
                    data.advisor = "<?php echo $user_id; ?>";
                    data.for = "dashboard";
                    data.access = 'read_write'; 
                    break;

                case "manager_close":
                    data.advisor = "<?php echo $user_id; ?>";
                    data.status = "close";
                    break;
            }
            
            view_callbacks(data,'post');

        });
         function view_callbacks(data, method) {
        var form = document.createElement('form');
        form.method = method;
        form.action = "<?php echo base_url()."view_callbacks?" ?>"+jQuery.param(data);
        form.style.visibility = "hidden";
        for (var i in data) {
            var input = document.createElement('input');
            input.type = "text";
            input.name = i;
            input.value = data[i];
            form.appendChild(input);
        }
        //console.log(form);
        document.body.appendChild(form);
        form.submit();
    }
    </script>
</body>