
        <!--PAGE CONTENT -->
        <div id="content">
        
             <div class="inner">
                 <div class="row">
                 <div class="col-lg-12">
                <h1 > เปลี่ยนรหัสผ่าน </h1>
                </div>
                </div>
                <hr />
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box">
                             <header>
                                 <div class="icons"><i class="icon-th-large"></i></div>
                                 <h5>เปลี่ยนรหัสผ่าน</h5>
                                 <div class="toolbar">
                                     <ul class="nav">
                                         <li>
                                             <div class="btn-group">
                                                 <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                                     href="#collapseOne">
                                                     <i class="icon-chevron-up"></i>
                                                 </a>
                                                 <button class="btn btn-xs btn-danger close-box">
                                                     <i class="icon-remove"></i>
                                                 </button>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>

                             </header>
                             <div id="collapseOne" class="accordion-body collapse in body">
                                 <form action="#" method="post" class="form-horizontal" id="block-validate">
                                 
                                    <?php 
                                        foreach ($data as $row){
                                            echo '<input type="hidden" id="db_password" name="db_password" value="'.$row['password'].'" />';
                                        
                                     ?>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">รหัสผ่านเดิม</label>
                                         <div class="col-lg-4">
                                             <input type="password" id="old_password" name="old_password" value="" class="form-control" />
                                             <?php echo form_error('old_password', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     
                                     <div class="form-group">
                                            <label class="control-label col-lg-4">รหัสผ่านใหม่</label>

                                            <div class="col-lg-4">
                                                <input type="password" id="password" name="password" class="form-control" />
                                                <?php echo form_error('password', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">ยืนยันรหัสผ่าน</label>

                                            <div class="col-lg-4">
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                                                <?php echo form_error('confirm_password', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                            </div>
                                        </div>

                                     <div class="form-actions no-margin-bottom" style="text-align:center;">
                                        <button  type="submit" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Members/'">บันทึก</button>
                                        <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Members'">ยกเลิก</button>
                                     </div>
                                    <?php
                                     }
                                     ?>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                                     
                
                  

                 
                 </div>
                 
                 
                 

             </div>
       <!--END PAGE CONTENT -->





