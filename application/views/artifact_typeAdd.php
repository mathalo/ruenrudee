<!--PAGE CONTENT -->
<div id="content">

     <div class="inner">  
         <div class="row">
         <div class="col-lg-12">
        <h1 > หมวดหมู่วัตถุ ศิลปวัตถุ </h1> 
        </div> 
        </div>
        <hr />
         <div class="row">
             <div class="col-lg-12"> 
                 <div class="box">
                     <header> 
                         <div class="icons"><i class="icon-th-large"></i></div>
                         <h5>หมวดหมู่วัตถุ ศิลปวัตถุ</h5>
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
                        <?php echo form_open('ArtifactType/add', 'class="form-horizontal" id="block-validate"'); ?>
                         <!-- <form action="#" method="post" class="form-horizontal" id="block-validate"> -->
                            <div class="form-group">
                                 <label class="control-label col-lg-4">ชื่อหมวดหมู่วัตถุ</label>
                                 <div class="col-lg-4">
                                     <input type="text" id="artifact_type_name" name="artifact_type_name" value="<?php echo set_value('artifact_type_name'); ?>"class="form-control" />
                                     <?php echo validation_errors('<div class="error"><label style="color: red;">', '</label></div>'); ?>
                                 </div>
                             </div>
                             <div class="form-group">
                                            <label class="control-label col-lg-4">หมวดหมู่หลัก</label>
                                            <div class="col-lg-4">
                                                <select name="parent_id" id="parent_id" class="validate[required] form-control">
                                                    <option value="0">Choose parent category</option>
                                                <?php 
                                                foreach ($data as $row){
                                                ?>
                                                    <option value="<?=$row['artifact_type_id']?>"><?=$row['artifact_type_name']?></option>
                                                <?php }?>
                                                </select>
                                            </div>
                                        </div>
                             <!-- <div class="form-group"> 
                                 <label class="control-label col-lg-4">Status</label>
                                 <div class="col-lg-4">
                                    <div class="make-switch switch-small">
                                        <input type="checkbox" checked="checked" name="status" value="open" />
                                    </div>

                                 </div>
                             </div> -->
                             
                             <div class="form-actions no-margin-bottom" style="text-align:center;">
                                <button  type="submit" id="example-10" class="btn btn-primary ForMargin" >บันทึก</button>
                                <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>ArtifactType/'">ยกเลิก</button>
                                 
                                
                             </div>
                         <?php echo form_close(); ?>
                     </div>
                 </div>
             </div>
         </div>
        </div> 
    </div>
<!--END PAGE CONTENT -->





