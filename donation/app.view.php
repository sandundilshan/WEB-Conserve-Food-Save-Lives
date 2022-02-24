<?php
require_once 'app.model.php';

    $get=new model;
   $get->select_all_contact();
?>
<html>
<head>
<style>
td, tr, table
{
  border: 1px solid black;
  padding: 5px;
}

</style>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
<h2 style="font-weight: bold;font-family: Gabriola">Donation Listing</h2>
<div class="form">
    <form id='contactForm' method="POST" action="app.ctrl.php?contact=create_and_update">
    <div class="left">



<fieldset>

  <strong>Id</strong> <br>
  <input name="id" type="text" id="id" size="40"  value='<?php if(isset($_GET['id']) && isset($_GET['fname'])) echo $_GET['id']; ?>' readonly/> <br>

  <strong>First Name:</strong> <br>
  <input name="fname" type="text" id="fname" size="40" value='<?php if(isset($_GET['fname'])) echo $_GET['fname']; ?>' required class='field' /> <br>

  <strong>Last Name</strong> <br>
  <input name="lname" type="text" id="lname" size="40" value='<?php if(isset($_GET['lname'])) echo $_GET['lname']; ?>' required class='field' /> <br>

    <a href="error_log.txt">Error Log</a>







    </div>
      <div class="center">
          <strong>Phone</strong> <br>
          <input name="phone" type="text" id="phone" size="40" value='<?php if(isset($_GET['phone'])) echo $_GET['phone']; ?>' required class='field' /> <br>

          <strong>Email</strong> <br>
          <input name="email" type="text" id="email" size="40" value='<?php if(isset($_GET['email'])) echo $_GET['email']; ?>' required class='field' /> <br>

          <strong>Location</strong> <br>
          <input name="location" type="text" id="location" size="40" value='<?php if(isset($_GET['location'])) echo $_GET['location']; ?>' required class='field' /> <br>

      </div>
    <div class="right">
        <strong>Donate Date</strong> <br>
        <input name="donateDate" type="date" id="donateDate" size="40" value='<?php if(isset($_GET['donateDate'])) echo $_GET['donateDate']; ?>' required class='field' /> <br>

        <strong>Donate Amount</strong> <br>
        <input name="donateAmount" type="text" id="donateAmount" size="40" value='<?php if(isset($_GET['donateAmount'])) echo $_GET['donateAmount']; ?>' required class='field' /> <br>

        <strong>Message</strong> <br>
        <input name="message" type="text" id="message" size="40" value='<?php if(isset($_GET['message'])) echo $_GET['message']; ?>' required class='field' /> <br>

        <?php
        if(!isset($_GET['id'])  || !isset($_GET['fname']) ) echo '<button type="submit" class="btn btn-success" style="margin-top: 5px;font-size: 12px">ADD NEW LISTING</button>'
        ?>
        <?php
        if(isset($_GET['id']) && isset($_GET['fname'])) echo '<button type="submit" class="btn btn-warning" style="margin-top: 5px;font-size: 12px">UPDATE LISTING</button>'
        ?>
    </div>
        </fieldset>
    </form>
</div>

      <div class="table">

          <table>
              <tr style="font-size: 12px">

                  <th><strong>ID</strong><strong><a href="app.ctrl.php?contact=sort&column=id&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=id&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong>F_Name</strong><strong><a href="app.ctrl.php?contact=sort&column=fname&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=fname&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong>L_Name</strong><strong><a href="app.ctrl.php?contact=sort&column=lname&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=lname&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong>Phone</strong><strong><a href="app.ctrl.php?contact=sort&column=phone&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=phone&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong>Email</strong><strong><a href="app.ctrl.php?contact=sort&column=email&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=email&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong>Location</strong><strong><a href="app.ctrl.php?contact=sort&column=location&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=location&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong> Date</strong><strong><a href="app.ctrl.php?contact=sort&column=donateDate&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=donateDate&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong> Amount</strong><strong><a href="app.ctrl.php?contact=sort&column=donateAmount&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=donateAmount&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong>Message</strong><strong><a href="app.ctrl.php?contact=sort&column=message&order=ASC"><img
                                      src="up.png" alt="" style="width: 10px; height: 15px"></a></strong><strong><a href="app.ctrl.php?contact=sort&column=message&order=DESC"><img
                                      src="down.png" alt="" style="width: 10px; height: 15px"></a></strong></th>
                  <th><strong>Update</strong></th>
                  <th><strong>Delete</strong></th>


              </tr>
              <?php
              if(!isset($_GET['order'])){
                  global $result_list;
                  echo $result_list;
              }
              ?>
              <?php
              if(isset($_GET['order'])){
                  global $sort_result_list;
                  echo $sort_result_list;
              }

              ?>
          </table>

      </div>

  </div>



</body>
</html>