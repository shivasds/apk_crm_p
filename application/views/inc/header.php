<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/')?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/')?>css/style.css" rel='stylesheet' type='text/css' />
  <!-- Datatable-->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="https://rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/MonthPicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">
     <!-- jQuery -->
     <!-- Mobile styling -->
    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>styles/framework.css"> -->
    <link href="https://newcrm.fullbasketproperty.com/assets/css/dropdown.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>fonts/css/fontawesome-all.min.css">
   
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/icon-font.min.css" type='text/css' />
    <link rel="manifest" href="<?=base_url('assets/')?>styles/manifest.json">
    <script type="text/javascript" src="https://newcrm.fullbasketproperty.com/assets/js/CSSPlugin.min.js"></script>
    <!-- //lined-icons -->
    <script src="<?=base_url('assets/')?>js/jquery-1.10.2.min.js"></script>
    <script src="<?=base_url('assets/')?>js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url('assets/')?>scripts/plugins.js"></script> -->
    <!-- <script type="text/javascript" src="<?=base_url('assets/')?>scripts/custom.js"></script> -->
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/MonthPicker.min.js"></script>

<script src="https://newcrm.fullbasketproperty.com/assets/js/css3clock.js"></script>
<script src="https://newcrm.fullbasketproperty.com/assets/js/skycons.js"></script>
</head>
<style>
    a {
    color: #ffffff00!important;
    text-decoration: none;
        }
    .error_page {
        background: #052963;
        position: relative;
        padding: 11em 0;
        width: 100%;
    }
    
    .table-scroll th {
            padding: 3px 10px;
        }
        
        th {
            line-height: 25px;
        }
        
        .table-scroll {
            overflow-x: scroll;
            padding: 0px 10px;
        }
        
        /* #example_wrapper {
            margin-bottom: 40px!important;
            padding: 15px;
        } */
        a {
            color: #337ab7!important;
            text-decoration: none;
        }
        td, th {
            padding: 0;
            padding: 9px 4px;
        }
        .star {
            font-size: 25px;
                color:gold;
            }
            @media screen and (-webkit-min-device-pixel-ratio: 0){
             input[type=date], input[type=datetime-local], input[type=month], input[type=time] {
             line-height: 20px;
               }
            
            }

            .modal {
            top: 50px;
            }
           
</style>

<!-- <script>
$(document).ready(function(){
    function alignModal(){
        var modalDialog = $(this).find(".modal-dialog");
        
          modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
   
    $(".modal").on("shown.bs.modal", alignModal);
    
    
    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    });   
});
</script> -->
<script>
var myVar;

function myFunction() {
//     $("#page").css("opacity",0.5);
//   myVar = setTimeout(showPage, 1000);
document.getElementById("loader").style.display = "none";
  document.getElementById("page").style.display = "block";
  $("#page").css("opacity",'');
}

// function showPage() {
//   document.getElementById("loader").style.display = "none";
//   document.getElementById("page").style.display = "block";
//   $("#page").css("opacity",'');
 
// }

function showloader(){
   
    document.getElementById("loader").style.display = "block";
    $("#page").css("opacity",0.5);
}

function favorite(id){
          if($(id).hasClass("glyphicon-star-empty")){
              $("#importantCallback").attr("value","1");
           $(".star").removeClass("glyphicon-star-empty");
           $(".star").addClass("glyphicon-star");
           
          }
          else{
            $("#importantCallback").attr("value","0");
           $(".star").addClass("glyphicon-star-empty");
           $(".star").removeClass("glyphicon-star");
          }
           
         }
</script>

<script type="text/javascript">
    $(function(){
        $('.datepicker').each(function(){
            $(this).datepicker({
                dateFormat: 'yy-mm-dd',
                beforeShow: function() {
                    setTimeout(function(){
                        $('.ui-datepicker').css('z-index', 99999999999999);
                    }, 0);
                }
             });
        });
        $('#ui-datepicker-div').draggable();
        $('#c_bkngMnth, #c_estMonthofInvoice').MonthPicker({
     Button: false
          });
        $('.timePicker').each(function(){
            $(this).timepicker({ 'timeFormat': 'H:i' });
        });
    });

 
</script> 

