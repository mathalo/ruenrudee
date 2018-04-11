
        <!--PAGE CONTENT -->
        <div id="content">
        
             <div class="inner">  
                 <div class="row">
                 <div class="col-lg-12">
                <h1 > ข้อมูลส่วนตัว</h1> 
                </div> 
                </div>
                <hr />
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box">
                             <header> 
                                 <div class="icons"><i class="icon-th-large"></i></div>
                                 <h5>ข้อมูลส่วนตัว</h5>
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
                             <?php //echo form_open_multipart('Members/edit', 'class="form-horizontal" id="block-validate"'); ?>
                             <form action="#" method="post" class="form-horizontal" id="block-validate" enctype="multipart/form-data">
                                <?php 
                                    foreach ($data as $row){
                                ?>
                                    <!-- <form action="#" method="post" class="form-horizontal" id="block-validate"> -->
                                 <div class="form-group">
                                    <label class="control-label col-lg-4">&nbsp;</label>
                                    <div class="col-lg-8">
                                        <div  class="fileupload fileupload-new" data-provides="fileupload">
                                            <br>
                                            <div id="fileupload" class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="filename"/></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>

                                                <input type="hidden" id="fullpathimage" name="fullpathimage"  value="<?php echo base_url(); ?>uploads/member/<?php echo $row['image']; ?>">
                                                <input type="hidden" id="old_filename" name="old_filename"  value="<?php echo $row['image']; ?>">
                                                <script>
                                                    var img = document.createElement('IMG');

                                                    var fullpathimage = document.getElementById('fullpathimage').value;
                                                    var old_filename = document.getElementById('old_filename').value;
                                                    
                                                    img.setAttribute('src', '<?php echo base_url(); ?>uploads/member/'+old_filename);
                                                    if(old_filename==''){ 
                                                        img.setAttribute('src', '<?php echo base_url(); ?>uploads/member/default.png'); 
                                                    }
                                                    img.setAttribute('class', 'mark');

                                                    document.getElementById("fileupload").appendChild(img);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ชื่อสมาชิก</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="name" name="name" value="<?=$row['name']?>"class="form-control" />
                                             <?php echo form_error('name', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">Username:</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="username2" disabled name="username2" value="<?=$row['username']?>"class="form-control" />
                                             <input type="hidden" id="username" name="username" value="<?=$row['username']?>"class="form-control" />
                                             <?php echo form_error('username', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                            <label class="control-label col-lg-4">Password</label>

                                            <div class="col-lg-4">
                                                <a href="<?php echo base_url(); ?>Profile/cpassword/<?php echo $row['member_id'];?>">Change Password!!!</a>
                                                <input type="hidden" id="password" name="password" value="<?=$row['password']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <label class="control-label col-lg-4">อีเมล์:</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="email" name="email" value="<?=$row['email']?>"class="form-control" />
                                             <?php echo form_error('email', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" >ที่อยู่</label>
                                            <div class="col-lg-4">
                                            <textarea class="form-control" rows="3" id="address" name="address"><?=$row['address']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                         <label class="control-label col-lg-4">เบอร์โทรศัพท์:</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="telephone" name="telephone" value="<?=$row['telephone']?>"class="form-control" />
                                             
                                         </div>
                                     </div>
                                     

                                     <!-- <div class="form-group"> 
                                         <label class="control-label col-lg-4">Status</label>
                                         <div class="col-lg-4">
                                            <div class="make-switch switch-small">
                                                <input <?php if($row['status']=='open'){ echo 'checked="checked"';}?> type="checkbox" name="status" value="open" />
                                            </div>

                                         </div>
                                     </div> -->
                                     
                                     <div class="form-actions no-margin-bottom" style="text-align:center;">
                                         
                                         <button  type="submit" id="example-10" class="btn btn-primary ForMargin" >บันทึก</button>
                                         <!-- <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Members/'">ยกเลิก</button> -->
                                     </div>
                                 <?php 
                                    }
                                 echo form_close(); ?>
                             </div>
                         </div>
                     </div>
                 </div>
                </div> 
            </div>
       <!--END PAGE CONTENT -->





