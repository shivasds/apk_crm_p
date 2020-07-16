<?php
$this->load->view('inc/header');
$CI=&get_instance();
 
    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
    .alrtMsg{padding-top: 50px;}
    .alrtMsg i {
        font-size: 60px;
        color: #f1c836;
    }
    </style>

    <div class="container"> 
        <div class="row"> 
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>

    <?php
    die;
     }
    ?>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>styles/framework.css">

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
            
            <div class="content-title has-border border-highlight bottom-18">
               <label>Todays Due Call</label>
                  
            </div>

            <div class="">
                <table id="examplehide" class="display" style="width:100%">
                    <thead>
                        <tr> 
                            <th>Customer Name</th>
                            <th>Assigned User</th>
                            <th class="hidden">Email</th> 
                            <th>Last added Note</th> 
                            
                        </tr>
                    </thead>
                    <tbody>
                                                <?php

                                     if(count($imp_callbacks)>0)
                                      {
                                      foreach ($imp_callbacks as $callback) { ?>
                                                                                            
                                        <tr>
                                            <td><a href="<?php echo base_url().'dashboard/view_callbacks/'.$user_id; ?>" data-type="user_important" data-id="<?php echo $callback->id; ?>"><?php echo $callback->name; ?></a></td>
                                            <td><?php echo $callback->user_name; ?></td>
                                            <td class="hidden">
                                                <?php 
                                                    echo $callback->email1; 
                                                    if($callback->email2)
                                                        echo ", ".$callback->email2;
                                                ?>
                                            </td>
                                            <td><?php echo $callback->last_note; ?></td>
                                        </tr>
                                    <?php }
                                }
                                 else
                                        echo '<tr><td colspan="4">No records found!</td></tr>';

                                     ?>
                         
                    </tbody>

                </table>

            </div>
            <!-- <div style="margin-top: 20px">
                <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(2)) ? $this->uri->segment(2)+1 : 1; ?> to <?= ($this->uri->segment(2)+count($imp_callbacks)); ?> of <?= $totalRecords ; ?> entries</p></span>
                <ul class="pagination pull-right"><?php echo $links; ?></ul>
             </div> -->

        </div>
        </div>
     
        <div class="menu-hider"></div>
    </div>
   

    <script>
        $(document).ready(function() {
            $('#examplehide').DataTable({
                "sScrollX": true,
                "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
                 "paging": false,//Dont want paging                
                "bPaginate": false,//Dont want paging 
            });
        });

        function getrowvalue(id){
            var trid=$(id).parents('tr').children();
             $("#customertdname").text($(trid[1]).text());
             $(".custPhoneancor").text($(trid[4]).text());
             $(".custPhoneancor").attr("href","tel:+91 "+$(trid[4]).text().trim());
             $("#c_id").text($(trid[5]).text());
             $("#previousNotesTxtArea").text($(trid[7]).text());
           
        }

        function getmodeltablevalue(id)
        {
            var trid=$(id).parents('tr').children();
            $(".addnotesmodalbtn").attr('id',$("#c_id").text());
            $("#addnotesdivid").val($("#c_id").text());
        }
    </script>


</body>

<div class="modal fade" id="myModalcall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p style="margin-bottom: 1px;text-align: center;">Call Now.</p>
          <table>
            <tr>
                <th>Customer</th>
                <th>Number</th>
            </tr>
            <tr>
                <td id="customertdname">abc</td>
                <td class="customertdphone"><a class= "custPhoneancor" href=""><i class="fas fa-phone color-green1-dark"></i></a></td>
            </tr>
          
            </table>
            
        </div>
       
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p style="margin-bottom: 1px;text-align: center;">Notes</p>
          <table>
            <tr>
                <th>Read Previos Note</th>
                <th class="hidden">id</th>
                <th>Add Notes</th>
            </tr>
            <tr>
            <td><textarea class="form-control" name="notes" rows="5" cols="30" id="previousNotesTxtArea" readonly></textarea></td>
            <td class="hidden">
                <div id="c_id"></div>
            </td>

            <td>
                <button style="cursor:pointer" onclick="getmodeltablevalue(this)" href="#myModal" data-toggle="modal" data-target="#addnotes" class="icon icon-xs icon-circle shadow-huge bg-icon" data-dismiss="modal">
                   <i class="fas fa-plus-circle "></i>
                </button>
            </td>
        
                
            </tr>
            
            </table>
            
        </div>
       
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="addnotes" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p style="margin-bottom: 1px;text-align: center;">Add Notes</p>
          <form method="post" action="<?=base_url('update_callback_details');?>" name="callback_details" autocomplete="off">
           
            <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="inputState">Status</label>
                    <select  class="form-control"  id="m_status" onchange="status(this.value)" name="status_id" required="required">
                        <option value="">Select</option>
                        <?php $statuses= $this->common_model->all_active_statuses(); 
                        foreach( $statuses as $status){ ?>
                            <option value="<?php echo $status->id; ?>"><?php echo $status->name ?></option>
                        <?php } ?>           
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <div class="content reassign accordion-style-2">
                    <a data-accordion="accordion-content-6" href="#" class="accordion-toggle-last">
                    <i class="accordion-icon-left fa fa-users  color-blue2-dark"></i>
                      Reassign Another
                    <i class="accordion-icon-right fa fa-arrow-down"></i>
                    </a>

                    <div id="accordion-content-6" class="accordion-content bottom-10">
                    <input type="datetime-local" id="birthdaytime" name="birthdaytime">
                       
                    </div>
                 </div>
                </div>
               
            </div>
            <div class="form-row hidden">
                <div class="form-group col-md-12">
                        <label class="label-control">id</label>
                        <input  id="addnotesdivid" name="idoftable" >
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-12">
                        <label class="label-control">Current Callback</label>
                        <textarea class="form-control" name="current_callback" rows="5" id="current_callback1" name="current_callback1" onkeyup="curr(this.value)" placeholder="Please Update Your Changes To Save"></textarea>
                </div>
            </div>

                        <!-- <input type="checkbox" name="important" id="fancy-checkbox-warning" autocomplete="off" />
                            <div class="btn-group">
                                
                                <label for="fancy-checkbox-warning" class="btn btn-default active">
                                   Important
                                </label>
                            </div> -->
                            <div class="form-group col-md-6 ">
                                <div class="col-md-1">
                                    <span value="0" name="important" onclick="favorite(this)" class="star glyphicon glyphicon-star-empty">
                                </span>

                                </div>
                                <div class="col-md-11">
                                    <p class="text-muted">Mark as Important</p>
                                </div>
                            </div>
            <button type="submit" id="" class="btn btn-primary addnotesmodalbtn">Add</button>
            </form>
            
        </div>
       
      </div>
      
    </div>
  </div>
