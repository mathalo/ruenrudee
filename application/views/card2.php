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
<style>
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
}


    #printable { display: none; }

    @media print
    {
        body, html {
            margin-top:0px;
            padding-top:0px;
            margin-bottom:0px;
            padding-bottom:0px;
        }
        #non-printable { display: none; }
        #left { display: none; }
        #printable { display: block; }
        #footer { display: none; }
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
                         <!-- <div class="box" > -->
                             
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
                                            <table width="auto" id="printTable">
                                               
                                                <tr>
                                                    <td>
                                                        <label class="control-label">เลขวัตถุ :  </label>
                                                        <?php echo $row['artifact_code']; ?>
                                                    </td>
                                                    <td rowspan="4" valign="top">
                                                        <center>
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
                                                                    if(old_filename==''){ 
                                                                        img.setAttribute('src', '<?php echo base_url(); ?>uploads/artifact/default.png'); 
                                                                    }
                                                                    img.setAttribute('class', 'mark');

                                                                    document.getElementById("fileupload").appendChild(img);
                                                                </script>
                                                            </div>
                                                            <?php echo $row['artifact_code']; ?>
                                                        </div>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="control-label">ชื่อวัตถุ :  </label>
                                                        <?php echo $row['artifact_name']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"  ><label class="control-label">เลขเดิม :&nbsp;</label><?php echo $row['old_number']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"  ><label class="control-label">หมวดหมู่ :&nbsp;</label><?php echo $row['artifact_type']; ?></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td align="right"  ><label class="control-label">วัสดุ :&nbsp;</label><?php echo $row['material']; ?></td>
                                                    <td align="right"  ><label class="control-label">ขนาด :&nbsp;</label><?php echo $row['dimension_a']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"  ><label class="control-label">ศิลปะ :&nbsp;</label>
                                                        <?php 
                                                        foreach ($data_category  as $row2){
                                                            if($row2['cat_id']==$row['cat_id']){ 
                                                                echo $row2['cat_name']; 
                                                            } 
                                                        }?>
                                                    </td>
                                                    <td align="right"  ><label class="control-label">อายุสมัย :&nbsp;</label><?php echo $row['period']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"  colspan="2"><label class="control-label">ประวัติ :&nbsp;</label><p><?php echo $row['history']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"  colspan="2"><label class="control-label">ลักษณะ :&nbsp;</label><p><?php echo $row['description']; ?></p></td>
                                                </tr>














                                                
                                                
                                                <tr id="non-printable">
                                                    <td colspan="3">
                                                        <div>
                                                            <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
                                                            <button  type="button" id="print_table" class="btn btn-primary ForMargin" onclick="window.print();" >สั่งพิมพ์</button>
                                                                                                    
                                                            <button  type="button" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>search/detail/<?php echo $row['artifact_id']; ?>'">ย้อนกลับ</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                         </div>
                                     </div>
                                    <?php }?>
                                 <?php echo form_close(); ?>
                             </div>
                             
                         <!-- </div> -->
                         <!-- <div id="non-printable">
                            <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
                            <button  type="button" id="print_table" class="btn btn-primary ForMargin" onclick="window.print();" >สั่งพิมพ์</button>
                                                                    
                            <button  type="button" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>search/detail/<?php echo $row['artifact_id']; ?>'">ย้อนกลับ</button>
                        </div> -->
                     </div>
                 </div>

                 
                </div> 
            </div>
       <!--END PAGE CONTENT -->





