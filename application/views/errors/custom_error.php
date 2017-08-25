<?php if($this->session->flashdata('message')): ?>
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $this->session->flashdata('message'); ?>
  </div>
<?php endif; ?>

<?php if(validation_errors()): ?>
  <div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo validation_errors(); ?>
  </div>
<?php endif; ?>
