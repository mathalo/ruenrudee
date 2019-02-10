<?php

function dirlist($dir, $bool = "dirs"){
    $truedir = $dir;
    
    if($bool == "files"){ // dynamic function based on second pram
       $direct = 'is_dir'; 
    }elseif($bool == "dirs"){
       $direct = 'is_file';
    }
    if(is_dir($dir)){
        $dir = scandir($dir);
        foreach($dir as $k => $v){
           if(($direct($truedir.$dir[$k])) || $dir[$k] == '.' || $dir[$k] == '..' || $dir[$k] == 'thumbnail'){
              unset($dir[$k]);
           }
        }
        $dir = array_values($dir);
        return $dir;
    }
    return 0;
 }
?>   
<style type="text/css">

body{
    width: 100%;
    height: 100%;
    background-color: lightgray;
}
#gallery img{
    width: 120px;
    height: 120px;
    vertical-align: middle;
}
#gallery{
    width: 100%;
}
ul li {
    list-style: none;
    display: inline-block;
}




table {
    border-collapse: collapse;
    width: 100%;
}
thead{
    /*background:dodgerblue;*/
    background:#FF69B4;
}
thead th{
    height:25px;
    color:white;
}

th, td {
    text-align: left;
    padding: 8px;
}

tbody tr:nth-child(even){
    background:#f5f5f5;
}

tbody tr:hover{
    background:#ddd;
    color:#000;
}

</style>
        <!--PAGE CONTENT -->
        <div id="content">
        
             <div class="inner">  
                <!-- <div class="row">
                <div class="col-lg-12">
                <h1 > ข้อมูลวัตถุ ศิลปวัตถุ </h1> 
                </div> 
                </div>
                <hr /> -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="box">
                             <header> 
                                 <div class="icons"><i class="icon-th-large"></i></div>
                                 <h5>ข้อมูลวัตถุ ศิลปวัตถุ</h5>
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
                                
                                <form action="#" method="post" class="form-horizontal" id="block-validate" enctype="multipart/form-data">
                                 <?php 
                                    foreach ($data as $row){
                                ?>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">&nbsp;</label>
                                        <div class="col-lg-8">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <div class="col-lg-1" >
                                        </div>
                                         <div class="col-lg-10" >
                                            <table width="auto" >
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">รายละเอียดวัตถุ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td align="right" valign="top" width="20%"><label class="control-label">รูปภาพ :&nbsp;</label></td>
                                                        <td>
                                                            <div  class="fileupload fileupload-new" data-provides="fileupload">
                                                                <br>
                                                                <div id="fileupload" class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                                                <div>
                                                                    <!-- <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="filename"/></span>
                                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a> -->

                                                                    <input type="hidden" id="fullpathimage" name="fullpathimage"  value="<?php echo base_url(); ?>uploads/artifact/<?php echo $row['image']; ?>">
                                                                    <input type="hidden" id="old_filename" name="old_filename"  value="<?php echo $row['image']; ?>">
                                                                    <script>
                                                                        var img = document.createElement('IMG');

                                                                        var fullpathimage = document.getElementById('fullpathimage').value;
                                                                        var old_filename = document.getElementById('old_filename').value;
                                                                        
                                                                        img.setAttribute('src', '<?php echo base_url(); ?>uploads/artifact/'+old_filename);
                                                                        img.setAttribute('height', '200');
                                                                        img.setAttribute('width', '200');
                                                                        
                                                                        if(old_filename==''){ 
                                                                            img.setAttribute('src', '<?php echo base_url(); ?>uploads/artifact/default.png'); 
                                                                        }
                                                                        img.setAttribute('class', 'mark');

                                                                        document.getElementById("fileupload").appendChild(img);
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">เลขลำดับ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['artifact_no']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">เลขวัตถุ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['artifact_code']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">ชื่อวัตถุ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['artifact_name']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">เลขเดิม :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['old_number']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">หมวดหมู่ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['artifact_type']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">วัสดุ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['material']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">ขนาด :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['dimension_a']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">แบบศิลปะ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;
                                                            <?php 
                                                            foreach ($data_category  as $row2){
                                                                if($row2['cat_id']==$row['cat_id']){ 
                                                                    echo '<label class="control-label col-lg-0">'.$row2['cat_name'].'</label>'; 
                                                                } 
                                                            }?>
                                                        </label></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">อายุสมัย :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['period']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">ฝีมือช่าง :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['designer']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" valign="top"  ><label class="control-label">ประวัติ :&nbsp;</label></td>
                                                        <td><textarea class="form-control" rows="5" id="history" name="history"><?=$row['history']?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">ลักษณะ :&nbsp;</label></td>
                                                        <td><textarea class="form-control" rows="10" id="description" name="description"><?=$row['description']?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">จำนวน :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['quantity']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" valign="top"  ><label class="control-label">สภาพ :&nbsp;</label></td>
                                                        <td><textarea class="form-control" rows="5" id="condition" name="condition"><?=$row['condition_']?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">สถานที่จัดเก็บ อาคาร :&nbsp;</label></td>
                                                        <td>
                                                        <label class="control-label">&nbsp;&nbsp;&nbsp;
                                                        <?php 
                                                        foreach ($data_location  as $row2){
                                                            if($row2['location_id']==$row['location_id']){ 
                                                                echo '<label class="control-label col-lg-0">'.$row2['location_name'].'</label>'; 
                                                            } 
                                                        }?>
                                                        </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">ห้องจัดเก็บ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;
                                                        <?php 
                                                        foreach ($data_location  as $row2){
                                                            if($row2['location_id']==$row['sub_location_id']){ 
                                                                echo '<label class="control-label col-lg-0">'.$row2['location_name'].'</label>'; 
                                                            } 
                                                        }?>
                                                        </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">ตู้/ชั้น :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['other_location']; ?></label></td>
                                                    </tr>

                                                    
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">การนำไปใช้ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['implement']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">การตรวจสอบ/แก้ไข :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['revised']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">Tag location :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['tag_location']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" valign="top"  ><label class="control-label">การอนุรักษ์ :&nbsp;</label></td>
                                                        <td><textarea class="form-control" rows="5" id="conservation" name="conservation"><?=$row['conservation']?></textarea></td>
                                                    </tr> 
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">การทำความสะอาด :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['clean']; ?></label></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td align="right"  ><label class="control-label">การบันทึกสภาพวัตถุ :&nbsp;</label></td>
                                                        <td><label class="control-label">&nbsp;&nbsp;&nbsp;<?php echo $row['condition_report_by']; ?></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" valign="top" ><label class="control-label">หมายเหตุ :&nbsp;</label></td>
                                                        <td><textarea class="form-control" rows="5" id="note" name="note"><?=$row['note']?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" valign="top" ><label class="control-label"> แกลลอรี่ :&nbsp;</label></td>
                                                        <td><br>
                                                            <ul id="gallery" class="pure-js-lightbox-container">
                                                                <?php
                                                                
                                                                $allfiles = dirlist($_SERVER["DOCUMENT_ROOT"]."/uploads/artifact/gallery/".$data_id, "files");
                                                                
                                                                if($allfiles!=0){
                                                                    for($i=0;$i<count($allfiles);$i++){
                                                                    ?>
                                                                    <li><a href="../../uploads/artifact/gallery/<?=$data_id?>/<?=$allfiles[$i]?>"><img src="../../uploads/artifact/gallery/<?=$data_id?>/<?=$allfiles[$i]?>"/></a></li>
                                                                    <?php 
                                                                    }
                                                                }else{
                                                                    // print $_SERVER["DOCUMENT_ROOT"]."/ruenrudee/uploads/artifact/gallery/".$data_id;
                                                                    echo "No data.";
                                                                }
                                                                ?>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td align="right" valign="top" ></td>
                                                        <td align="right" valign="top" >
                                                            <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>search/card/<?php echo $row['artifact_id']; ?>'">สั่งพิมพ์บัตร</button>
                                                                    
                                                            <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>search/'">ย้อนกลับ</button>
                                                        </td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                         </div>
                                     </div>
                                    <?php }?>
                                 <?php echo form_close(); ?>
                             </div>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>search/card/<?php echo $row['artifact_id']; ?>'">สั่งพิมพ์บัตร</button>
                             <button  type="button" id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>search/'">ย้อนกลับ</button><br><br>
                         </div>
                         
                     </div>
                 </div>
                </div> 
            </div>
       <!--END PAGE CONTENT -->





