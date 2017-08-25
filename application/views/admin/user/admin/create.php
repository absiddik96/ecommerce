<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create Admin</h3>
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
        <form class="" action="<?php echo site_url('admin/createAdmin');?>" method="post">

            <div class="col-sm-6">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" value="">
                <label for="">Email</label>
                <input class="form-control" type="text" name="email" value="">
                <label for="">Password</label>
                <input class="form-control" type="password" name="password" value="">
                <label for="">Confirm Password</label>
                <input class="form-control" type="password" name="confirm_password" value="">
                <label for="">Status</label>
                <select class="form-control" name="status">
                    <option value="0">Deactived</option>
                    <option value="1">Active</option>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" name="" value="Create Admin">
            </div>

        </form>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->
