
        <!--PAGE CONTENT -->
        <div id="content">
        
             <div class="inner">  
                 <div class="row">
                 <div class="col-lg-12">
                <h1 > เพิ่มข้อมูลสมาชิก </h1> 
                </div> 
                </div>
                <hr />
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box">
                             <header> 
                                 <div class="icons"><i class="icon-th-large"></i></div>
                                 <h5>เพิ่มข้อมูลสมาชิก</h5>
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
                                <?php echo form_open_multipart('Members/add', 'class="form-horizontal" id="block-validate"'); ?>
                                 <!-- <form action="#" method="post" class="form-horizontal" id="block-validate"> -->
                                 <div class="form-group">
                                    <label class="control-label col-lg-4">&nbsp;</label>
                                    <div class="col-lg-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <br>
                                            <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-success"><span class="fileupload-new">เลือกรูปภาพ</span><span class="fileupload-exists">เปลี่ยนรูป</span><input type="file" name="filename"/></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">ลบ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ชื่อสมาชิก</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>"class="form-control" />
                                             <?php echo form_error('name', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">Username:</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>"class="form-control" />
                                             <?php echo form_error('username', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                            <label class="control-label col-lg-4">Password</label>

                                            <div class="col-lg-4">
                                                <input type="password" id="password" name="password" class="form-control" />
                                                <?php echo form_error('password', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Confirm Password</label>

                                            <div class="col-lg-4">
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                                                <?php echo form_error('confirm_password', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <label class="control-label col-lg-4">อีเมล์:</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>"class="form-control" />
                                             <?php echo form_error('email', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" >ที่อยู่</label>
                                            <div class="col-lg-4">
                                            <textarea class="form-control" rows="3" id="address" name="address"></textarea>
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <label class="control-label col-lg-4">เบอร์โทรศัพท์:</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="telephone" name="telephone" value="<?php echo set_value('telephone'); ?>"class="form-control" />
                                             
                                         </div>
                                     </div>
                                     
                                     <div class="form-group"> 
                                         <label class="control-label col-lg-4">สิทธ์การใช้งาน</label>
                                         <div class="col-lg-4">
                                            <select name="permission" id="permission" class="form-control">  
                                                <option value="1">Superadmin</option>
                                                <option value="5">Admin</option>
                                                <option value="10">Content</option>
                                                <option value="11">Guess</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="form-group"> 
                                         <label class="control-label col-lg-4">Status</label>
                                         <div class="col-lg-4">
                                            <div class="make-switch switch-small">
                                                <input type="checkbox" name="status" value="open" />
                                            </div>

                                         </div>
                                     </div>
                                     
                                     <div class="form-actions no-margin-bottom" style="text-align:center;">
                                         
                                         <button  type="submit" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Members/'">บันทึก</button>
                                         <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Members/'">ยกเลิก</button>
                                     </div>
                                 <?php echo form_close(); ?>
                             </div>
                         </div>
                     </div>
                 </div>
                </div> 
            </div>
       <!--END PAGE CONTENT -->





