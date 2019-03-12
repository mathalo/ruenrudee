<!-- MENU SECTION -->
    <div id="left">
            

            <ul id="menu" class="collapse">
                
                <?php if($this->session->logged_in['permission']!=''){ ?>
                
                    <?php if($this->session->logged_in['permission']=='superadmin' || $this->session->logged_in['permission']=='admin' || $this->session->logged_in['permission']=='content' || $this->session->logged_in['permission']=='guess'){ ?>

                    <li class="panel">
                        <a href="<?php echo base_url(); ?>search" >
                            <i class="icon-tasks"></i> ค้นข้อมูล
                        </a>                   
                    </li>   

                    <?php if($this->session->logged_in['permission']=='superadmin' || $this->session->logged_in['permission']=='admin' || $this->session->logged_in['permission']=='content'){ ?>

                    <li class="panel">
                        <a href="<?php echo base_url(); ?>Artifact" >
                            <i class="icon-tasks"></i> ข้อมูลโบราณวัตถุ
                        </a>                   
                    </li>
                    <?php } //end superadmin admin content ?>
                    <?php if($this->session->logged_in['permission']=='superadmin' || $this->session->logged_in['permission']=='admin'){ ?>
                    
                    <li class="panel ">
                        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                            <i class="icon-tasks"> </i> หมวดหมู่วัตถุ   
                            <span class="pull-right">
                            <i class="icon-angle-left"></i>
                            </span>
                        </a>
                        <ul class="collapse" id="component-nav">
                            <li class=""><a href="<?php echo base_url(); ?>ArtifactType"><i class="icon-angle-right"></i> ทั้งหมด </a></li>
                            <?php 
                                foreach ($menu2 as $mrow){
                            ?>
                            <li class=""><a href="<?php echo base_url(); ?>ArtifactType/type/<?php echo $mrow['artifact_type_id'];?>"><i class="icon-angle-right"></i> <?php echo $mrow['artifact_type_name'];?></a></li>
                                <?php }?>
                        </ul>
                    </li>
                    <li class="panel">
                        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                            <i class="icon-tasks"></i> แบบศิลปะ
        
                            <span class="pull-right">
                                <i class="icon-angle-left"></i>
                            </span>
                        </a>
                        <ul class="collapse" id="chart-nav">
                            <li class=""><a href="<?php echo base_url(); ?>Categories"><i class="icon-angle-right"></i> ทั้งหมด </a></li>
                            <?php 
                                foreach ($menu as $mrow){
                            ?>
                            <li class=""><a href="<?php echo base_url(); ?>Categories/type/<?php echo $mrow['cat_id'];?>"><i class="icon-angle-right"></i> <?php echo $mrow['cat_name'];?></a></li>
                                <?php }?>
                        </ul>
                    </li>


                    
                    <li class="panel">
                        <a href="<?php echo base_url(); ?>Material" >
                            <i class="icon-tasks"></i> ประเภทวัสดุ
                        </a>                   
                    </li>
                    <!-- <li class="panel">
                        <a href="<?php echo base_url(); ?>ArtifactType" >
                            <i class="icon-tasks"></i> หมวดหมู่วัตถุ
                        </a>                   
                    </li> -->
                    <li class="panel">
                        <a href="<?php echo base_url(); ?>Event" >
                            <i class="icon-tasks"></i> เหตุการณ์
                        </a>                   
                    </li>
                    <li class="panel">
                        <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#location-nav">
                            <i class="icon-tasks"></i> อาคาร
        
                            <span class="pull-right">
                                <i class="icon-angle-left"></i>
                            </span>
                        </a>
                        <ul class="collapse" id="location-nav">
                            <li class=""><a href="<?php echo base_url(); ?>building"><i class="icon-angle-right"></i> ทั้งหมด </a></li>
                            <?php 
                                foreach ($menu3 as $mrow){
                            ?>
                            <li class=""><a href="<?php echo base_url(); ?>building/type/<?php echo $mrow['location_id'];?>"><i class="icon-angle-right"></i> <?php echo $mrow['location_name'];?></a></li>
                                <?php }?>
                        </ul>
                    </li>
                    <li class="panel">
                        <a href="<?php echo base_url(); ?>location" >
                            <i class="icon-tasks"></i> ห้อง
                        </a>                   
                    </li>

                    <li class="panel">
                        <a href="<?php echo base_url(); ?>Profile" >
                            <i class="icon-tasks"></i> ข้อมูลส่วนตัว
                        </a>                   
                    </li>   
                    <?php } //end superadmin admin ?>
                    <?php } //end superadmin admin content guess?>
                <?php if($this->session->logged_in['permission']=='superadmin'){ ?>
                    <li class="panel">
                        <a href="<?php echo base_url(); ?>Members" >
                            <i class="icon-tasks"></i> ข้อมูลสมาชิก
                        </a>                   
                    </li>   
                <?php }?>

                <li><a href="<?php echo base_url(); ?>Logout"><i class="icon-signin"></i> ออกจากระบบ </a></li>
                <?php }else{ ?>                    
                <li><a href="<?php echo base_url(); ?>Login"><i class="icon-signin"></i> เข้าสู่ระบบ </a></li>
                <?php }?>
            </ul>

        </div>
        <script>
        $(".panel").on("click", function(){
            $('#dataTables-example').dataTable().state.clear();
        });
        </script>
        <!--END MENU SECTION -->