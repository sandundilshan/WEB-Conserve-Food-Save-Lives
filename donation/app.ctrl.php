<?php
require_once 'app.config.php';
require_once 'app.model.php';
?>
<?php

global $conn;
switch ($_REQUEST['contact']){
  case 'create_and_update':
      if(empty($_POST['id'])){
          $contact_model=new model;
          $contact_model->set_fname(mysqli_real_escape_string($conn,$_POST['fname']));
          $contact_model->set_lname(mysqli_real_escape_string($conn,$_POST['lname']));
          $contact_model->set_phone(mysqli_real_escape_string($conn,$_POST['phone']));
          $contact_model->set_email(mysqli_real_escape_string($conn,$_POST['email']));
          $contact_model->set_location(mysqli_real_escape_string($conn,$_POST['location']));
          $contact_model->set_DonateDate(mysqli_real_escape_string($conn,$_POST['donateDate']));
          $contact_model->set_DonateAmount(mysqli_real_escape_string($conn,$_POST['donateAmount']));
          $contact_model->set_Message(mysqli_real_escape_string($conn,$_POST['message']));
          $query="INSERT INTO donation (fname,lname,phone,email,location,donateDate,donateAmount,message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $contact_model->save($query,$contact_model);
      }
      if(!empty($_POST['id'])){
          $update_model=new model;
          $update_model->set_id($_POST['id']);
          $update_model->set_fname($_POST['fname']);
          $update_model->set_lname($_POST['lname']);
          $update_model->set_phone($_POST['phone']);
          $update_model->set_email($_POST['email']);
          $update_model->set_location($_POST['location']);
          $update_model->set_DonateDate($_POST['donateDate']);
          $update_model->set_DonateAmount($_POST['donateAmount']);
          $update_model->set_Message($_POST['message']);
          $query="UPDATE donation set fname=?,lname=?,phone=?,email=?,location=?,donateDate=?,donateAmount=?,message=? where id=?";
          $update_model->update($query,$update_model);
          $_POST = array();
      }
    break;
    case 'delete':
        $delete_model=new model;
        $query="DELETE FROM donation where id=?";
        $delete_model->delete($query,$_GET['id']);
        break;
    case 'sort':
        $sort_model=new model;
        $column=$_GET['column'];
        $order=$_GET['order'];
        $query="SELECT * FROM donation ORDER BY {$column} {$order}";
        $sort_model->sortTable($query);
}
include 'app.view.php';
?>