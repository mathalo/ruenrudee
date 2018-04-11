
        

            <div class="inner">
                
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>รูป</th>
                                            <th>เลขวัตถุ</th>
                                            <th>ชื่อวัตถุ</th>
                                            <th>วันที่เพิ่มข้อมูล</th>
                                            <th>#</th>
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
                                            <td>
                                                <img width="75" height="75" src="<?php echo base_url(); ?>uploads/artifact/<?php if($row['image']==''){ echo 'default.png'; }else{ echo $row['image']; } ?>"/>
                                            </td>
                                            <td><?=$row['artifact_code']?></td>
                                            <td><?=$row['artifact_name']?></td>
                                            <td><?=$row['date_created']?></td>
                                            <td>
                                                <!-- <div class="make-switch switch-small">
                                                    <input type="checkbox" checked="checked" name="status" value="open" />
                                                </div> -->
                                                <a onclick="window.location='<?php echo base_url(); ?>Artifact/edit/<?=$row['artifact_id']?>'">
                                                    <button class="btn btn-primary"><i class="icon-pencil icon-white"></i> แก้ไข</button>
                                                </a> 
                                                <a onclick="confirm_del(<?=$row['artifact_id']?>)">
                                                    <button class="btn btn-danger"><i class="icon-remove icon-white"></i> ลบ</button>
                                                </a>
                                                <a onclick="window.location='<?php echo base_url(); ?>Artifact/gallery/<?=$row['artifact_id']?>'">
                                                    <button class="btn btn-success"><i class="icon-film icon-white"></i> แกลอรี่</button>
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
                    <button id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Artifact/add'">เพิ่มข้อมูล</button>
                </div>
            </div>
            </div>
        </div>
        <script>
        function confirm_del(delId){
            if(confirm('Do you want to delete...')==true){
                window.location='<?php echo base_url(); ?>Artifact/delete/'+delId;
            }
        }
        </script>
       <!--END PAGE CONTENT -->



