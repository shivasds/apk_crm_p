<?php
$this->load->view('inc/header');

?>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>styles/framework.css">

    <body class="theme-light" onload="myFunction()" style="margin:0;" data-highlight="blue2">
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

                                <div class="clearfix"></div>

                                <div class="divider divider-margins"></div>

                                <div class="content">
                                    <div class="content-title has-border border-highlight bottom-18">
                                        <label>Callbacks</label>

                                    </div>

                                    <div class="">
                                        <table id="tableexample" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="hidden">No</th>
                                                    <th>Contact Name</th>
                                                    <th>Project</th>
                                                    <th>Status</th>
                                                    <th class="hidden">dataid</th>
                                                    <th class="hidden">contact</th>
                                                    <th>Register</th>
                                                </tr>
                                            </thead>
                                            <tbody id="main_body">
                                                <?php $i= 1;
                              if ($result) { 

                              if(count($result)>0){
                              foreach ($result as $data) {
                                  $duedate = explode(" ", $data->due_date);
                                  $duedate = $duedate[0];  
                                  ?>
                                                    <tr id="row<?php echo $i ?>" <?php if(strtotime($duedate)<strtotime( 'today')){?> class="highlight_past"
                                                        <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now"
                                                            <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future"
                                                                <?php } ?>>
                                                                    <td class="hidden">
                                                                        <?php echo $i; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $data->name; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $data->project_name; ?>
                                                                    </td>
                                                                    <td class="<?php echo $data->status_name; ?>">
                                                                        <?php echo $data->status_name; ?>
                                                                    </td>
                                                                    <td class="hidden">
                                                                        <?php echo $data->id; ?>
                                                                    </td>
                                                                    <td class="hidden">
                                                                        <?php echo $data->contact_no1; ?>
                                                                    </td>
                                                                    <td>
                                                                        <button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="btn-register shadow-huge bg-icon">Register</button>
                                                                    </td>

                                                    </tr>
                                                    <?php $i++; } 
                                    } }
                                        else
                                      {
                                          echo "<tr><td colspan=13 align=center>No Data Found</td></tr>";
                                      }
                                      ?>
                                            </tbody>
                                        </table>
                                        <div style="margin-top: 20px">
                                            <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(2)) ? $this->uri->segment(2)+1 : 1; ?> to <?= ($this->uri->segment(2)+count($result)); ?> of <?= $totalRecords; ?> entries</p></span>
                                            <ul class="pagination pull-right">
                                                <?php echo $links; ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <!--<div class="col-md-6 form-group">
                        <input type="checkbox" name="fancy-checkbox-info" onclick="clientEmail()"  id="fancy-checkbox-info" autocomplete="off" />
                        <div class="btn-group">
                            <label for="fancy-checkbox-info" class="btn btn-info">
                                <span class="glyphicon glyphicon-ok"></span>
                                <span> </span>
                            </label>
                            <label for="fancy-checkbox-info" class="btn btn-default active">
                               Client Registration Email
                            </label>
                        </div> 
                        <div id="clientEmail" hidden>
                            <div class="col-sm-12 form-group">
                                <label for="email_id">Email Id:</label>
                                <input type="email" class="form-control" id="client_email_id" name="email_id" placeholder="Email Id">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="client_email_subject" name="subject" value="Client Registration" placeholder="Subject">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="comment">Email Body:</label>
                                <textarea class="form-control" name="notes" id="client_email_body" rows="15" id="comment">          
                                    Dear sir / madam,

                                    Greetings From Fullbasket Property...

                                    Kindly register the below client For __________________ project On behalf Of Fullbasket Property 

                                    Property & acknowledge.

                                    Client Name : ________________

                                    Contact No. : ________________

                                    E-mail ID   : ________________

                                    Thanks & Regards
                                    Team Fullbasket Property
                                </textarea>
                            </div>
                            <div class="col-sm-12 form-group">
                                <div class="alert alert-success" id="regmail_success" style="display:none">
                                    <strong>Success!</strong> Email sent successfully.
                                </div>
                                <button type="button" onclick="sendRegMail()" class="btn btn-success">Send</button>
                            </div>
                        </div>
                    </div> -->
                                </div>

                                <div class="clearfix"></div>

                        </div>

                        <div style="margin-bottom: 60px">
                        </div>

                        <div class="menu-hider"></div>
        </div>

        <script>
            $(document).ready(function() {
                $('#tableexample').DataTable({
                    "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
                    "paging": false, //Dont want paging                
                    "bPaginate": false, //Dont want paging 
                    "sScrollX": true
                });
            });

            function getrowvalue(id) {
                var trid = $(id).parents('tr').children();
                $("#addnotesdivid").val($(trid[4]).text());

            }
        </script>
    </body>

    <div class="modal fade" id="myModalcall" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <p style="margin-bottom: 8px; text-align: center;">Register a Client</p>
                    <table>
                        <div id="clientEmail">
                            <div class="col-sm-12 form-group">
                                <label for="email_id">Email Id:</label>
                                <input type="email" class="form-control" id="client_email_id" name="email_id" placeholder="Email Id">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="client_email_subject" name="subject" value="Client Registration" placeholder="Subject">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="comment">Email Body:</label>
                                <textarea class="form-control" name="notes" id="client_email_body" rows="15" id="comment">
                                    Dear sir / madam, Greetings From Fullbasket Property... Kindly register the below client For __________________ project On behalf Of Fullbasket Property Property & acknowledge. Client Name : ________________ Contact No. : ________________ E-mail ID : ________________ Thanks & Regards Team Fullbasket Property
                                </textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <!-- <label class="label-control ">id</label> -->
                                    <input type="hidden" id="addnotesdivid" name="idoftable" value="">
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <div class="alert alert-success" id="regmail_success" style="display:none">
                                    <strong>Success!</strong> Email sent successfully.
                                </div>
                                <button type="button" onclick="sendRegMail()" class="btn btn-success">Send</button>
                            </div>
                        </div>
                    </table>

                </div>

            </div>

        </div>
    </div>
    <script type="text/javascript">
        function sendRegMail() {
            if ($("#client_email_id").val() == "") {
                alert("Please enter client email");
                $("#client_email_id").focus();
                return false;
            }
            if ($("#client_email_subject").val() == "") {
                alert("Please enter email subject");
                $("#client_email_subject").focus();
                return false;
            }
            if ($("#client_email_body").val() == "") {
                alert("Please enter email body");
                $("#client_email_body").focus();
                return false;
            }
            $(".se-pre-con").show();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>dashboard/send_mail/client-reg",
                data: {
                    client_email: $("#client_email_id").val(),
                    message: $("#client_email_body").val(),
                    subject: $("#client_email_subject").val(),
                    callback_id: $("#addnotesdivid").val()
                },
                success: function(data) {
                    console.log(data.success);
                    if (data.success) {
                        $("#regmail_success").show();
                    }
                    $(".se-pre-con").hide("slow");
                }
            });
        }
    </script>