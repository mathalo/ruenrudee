
        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> ประเภทโบราณวัตถุ ศิลปวัตถุ</h2>

                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ตารางประเภทโบราณวัตถุ ศิลปวัตถุ
                        </div>
                        
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Artifact type name</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $i=0;
                                        foreach ($artifact as $row){
                                            $i++;
                                        ?>
                                        <tr <?php if($i%2==1){ echo 'class="success"'; }?>>
                                            <td><?=$i?></td>
                                            <td><?=$row['artifact_type_name']?></td>
                                            <td>
                                                <!-- <div class="make-switch switch-small">
                                                    <input type="checkbox" checked="checked" name="status" value="open" />
                                                </div> -->
                                                <a onclick="window.location='<?php echo base_url(); ?>ArtifactType/edit/<?=$row['artifact_type_id']?>'">
                                                    <button class="btn btn-primary"><i class="icon-pencil icon-white"></i> แก้ไข</button>
                                                </a> 
                                                <a onclick="confirm_del(<?=$row['artifact_type_id']?>)">
                                                    <button class="btn btn-danger"><i class="icon-remove icon-white"></i> ลบ</button>
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
                    <button id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>ArtifactType/add'">เพิ่มข้อมูล</button>
                </div>
            </div>
            </div>
        </div>
        <script>
        function confirm_del(delId){
            if(confirm('Do you want to delete...')==true){
                window.location='<?php echo base_url(); ?>ArtifactType/delete/'+delId;
            }
        }
        </script>
       <!--END PAGE CONTENT -->



