<style>

    @media print
    {
        #printable { 
            display: block; 
            width: 920px;
        }
        #left { display: none; }
        #non-printable { display: none; }
        #footer { display: none; }
    }
</style>
         <!--PAGE CONTENT -->
         <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">สืบค้นข้อมูล</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="non-printable">
                        <!-- <div class="panel-heading">
                            Basic Elements
                        </div> -->
                        <div class="panel-body">
                            <div class="row">
                                <?php echo form_open('search', 'role="form" id="block-validate"'); ?>
                                    <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>คำค้น</label>
                                            <input class="form-control" name="keyword" id="keyword" placeholder="keyword" value="<?php echo set_value('keyword'); ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>หมวดหมู่วัตถุ</label>
                                            <select name="artifact_type[]" id="artifact_type[]" data-placeholder="เลือกหมวดหมู่วัตถุ" multiple class="form-control chzn-select  chzn-rtl" >
                                            <?php 
                                            foreach ($data_artifact_type as $row2){
                                            ?>
                                                <option value="<?=$row2['artifact_type_name']?>"><?=$row2['artifact_type_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>วัสดุ</label>
                                            <select name="material[]" id="material[]" data-placeholder="เลือกวัสดุ" multiple class="form-control chzn-select  chzn-rt" >
                                            <?php 
                                            foreach ($data_material as $row2){
                                            ?>
                                                <option value="<?=$row2['material_name']?>"><?=$row2['material_name']?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>รูปแบบศิลปะ</label>
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
                                    <!-- right -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>ค้นจาก</label>
                                            <select name="in_field" id="in_field" class="validate[required] form-control">
                                                <option value="artifact_code" <?php if(set_value('in_field')=='artifact_code'){ echo 'selected="selected"'; }?> >เลขวัตถุ</option>
                                                <option value="old_number" <?php if(set_value('in_field')=='old_number'){ echo 'selected="selected"'; }?>>เลขเดิม</option>
                                                <option value="artifact_name" <?php if(set_value('in_field')=='artifact_name'){ echo 'selected="selected"'; }?>>ชื่อวัตถุ</option>
                                                <option value="period" <?php if(set_value('in_field')=='period'){ echo 'selected="selected"'; }?>>อายุสมัย</option>
                                                <option value="designer" <?php if(set_value('in_field')=='designer'){ echo 'selected="selected"'; }?>>ฝีมือช่าง/designer</option>
                                                <option value="implement" <?php if(set_value('in_field')=='implement'){ echo 'selected="selected"'; }?>>การนำไปใช้งาน</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>อาคาร</label>
                                            <select name="location_id" id="location_id" class="validate[required] form-control" onchange="selectlocation(this.value);">
                                                <option value="0">เลือกอาคาร</option>
                                            <?php 
                                            foreach ($data_location  as $row2){
                                            ?>
                                                <option value="<?=$row2['location_id']?>"><?=$row2['location_name']?></option>
                                            <?php }?>
                                            </select>
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
                                            <label>ห้อง</label>
                                            <select name="sub_location" id="sub_location" class="validate[required] form-control">
                                                <option value="0">- ไม่มีข้อมูล -</option>
                                                
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>ตู้/ชั้น</label>
                                            <input name="other_location" id="other_location" class="form-control" placeholder="ตู้/ชั้น">
                                        </div> -->
                                        <div class="form-group" style="float:right;">
                                            <button type="submit" class="btn btn-default">ค้นหา</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>







                    

                    <div class="col-lg-12" id="printable">
                        <form action="<?php echo site_url()?>search/createxls" method="post" id="export-form">
                            <div id="non-printable">
                                Download : 
                                <textarea id='exportsql' name='exportsql' style="display:none;"><?php echo $where;?></textarea>
                                <button type="button" class="btn btn-primary btn-circle" onclick="window.print();" title="Print"><i class="icon-print"></i></button>
                                <button class="btn btn-success btn-circle" title="Excel"><i class="icon-download-alt"></i></button><br><br>
                            </div>
                        </form> 
                        <div class="panel panel-default">
                            
                            <div class="panel-heading">
                                ข้อมูล  จำนวนทั้งสิ้น <?php echo count($data); เรคอร์ด?>
                            </div>
                            <div class="panel-body">
                                                
                                <div class="table-responsive">
                                                
                                    <table class="table table-striped table-bordered table-hover" id="">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>เลขวัตถุ</th>
                                                <th>เลขเดิม</th>
                                                <th>ชื่อวัตถุ</th>
                                                <th>หมวดหมู่วัตถุ</th>
                                                <th>วัสดุ</th>
                                                <th>รูปแบบศิลปะ</th>
                                                <th>อาคาร</th>
                                                <th>ห้อง</th>
                                                <!-- <th>อายุสมัย</th> -->
                                                <th>จำนวน</th>
                                                <th  id="non-printable">#</th>
                                            </tr>
                                        </thead>
                                                        
                                        <tbody>
                                            <?php 
                                                $i=0;
                                                foreach ($data as $row){
                                                $i++;
                                            ?>
                                            <tr <?php if($i%2==1){ echo 'class="success"'; }?>>
                                                <td><?=$i?></td>
                                                <td><?=$row['artifact_code']?></td>
                                                <td><?=$row['old_number']?></td>
                                                <td><?=$row['artifact_name']?></td>
                                                <td><?=$row['artifact_type']?></td>
                                                <td><?=$row['material']?></td>
                                                <td><?=$row['cat_name']?></td>
                                                <td><?=$row['location_name']?></td>
                                                <?php 
                                                $room = '';
                                                if(isset($data_sub_location)){
                                                    foreach ($data_sub_location as $row_sub_location){
                                                        if($row_sub_location['location_id'] == $row['sub_location_id']){
                                                            $room = $row_sub_location['location_name'];
                                                        }
                                                    }
                                                }
                                                ?>
                                                <td><?php echo $room ;?></td>
                                                <!-- <td><?=$row['history']?></td> -->
                                                <td><?=$row['quantity']?></td>
                                                <td  id="non-printable">
                                                    <a onclick="window.location='<?php echo base_url(); ?>search/detail/<?=$row['artifact_id']?>'">
                                                        <button class="btn btn-primary"><i class="icon-search icon-white"></i> ดูรายละเอียด</button>
                                                    </a> 
                                                </td>
                                            </tr>
                                                <?php
                                                    }?>
                                        </tbody>

                                    </table>

                                </div>
                                            
                            </div>
                        </div>
                        <form action="<?php echo site_url()?>search/createxls" method="post" id="export-form">
                            <div id="non-printable">
                                Download : 
                                <textarea id='exportsql' name='exportsql' style="display:none;"><?php echo $where;?></textarea>
                                <button type="button" class="btn btn-primary btn-circle" onclick="window.print();" title="Print"><i class="icon-print"></i></button>
                                <button class="btn btn-success btn-circle" title="Excel"><i class="icon-download-alt"></i></button><br><br>
                            </div>
                        </form> 
                    </div>





                
            </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
