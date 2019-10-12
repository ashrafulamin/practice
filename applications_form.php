<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php');?>

<?php
$page_title = "Application Form";
?>
<?php require('layout/header.php'); ?>
<?php
$error = false;
if(!isset($_GET['user_id'])){
  $user = current_user();
}
else{
  $user_id = (int) $_GET['user_id'];
    if (get_user_by_id($_GET['user_id'])) {
        $user = get_user_by_id($_GET['user_id']);
      }
      else{
        $error = true;
      } 
}
 
?>

<?php if (isset($_GET['success'])): 
  echo '<div class="alert alert-success" role="alert">Application Sent</div>';
endif;
?>

<?php if(!$error): ?>

<style>
  table tr > td {
    height: 50px;
  }
</style>

<form action="applications_process.php" method="POST">
<table width="600">
  <tr>
    <td><label for="field_type" class="col-form-label">Leave Type</label></td>
    <td><select name="type" class="custom-select mr-sm-2" id="field_type">
        <option selected value="">[Select...]</option>
        <option value="Sick">Sick Leave</option>
        <option value="Official">Official Leave</option>
        <option value="Yearly">Yearly Leave</option>
      </select></td>
  </tr>
  <tr>
    <td><label for="field_date_start" class="col-form-label">Date Start</label></td>
    <td><input placeholder="Date" id="field_date_start" name="date_start" class="form-control" type="date" data-inputmask="'alias': 'date'" required></td>
  </tr>
  <tr>
    <td><label for="field_date_end" class="col-form-label">Date End</label></td>
    <td><input placeholder="Date" id="field_date_end" name="date_end" class="form-control" type="date" data-inputmask="'alias': 'date'" required></td>
  </tr>
  <tr>
    <td><label for="field_desc">Description</label></td>
    <td><textarea class="form-control" name="desc" id="field_desc" cols="30" rows="10"></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><button type="submit" class="btn btn-primary">Apply</button></td>
  </tr>
</table>
</form>

<?php
else:
  echo "Invalid user";
 endif; ?>

<?php require('layout/footer.php') ?>