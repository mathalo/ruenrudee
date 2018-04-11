
        <!--PAGE CONTENT -->
        <div id="content">
        
             <div class="inner">
                 <div class="row">
                 <div class="col-lg-12">
                <h1 > แก้ไขชื่อสถานที่จัดเก็บ </h1>
                </div>
                </div>
                <hr />
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box">
                             <header>
                                 <div class="icons"><i class="icon-th-large"></i></div>
                                 <h5>แก้ไขชื่อสถานที่จัดเก็บ</h5>
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
                                    ?>
                                     <div class="form-group">
                                            <label class="control-label col-lg-4">สถานที่หลัก</label>
                                            <div class="col-lg-4">
                                                <select name="parent_id" id="parent_id" class="validate[required] form-control">
                                                    <option value="0">Choose parent location</option>
                                                <?php 
                                                foreach ($data_location as $row2){
                                                ?>
                                                    <option <?php if($row['parent_id']==$row2['location_id']){ echo "selected='selected'"; } ?> value="<?=$row2['location_id']?>"><?=$row2['location_name']?></option>
                                                <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ชื่อสถานที่</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="location_name" name="location_name" value="<?=$row['location_name']?>" class="form-control" />
                                             <?php echo validation_errors('<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <!-- <div class="form-group">
                                         <label class="control-label col-lg-4">Status</label>
                                         <div class="col-lg-4">
                                            <div class="make-switch switch-small">
                                                <input type="checkbox" <?php if($row['status']=="open"){ echo 'checked="checked"';} ?> name="status" value="open" />
                                            </div>

                                         </div>
                                     </div> -->
                                     <?php
                                        }
                                     ?>
                                     <div class="form-actions no-margin-bottom" style="text-align:center;">
                                     <button  type="submit" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Location/'">บันทึก</button>
                                     <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Location/'">ยกเลิก</button>
                                     </div>

                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                                     
                
                  

                 
                 </div>
                 
                 
                 

             </div>
       <!--END PAGE CONTENT -->





