
<form class="" action="<?php echo site_url('admin/createUser');?>" method="post">

    <div class="col-sm-6">
        <h3>Create User</h3>
        <hr>
        <!--ERROR -->
        <?php
        try {
            $this->load->view('errors/custom_error');
        } catch (Exception $e) {
            
        }

        ?>
        <label for="">Name</label>
        <input class="form-control" type="text" name="name" value="">
        <label for="">Email</label>
        <input class="form-control" type="text" name="email" value="">
        <label for="">Password</label>
        <input class="form-control" type="password" name="password" value="">
        <label for="">Confirm Password</label>
        <input class="form-control" type="password" name="confirm_password" value="">
        <label for="">User Role</label>
        <select class="form-control" name="role">
            <option value="">Choose...</option>
            <option value="1">Teacher</option>
            <option value="2">Student</option>
        </select>
        <label for="">Status</label>
        <select class="form-control" name="status">
            <option value="0">Deactived</option>
            <option value="1">Active</option>
        </select>
        <br>
        <input class="btn btn-primary" type="submit" name="" value="Create User">
    </div>

</form>
