<!-- <div id="menu-instant-3" class="menu-box" data-menu-type="menu-box-right" data-menu-height="100%" data-menu-width="100%" data-menu-effect="menu-over"> -->
<style>
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 111;
        right: 0;
        border-left: 2px solid #e8e5e5;
        background-color: #fff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 2px;
    }
    
    .sidenav a {
        padding: 31px 14px 0px 25px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }
    
    .sidenav .logout a {
        padding: 10px 14px 0px 25px;
        padding: 7px 15px 6px 25px;
        font-size: 15px!important;
    }
    
    .sidenav a:hover {
        color: #f1f1f1;
    }
    
    .sidenav .closebtn {
        position: absolute;
        /* right: 25px; */
        color: black!important;
        font-size: 28px;
        padding: 4px 0px 1px 18px;
    }
    
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
        .sidenav a {
            font-size: 18px;
        }
    }
</style>

<div id="mySidenav" class="sidenav">
    <div class="caption shadow-huge">
        <div class="caption-top top-10 right-10">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        <div class="down top-30">
            <a><img src="https://newcrm.fullbasketproperty.com/uploads/<?= $this->session->userdata('profile_pic');?>" style="width: 100px; height: 100px;"></a>
            <a><span class=" name-caret" style="color: black !important;"><?= $this->session->userdata('user_name');?></span></a>
            <p style="color: black !important;">RM :
                <?= $this->session->userdata('manager_name');?>
            </p>

        </div>

    </div>
    <div class="content">
        <!-- <div class="divider top-10"></div> -->
        <!-- <p> Here all the details will be here of user</p> -->
        <ul>
            <!--  <li>Email : <?= $this->session->userdata('user_email');?></li> -->
            <li>Mobile :
                <?= $this->session->userdata('user_mobile');?>
            </li>
            <li>Employee Code :
                <?= $this->session->userdata('user_emp_code');?>
            </li>
            <li>Last Login :
                <?= $this->session->userdata('last_login');?>
            </li>
        </ul>
        <div class="divider top-10"></div>
        <div class="logout">
            <a href="<?=base_url('login/logout')?>" class=" button button-full button-m button-margins round-small bg-red2-dark bottom-30">Log out</a>
        </div>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>