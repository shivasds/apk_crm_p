<?php
$nav = $this->uri->segment(1);

?>
<div class="footer-menu footer-4-icons footer-menu-center-icon">
            <a href="<?=base_url('search_callback');?>" class="<?= $this->uri->segment(1) == 'search_callback' ? 'active-nav' : '' ?>" onclick="showloader()"><i class="fa fa-search"></i><span>Search</span></a>
            <a href="<?php echo base_url().'dashboard/view_callbacks/'.$this->session->userdata('user_id'); ?>" data-type="user_important"><i class="fa fa-gift "></i><span>Important class</span></a>
            <a href="<?=base_url();?>" class="<?= $this->uri->segment(1) == '' ? 'active-nav' : '' ?>" onclick="showloader()"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="<?=base_url('callbacks');?>" class="<?= $this->uri->segment(1) == 'callbacks' ? 'active-nav' : '' ?>" onclick="showloader()"><i class="fa fa-history"></i><span>Calls</span></a>
            <!-- <a href="#"><i class="fa fa-bars"></i><span>Menu</span></a> -->
            <div class="clear"></div>
 </div>



