<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Agent List</h3>
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
                <?php if(!empty($agents)): ?>

                    <?php foreach ($agents as $agent): ?>
                        <tr>
                            <td><?php echo htmlentities($agent->name);?></td>
                            <td><?php echo htmlentities($agent->email);?></td>
                            <td><?php echo htmlentities($agent->status == 1? 'Active':'Deactived');?></td>
                            <td>
                                <?php if($agent->status == 1): ?>
                                    <a href="<?php echo site_url('admin/userAdminDeactive/').urlencode($agent->user_id).'/agentList';?>" class="btn btn-sm btn-warning">Deactive</a>
                                <?php else: ?>
                                    <a href="<?php echo site_url('admin/userAdminActive/').urlencode($agent->user_id).'/agentList';?>" class="btn btn-sm btn-success">Active</a>
                                <?php endif; ?>
                                <a href="<?php echo site_url('admin/userAdminDelete/').urlencode($agent->user_id).'/agentList';?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->
