
        <!--PAGE CONTENT -->
        <div id="content">
        
             <div class="inner">  
                 <div class="row">
                 <div class="col-lg-12">
                <h1 > แก้ไขข้อมูลวัตถุ ศิลปวัตถุ </h1> 
                </div> 
                </div>
                <hr />
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box">
                             <header> 
                                 <div class="icons"><i class="icon-th-large"></i></div>
                                 <h5>แก้ไขข้อมูลวัตถุ ศิลปวัตถุ</h5>
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
                                <?php //echo form_open_multipart('artifact/edit/'.$id, 'class="form-horizontal" id="block-validate"'); ?>
                                <form action="#" method="post" class="form-horizontal" id="block-validate" enctype="multipart/form-data">
                                 <?php 
                                    foreach ($data as $row){
                                ?>
                            <div class="form-group">
                                 <label class="control-label col-lg-4">&nbsp;</label>
                                 <div class="col-lg-8">
                                     <div  class="fileupload fileupload-new" data-provides="fileupload">
                                         <br>
                                         <div id="fileupload" class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                         <div>
                                             <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="filename"/></span>
                                             <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>

                                             <input type="hidden" id="fullpathimage" name="fullpathimage"  value="<?php echo base_url(); ?>uploads/artifact/<?php echo $row['image']; ?>">
                                             <input type="hidden" id="old_filename" name="old_filename"  value="<?php echo $row['image']; ?>">
                                             <script>
                                                 var img = document.createElement('IMG');

                                                 var fullpathimage = document.getElementById('fullpathimage').value;
                                                 var old_filename = document.getElementById('old_filename').value;
                                                 
                                                 img.setAttribute('src', '<?php echo base_url(); ?>uploads/artifact/'+old_filename);
                                                 if(old_filename==''){ 
                                                     img.setAttribute('src', '<?php echo base_url(); ?>uploads/artifact/default.png'); 
                                                 }
                                                 img.setAttribute('class', 'mark');

                                                 document.getElementById("fileupload").appendChild(img);
                                             </script>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">เลขลำดับ</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="artifact_no" name="artifact_no" value="<?=$row['artifact_no']?>"class="form-control" />
                                             <?php echo form_error('artifact_no', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">เลขวัตถุ</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="artifact_code" name="artifact_code" value="<?=$row['artifact_code']?>"class="form-control" />
                                             <?php echo form_error('artifact_code', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">ชื่อวัตถุ</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="artifact_name" name="artifact_name" value="<?=$row['artifact_name']?>"class="form-control" />
                                             <?php echo form_error('artifact_name', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">เลขเดิม</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="old_number" name="old_number" value="<?=$row['old_number']?>"class="form-control" />
                                             <?php echo form_error('old_number', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                    
                                     <div class="form-group">
                                        <label class="control-label col-lg-4">หมวดหมู่</label>
                                    
                                        <div class="col-lg-8">
                                            <select name="artifact_type[]" id="artifact_type[]" data-placeholder="เลือกหมวดหมู่วัตถุ" multiple class="form-control chzn-select  chzn-rtl" style="width: 350px; height:15px;">
                                            <?php 
                                            foreach ($data_artifact_type as $row2){
                                            ?>
                                                <option value="<?=$row2['artifact_type_name']?>" <?php if(strpos($row['artifact_type'], $row2['artifact_type_name']) !== false){ echo "selected"; } ?> ><?=$row2['artifact_type_name']?></option>
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
                                                <option value="<?=$row2['material_name']?>" <?php if(strpos($row2['material_name'], $row['material']) !== false){ echo "selected"; } ?> ><?=$row2['material_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ขนาด(เซนติเมตร)</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="dimension_a" name="dimension_a" value="<?=$row['dimension_a']?>"class="form-control" />
                                             <?php echo form_error('dimension_a', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">แบบศิลปะ</label>
                                        <div class="col-lg-4">
                                            <select name="cat_id" id="cat_id" class="validate[required] form-control">
                                                <option value="0">เลือกรูปแบบศิลปะ</option>
                                            <?php 
                                            foreach ($data_category  as $row2){
                                            ?>
                                                <option value="<?=$row2['cat_id']?>" <?php if($row2['cat_id']==$row['cat_id']){ echo "selected"; } ?>><?=$row2['cat_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">อายุสมัย</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="period" name="period" value="<?=$row['period']?>"class="form-control" />
                                             <?php echo form_error('period', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">ฝีมือช่าง</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="designer" name="designer" value="<?=$row['designer']?>"class="form-control" />
                                             <?php echo form_error('designer', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >ประวัติ</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="history" name="history"><?=$row['history']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4" >ลักษณะ</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="description" name="description"><?=$row['description']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">จำนวน</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="quantity" name="quantity" value="<?=$row['quantity']?>"class="form-control" />
                                             
                                         </div>
                                     </div>
                                    
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >สภาพ</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="condition" name="condition"><?=$row['condition_']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">สถานที่จัดเก็บ อาคาร</label>
                                        <div class="col-lg-4">
                                            <select name="location_id" id="location_id" class="validate[required] form-control" onchange="selectlocation(this.value);">
                                                <option value="0">เลือกอาคาร</option>
                                            <?php 
                                            foreach ($data_location  as $row2){
                                            ?>
                                                <option value="<?=$row2['location_id']?>" <?php if($row2['location_id']==$row['location_id']){ echo "selected"; } ?>><?=$row2['location_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <script>
                                            function selectlocation(val){
                                                // alert('<?php echo base_url()."search/getsublocation/";?>'+val);
                                                if(val !=''){
                                                    $.ajax({
                                                        type: 'POST',
                                                        async: false,
                                                        url: '<?php echo base_url()."search/getsublocation/";?>'+val, 
                                                        
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
                                        <label class="control-label col-lg-4">ห้องจัดเก็บ</label>
                                        <div class="col-lg-4">
                                        <select name="sub_location" id="sub_location" class="validate[required] form-control">
                                            
                                            <option value="0">เลือกห้อง</option>
                                            
                                            <?php 
                                            foreach ($sub_data_location  as $row3){
                                            ?>
                                               <option value="<?=$row3['location_id']?>" <?php if($row3['location_id']==$row['sub_location_id']){ echo "selected"; } ?>><?=$row3['location_name']?></option>
                                            <?php }?>

                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">ตู้/ชั้น</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="other_location" name="other_location" value="<?=$row['other_location']?>"class="form-control" />
                                             <?php echo form_error('other_location', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >การนำไปใช้</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="implement" name="implement"><?=$row['implement']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label col-lg-4">การซ่อมสงวนรักษา</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="revised" name="revised" value="<?=$row['revised']?>"class="form-control" />
                                             <?php echo form_error('revised', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">Tag location</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="tag_location" name="tag_location" value="<?=$row['tag_location']?>"class="form-control" />
                                             <?php echo form_error('tag_location', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >การอนุรักษ์</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="conservation" name="conservation"><?=$row['conservation']?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="tags" class="control-label col-lg-4">การทำความสะอาด</label>
                                        <div class="col-lg-8">
                                            <input name="clean[]" id="tags" value="<?=$row['clean']?>" class="form-control" />
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                         <label class="control-label col-lg-4">การบันทึกสภาพวัตถุ</label>
                                         <div class="col-lg-4">
                                             <input type="text" id="condition_report_by" name="condition_report_by" value="<?=$row['condition_report_by']?>"class="form-control" />
                                             <?php echo form_error('condition_report_by', '<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-4" >หมายเหตุ</label>
                                        <div class="col-lg-4">
                                        <textarea class="form-control" rows="3" id="note" name="note"><?=$row['note']?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group"> 
                                         <label class="control-label col-lg-4">สถานะข้อมูล</label>
                                         <div class="col-lg-4">
                                            <div class="make-switch switch-small">
                                            <input <?php if($row['status']=='open'){ echo 'checked="checked"';}?> type="checkbox" name="status" value="open" />
                                            </div>

                                         </div>
                                     </div>
                                     
                                     <div class="form-actions no-margin-bottom" style="text-align:center;">
                                        <input type="hidden" id="registra_approved" name="registra_approved" value="<?=$name?>"class="form-control" />
                                         <button  type="submit" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Artifact/'">บันทึก</button>
                                         <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Artifact/'">ยกเลิก</button>
                                     </div>
                                    <?php }?>
                                 <?php echo form_close(); ?>
                             </div>
                         </div>
                     </div>
                 </div>
                </div> 
            </div>
       <!--END PAGE CONTENT -->





