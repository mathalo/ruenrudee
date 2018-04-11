
        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> หมวดหมู่</h2>
 
                    </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        หมวดหมู่
                        </div>
                        
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>หมวดหมู่</th>
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
                                            <td><?=$row['cat_name']?></td>
                                            <td>
                                                <!-- <div class="make-switch switch-small">
                                                    <input type="checkbox" checked="checked" name="status" value="open" />
                                                </div> -->
                                                <a onclick="window.location='<?php echo base_url(); ?>Categories/edit/<?=$row['cat_id']?>'">
                                                    <button class="btn btn-primary"><i class="icon-pencil icon-white"></i> แก้ไข</button>
                                                </a> 
                                                <a onclick="confirm_del(<?=$row['cat_id']?>)">
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
                    <button id="example-10" class="btn btn-primary ForMargin" onclick="window.location='<?php echo base_url(); ?>Categories/add'">เพิ่มข้อมูล</button>
                </div>
            </div>
            </div>
        </div>
        <script>
        function confirm_del(delId){
            if(confirm('Do you want to delete...')==true){
                window.location='<?php echo base_url(); ?>Categories/delete/'+delId;
            }
        }
        </script>
       <!--END PAGE CONTENT -->



