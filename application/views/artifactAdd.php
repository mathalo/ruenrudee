
        <!--PAGE CONTENT -->
        <div id="content">
        
             <div class="inner">  
                 <div class="row">
                 <div class="col-lg-12">
                <h1 > เพิ่มข้อมูลวัตถุ ศิลปวัตถุ </h1> 
                </div> 
                </div>
                <hr />
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box">
                             <header> 
                                 <div class="icons"><i class="icon-th-large"></i></div>
                                 <h5>เพิ่มข้อมูลวัตถุ ศิลปวัตถุ</h5>
                                 <!-- <div class="toolbar">
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
                                 </div> -->

                             </header>
                             <div id="collapseOne" class="accordion-body collapse in body">
                                <?php echo form_open_multipart('artifact/add', 'class="form-horizontal" id="block-validate" enctype="multipart/form-data"'); ?>
                                 <!-- <form action="#" method="post" class="form-horizontal" id="block-validate"> -->
                                 <div class="form-group">
                                    <label class="control-label col-lg-4">&nbsp;</label>
                                    <div class="col-lg-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <br>
                                            <div id="fileupload" class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="filename"/></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                            <script>
                                                var img = document.createElement('IMG');

                                                img.setAttribute('src', '<?php echo base_url(); ?>uploads/artifact/default.png'); 
                                                img.setAttribute('class', 'mark');

                                                document.getElementById("fileupload").appendChild(img);
                                             </script>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">เลขลำดับ</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="artifact_no" name="artifact_no" value="<?php echo set_value('artifact_no'); ?>"class="form-control" />
                                             <?php echo form_error('artifact_no', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">เลขประจำวัตถุ</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="artifact_code" name="artifact_code" value="<?php echo set_value('artifact_code'); ?>"class="form-control" />
                                             <?php echo form_error('artifact_code', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">เลขเดิม</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="old_number" name="old_number" value="<?php echo set_value('old_number'); ?>"class="form-control" />
                                             <?php echo form_error('old_number', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ชื่อวัตถุ</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="artifact_name" name="artifact_name" value="<?php echo set_value('artifact_name'); ?>"class="form-control" />
                                             <?php echo form_error('artifact_name', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4">หมวดหมู่วัตถุ</label>
                                    
                                        <div class="col-lg-8">
                                            <select name="artifact_type[]" id="artifact_type[]" data-placeholder="เลือกหมวดหมู่วัตถุ" multiple class="form-control chzn-select  chzn-rtl" style="width: 350px; height:15px;">
                                            <?php 
                                            foreach ($data_artifact_type as $row2){
                                            ?>
                                                <option value="<?=$row2['artifact_type_name']?>"><?=$row2['artifact_type_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">วัสดุ</label>
                                    
                                        <div class="col-lg-8">
                                            <select name="material[]" id="material[]" data-placeholder="เลือกวัสดุ" multiple class="form-control chzn-select  chzn-rtl" style="width: 350px; height:15px;">
                                            <?php 
                                            foreach ($data_material as $row2){
                                            ?>
                                                <option value="<?=$row2['material_name']?>"><?=$row2['material_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">รูปแบบศิลปะ</label>
                                        <div class="col-lg-4">
                                            <select name="cat_id" id="cat_id" class="validate[required] form-control">
                                                <option value="0">เลือกรูปแบบศิลปะ</option>
                                            <?php 
                                            foreach ($data_category  as $row2){
                                            ?>
                                                <option value="<?=$row2['cat_id']?>"><?=$row2['cat_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">จำนวน</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="quantity" name="quantity" value="0"class="form-control" />
                                             
                                         </div>
                                     </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">อายุสมัย</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="period" name="period" value="<?php echo set_value('period'); ?>"class="form-control" />
                                             <?php echo form_error('period', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">ขนาด</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="dimension_a" name="dimension_a" value="<?php echo set_value('dimension_a'); ?>"class="form-control" />
                                             <?php echo form_error('dimension_a', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <!-- <div class="form-group">
                                         <label class="control-label col-lg-4">ขนาด (b)</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="dimension_b" name="dimension_b" value="<?php echo set_value('dimension_b'); ?>"class="form-control" />
                                             <?php echo form_error('dimension_b', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div> -->
                                     
                                    <div class="form-group">
                                        <label class="control-label col-lg-4" >คำอธิบายลักษณะ</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="description" name="description"><?php echo set_value('description'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ฝีมือช่าง/designer</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="designer" name="designer" value="<?php echo set_value('designer'); ?>"class="form-control" />
                                             <?php echo form_error('designer', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >ประวัติ</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="history" name="history"><?php echo set_value('history'); ?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >condition</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="condition" name="condition"><?php echo set_value('condition'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">อาคาร</label>
                                        <div class="col-lg-4">
                                            <select name="location_id" id="location_id" class="validate[required] form-control" onchange="selectlocation(this.value);">
                                                <option value="0">เลือกอาคาร</option>
                                            <?php 
                                            foreach ($data_location  as $row2){
                                            ?>
                                                <option value="<?=$row2['location_id']?>"><?=$row2['location_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div> 
                                    <script>
                                            function selectlocation(val){
                                                // alert('<?php echo base_url()."content/getsublocation/";?>'+val);
                                                if(val !=''){
                                                    $.ajax({
                                                        type: 'POST',
                                                        async: false,
                                                        url: '<?php echo base_url()."content/getsublocation/";?>'+val, 
                                                        
                                                        success: function(resp) {
                                                            console.log( resp );
                                                            if(resp != ''){
                                                                $('#sub_location').empty().html( resp );
                                                            }
                                                        },
                                                        dataType: 'json'
                                                    });
                                                }
                                                return false;
                                            }
                                        </script>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">ห้อง</label>
                                        <div class="col-lg-4">
                                        <select name="sub_location" id="sub_location" class="validate[required] form-control">
                                            <option value="0">- ไม่มีข้อมูล -</option>
                                            
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ตู้/ชั้น</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="other_location" name="other_location" value="<?php echo set_value('other_location'); ?>"class="form-control" />
                                             <?php echo form_error('other_location', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">tag_location</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="tag_location" name="tag_location" value="<?php echo set_value('tag_location'); ?>"class="form-control" />
                                             <?php echo form_error('tag_location', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">revised</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="revised" name="revised" value="<?php echo set_value('revised'); ?>"class="form-control" />
                                             <?php echo form_error('revised', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >conservation</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="conservation" name="conservation"><?php echo set_value('conservation'); ?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="tags" class="control-label col-lg-4">Clean</label>
                                        <div class="col-lg-8">
                                            <input name="clean[]" id="tags" value="" class="form-control" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-lg-4" >implement</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="implement" name="implement"><?php echo set_value('implement'); ?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">condition report by</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="condition_report_by" name="condition_report_by" value="<?php echo set_value('condition_report_by'); ?>"class="form-control" />
                                             <?php echo form_error('condition_report_by', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                    
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >note</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="note" name="note"><?php echo set_value('note'); ?></textarea>
                                        </div>
                                    </div>
                                     <!-- <div class="form-group"> 
                                         <label class="control-label col-lg-4">Status</label>
                                         <div class="col-lg-4">
                                            <div class="make-switch switch-small">
                                                <input type="checkbox" name="status" value="open" />
                                            </div>

                                         </div>
                                     </div> -->
                                     
                                     <div class="form-actions no-margin-bottom" style="text-align:center;">
                                         <input type="hidden" id="entry_by" name="entry_by" value="<?php echo $name; ?>"class="form-control" />
                                         <button  type="submit" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Artifact/'">บันทึก</button>
                                         <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Artifact/'">ยกเลิก</button>
                                     </div>
                                 <?php echo form_close(); ?>
                             </div>
                         </div>
                     </div>
                 </div>
                </div> 
            </div>
       <!--END PAGE CONTENT -->





