<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Admin List</h3>
        <ul class="panel-controls">
            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>
    </div>
    <div class="panel-body">
        <!--ERROR -->
        <?php
        try {
            $this->load->view('errors/custom_error');
        } catch (Exception $e) {
            continue;
        }
        ?>
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($admins) && count($admins)): ?>

                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?php echo htmlentities($admin->name);?></td>
                            <td><?php echo htmlentities($admin->email);?></td>
                            <td><?php echo htmlentities($admin->status == 1? 'Active':'Deactived');?></td>
                            <td>
                                <?php if($admin->status == 1): ?>
                                    <a href="<?php echo site_url('admin/adminDeactive/').urlencode($admin->user_id);?>" class="btn btn-sm btn-warning">Deactive</a>
                                <?php else: ?>
                                    <a href="<?php echo site_url('admin/adminActive/').urlencode($admin->user_id);?>" class="btn btn-sm btn-success">Active</a>
                                <?php endif; ?>
                                <a href="<?php echo site_url('admin/adminDelete/').urlencode($admin->user_id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->
