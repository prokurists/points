<?php if(!empty($resMessage)) {?>
  <div class='alert <?php echo $resMessage['status']?> alert-dismissible fade show' role='alert'>
  <?php echo $resMessage['message']?>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
<br>
<?php } ?>
