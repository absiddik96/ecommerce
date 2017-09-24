<!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create <?php echo $role_name?></h3>
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
        <form class="form-horizontal" action="<?php echo site_url('admin/createUser/'.$role_name);?>" method="post">

            <div class="col-sm-6">

                <div class="form-group">
                    <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-8">
                        <input placeholder="Enter Your Name" class="form-control" type="text" name="name" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Email</label>
                    <div class="col-md-8">
                        <input placeholder="Enter Your Email" class="form-control" type="text" name="email" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-8">
                        <input placeholder="Enter Password" class="form-control" type="password" name="password" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-8">
                        <input placeholder="Enter Confirm Password" class="form-control" type="password" name="confirm_password" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 col-xs-12 control-label">Country</label>
                    <div class="col-md-8 col-xs-12">
                        <select name="country" class="form-control" id="country">
                            <option value="">Select Country ...</option>
                            <?php foreach ($countries as $country): ?>
                                <option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 col-xs-12 control-label">Division / Province / State</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="Static form control">
                            <select name="division_state" class="form-control" id="division_state" disabled="">
                                <option value="">Select Division / Province / State ...</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 col-xs-12 control-label">District / City</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="Static form control">
                            <select name="district_city" class="form-control" id="district_city" disabled="">
                                <option value="">Select District / City ...</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 col-xs-12 control-label">Upazila / Police Station</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="Static form control">
                            <select name="upazila_ps" class="form-control" id="upazila_ps" disabled="">
                                <option value="">Select Upazila / Police Station ...</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 col-xs-12 control-label">Union / word</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="Static form control">
                            <select name="union_word" class="form-control" id="union_word" disabled="">
                                <option value="">Select Union / Word ...</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 col-xs-12 control-label">Village / Moholla</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="Static form control">
                            <select name="village_moholla" class="form-control" id="village_moholla" disabled="">
                                <option value="">Select Village / Moholla ...</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">User Characteristic</label>
                    <div class="col-md-8">
                        <select class="form-control" name="user_characteristic">
                            <option value="">Select User Characteristic ...</option>
                            <option value="0">Single</option>
                            <option value="1">Corporate</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">User Category</label>
                    <div class="col-md-8">
                        <select name="user_category" class="form-control" id="user_category">
                            <option value="">Select User Category ...</option>
                            <?php foreach ($user_categorys as $user_category): ?>
                                <option value="<?php echo $user_category->id ?>"><?php echo $user_category->category_title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">User Type</label>
                    <div class="col-md-8">
                        <select name="user_type" class="form-control" id="user_type" disabled>
                            <option value="">Select User Type ...</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">User Sub Type</label>
                    <div class="col-md-8">
                        <select name="user_sub_type" class="form-control" id="user_sub_type" disabled>
                            <option value="">Select User Sub Type ...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-8">
                        <textarea id="others_option" name="others_option"  class="form-control" rows="5" disabled></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Status</label>
                    <div class="col-md-8">
                        <select class="form-control" name="status">
                            <option value="">Select Status ...</option>
                            <option value="0">Deactived</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-primary" type="submit" name="" value="Create">
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>
<!-- END DEFAULT DATATABLE -->
