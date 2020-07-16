<div class="header header-fixed header-logo-app" >
                <a href="<?=base_url();?>" class="back-button header-title" onclick="showloader()">Home</a>
                <a href="#" onclick="goback()" class="header-icon header-icon-1 back-button"><i class="fa fa-arrow-left"></i></a>
                <!-- <a href="login.html" class="header-icon header-icon-2"><i class="fa fa-sign-out-alt"></i></a> -->
                <span class="header-icon header-icon-2" onclick="openNav()" ><i class="fas fa-user"></i></span>
 </div>
<script>
function goback(){
    showloader();
    window.history.go(-1);
}
</script>