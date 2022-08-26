<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-35"><i class="zmdi zmdi-file"></i> All Pages</h3>
            <div class="table-data__tool">
                                  
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="<?= site_url('admin/create_page') ?>">
                                            <i class="zmdi zmdi-plus"></i>add page</a>
                                      
                                    </div>
                                </div>
            <div class="table-responsive">
                <table class="table table-data2" id="pages_table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created Date</th>
                            <th><?php echo lang('index_action_th');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                       
                            if($pages) {
                                ini_set('memory_limit', '1024M');
                                foreach($pages as $page) {
                                    
                                  
                        ?>
                        <tr class="tr-shadow">
                            <td><?php echo htmlspecialchars($page->title,ENT_QUOTES,'UTF-8');?></td>
                            <td><?= $page->created ? date('d M, Y H:i:s', strtotime($page->created)) : 'N/A' ?></td>
                            <td>
                                <div class="table-data-feature">
                                    <?php echo anchor("admin/edit_page/".$page->id, '<i class="zmdi zmdi-edit"></i>',array('title' => 'Edit', 'class' => 'item', 'data-toggle'=>'tooltip','data-placement'=>'top','data-id' => $page->id)) ;?>
                                    <!--<?php echo anchor("admin/deletePage/".$page->id, '<i class="fas fa-trash"></i>',array('title' => 'Delete', 'class' => 'item deleteUser', 'data-toggle'=>'tooltip','data-placement'=>'top','data-id' => $page->id)) ;?>-->
                                </div> 
                            </td>
                        </tr>
                        <?php
                            }
                            } else {
                        ?>
                        <tr class="tr-shadow empty_table">
                            <td  colspan="6">No data found.</td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
jQuery(document).ready(function(){
    jQuery('.deleteUser').click(function(event){
        event.preventDefault();
     
       var confirmDelete = confirm('Are you sure to delete?');
       if(confirmDelete){
           
           
       }else{
      return false;  
  }
    });
    
});
</script>
