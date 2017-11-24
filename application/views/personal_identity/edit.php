
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-name">Personal Identity</h3>
                    </div>
                    <div class="panel-body">
                        <?php if (validation_errors()) { ?>

                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong><?php echo validation_errors(); ?></strong>
                            </div>
                        <?php } ?>

                        <div class="col-md-5">
                            <?php $pi_id=""; if(!empty($pi)) $pi_id=$pi->id?>
                            <form method="post" action="<?php echo base_url($action.'/'.$user_id.'/'.$pi_id) ?>" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">ID type</label>
                                    <div class="col-md-8">
                                        <input name="id_type" class="form-control" type="text" placeholder="" value="<?php if(!empty($pi)) echo $pi->id_type?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">ID Number</label>
                                    <div class="col-md-8">
                                        <input name="id_number" class="form-control" type="text" placeholder="" value="<?php if(!empty($pi)) echo $pi->id_number ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Attachment</label>
                                    <div class="col-md-8">
                                        <input name="attachment" class="fileinput btn-primary" type="file" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-8">
                                        <input class="btn btn-primary" type="submit" value="Save">
                                        <input class="btn btn-danger" type="reset" value="Reset">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END DEFAULT DATATABLE -->
            </div>
        </div>
    </div>
</div>
