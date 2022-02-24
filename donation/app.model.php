
<?php

require_once 'app.config.php';

$current="";
class model {
  // Properties
  public $id;
  public $fname;
  public $lname;
  public $phone;
  public $email;
  public $location;
  public $donateDate;
  public $donateAmount;
  public $message;

  
  // Methods
  function set_id($id) {
    $this->id = $id;
  }
  function get_id() {
    return $this->id;
  }
  function set_fname($fname){
    $this->fname=$fname;
  }

  function get_fname(){
      return $this->fname;
  }
  function set_lname($lname){
    $this->lname=$lname;
  }
  function get_lname(){
    return $this->lname;
  }
  function set_phone($phone){
    $this->phone=$phone;
  }
  function get_phone(){
    return $this->phone;
  }
  function set_email($email){
    $this->email=$email;
  }
  function get_email(){
    return $this->email;
  }
  function set_location($location){
    $this->location=$location;
  }
  function get_location(){
    return $this->location;
  }

  /**
   * @return mixed
   */
  public function get_DonateDate()
  {
    return $this->donateDate;
  }

  /**
   * @param mixed $donateDate
   */
  public function set_DonateDate($donateDate)
  {
    $this->donateDate = $donateDate;
  }

  /**
   * @return mixed
   */
  public function get_DonateAmount()
  {
    return $this->donateAmount;
  }

  /**
   * @param mixed $donateAmount
   */
  public function set_DonateAmount($donateAmount)
  {
    $this->donateAmount = $donateAmount;
  }

  /**
   * @return mixed
   */
  public function get_Message()
  {
    return $this->message;
  }

  /**
   * @param mixed $message
   */
  public function set_Message($message)
  {
    $this->message = $message;
  }



  // ------------------- functions ----------------

  function save($query,$model){
    global $conn;
    try{
      $stmt = $conn->prepare($query);
      $stmt->execute([
          $model->get_fname(),
          $model->get_lname(),
          $model->get_phone(),
          $model->get_email(),
          $model->get_location(),
          $model->get_DonateDate(),
          $model->get_DonateAmount(),
          $model->get_Message()
      ]);
      echo '<script>alert("Record successfully inserted")</script>';

    }catch(Exception $e){
      $err=array("time"=>date("F j, Y, g:i a"),"sql"=>$query,"mysqlerror"=> "Insert failed: " . $e->getMessage() ,"filename"=>__FILE__,"linenumber"=>__LINE__,"remotehost"=>gethostbyaddr($_SERVER['REMOTE_ADDR']),"clientaddress"=>$_SERVER['REMOTE_ADDR']);
      global $current;
      $my_file = fopen("error_log.txt", "a+") or die("can't open file");;
      $current .="Array(\n";
      foreach ($err as $key => $val){
        $current .=$key."==>".$val."\n";
      }
      $current .=")\n";
      fwrite($my_file,$current);
      echo "Insert failed: " . $e->getMessage();
    }
  }

  function update($query,$update_model){
    global $conn;
    try{
      $stmt = $conn->prepare($query);
      $stmt->execute([
          $update_model->get_fname(),
          $update_model->get_lname(),
          $update_model->get_phone(),
          $update_model->get_email(),
          $update_model->get_location(),
          $update_model->get_DonateDate(),
          $update_model->get_DonateAmount(),
          $update_model->get_Message(),
          $update_model->get_id()
      ]);
      echo '<script>alert("Record Update Successful")</script>';
    }catch(Exception $e){
      $err=array("time"=>date("F j, Y, g:i a"),"sql"=>$query,"mysqlerror"=> "Update failed: " . $e->getMessage() ,"filename"=>__FILE__,"linenumber"=>__LINE__,"remotehost"=>gethostbyaddr($_SERVER['REMOTE_ADDR']),"clientaddress"=>$_SERVER['REMOTE_ADDR']);
      global $current;
      $my_file = fopen("error_log.txt", "a+") or die("can't open file");;
      $current .="Array(\n";
      foreach ($err as $key => $val){
        $current .=$key."==>".$val."\n";
      }
      $current .=")\n";
      fwrite($my_file,$current);
      echo '<script>alert("Update failed:")</script>';
    }
  }
  function delete($query,$id){
    global $conn;
    try{
      $stmt = $conn->prepare($query);
      $stmt->execute([$id]);
      echo '<script>alert("Record Delete Successful")</script>';
    }catch(Exception $e){
      $err=array("time"=>date("F j, Y, g:i a"),"sql"=>$query,"mysqlerror"=> "Delete failed: " . $e->getMessage() ,"filename"=>__FILE__,"linenumber"=>__LINE__,"remotehost"=>gethostbyaddr($_SERVER['REMOTE_ADDR']),"clientaddress"=>$_SERVER['REMOTE_ADDR']);
      global $current;
      $my_file = fopen("error_log.txt", "a+") or die("can't open file");;
      $current .="Array(\n";
      foreach ($err as $key => $val){
        $current .=$key."==>".$val."\n";
      }
      $current .=")\n";
      fwrite($my_file,$current);
      echo '<script>alert("Delete failed:")</script>';

    }
  }



  function sortTable($query){

    try {
      global $conn;
      global $sort_result_list;
      $results = mysqli_query($conn, $query);

      while ($result = mysqli_fetch_assoc($results)) {
        $sort_result_list .= "<tr style='font-size: 11px'>";
        $sort_result_list .= "<td>{$result['id']}</td>";
        $sort_result_list .= "<td>{$result['fname']}</td>";
        $sort_result_list .= "<td>{$result['lname']}</td>";
        $sort_result_list .= "<td>{$result['phone']}</td>";
        $sort_result_list .= "<td>{$result['email']}</td>";
        $sort_result_list .= "<td>{$result['location']}</td>";
        $sort_result_list .= "<td>{$result['donateDate']}</td>";
        $sort_result_list .= "<td>{$result['donateAmount']}</td>";
        $sort_result_list .= "<td>{$result['message']}</td>";
        $sort_result_list .= "<td><a href=\"app.view.php?id={$result['id']}&fname={$result['fname']}&lname={$result['lname']}&phone={$result['phone']}&email={$result['email']}&location={$result['location']}&donateDate={$result['donateDate']}&donateAmount={$result['donateAmount']}&message={$result['message']}\">E</a></td>";
        $sort_result_list .= "<td><a href=\"app.ctrl.php?contact=delete&id={$result['id']}\" 
						onclick=\"return confirm('Are you sure?');\">D</a></td>";
        $sort_result_list .= "</tr>";
      }
    } catch (Exception $e) {
      $err=array("time"=>date("F j, Y, g:i a"),"sql"=>$query,"mysqlerror"=> "Sort failed: " . $e->getMessage() ,"filename"=>__FILE__,"linenumber"=>__LINE__,"remotehost"=>gethostbyaddr($_SERVER['REMOTE_ADDR']),"clientaddress"=>$_SERVER['REMOTE_ADDR']);
      global $current;
      $my_file = fopen("error_log.txt", "a+") or die("can't open file");;
      $current .="Array(\n";
      foreach ($err as $key => $val){
        $current .=$key."==>".$val."\n";
      }
      $current .=")\n";
      fwrite($my_file,$current);
      echo '<script>alert("Sort failed:")</script>';

      exit();
    }
  }

  function select_all_contact()
  {

    try {
      global $conn;
      global $result_list;
      global $result_set;
      $query = "SELECT * FROM donation";
      $results = mysqli_query($conn, $query);

      while ($result = mysqli_fetch_assoc($results)) {
        $result_list .= "<tr style='font-size: 11px'>";
        $result_list .= "<td>{$result['id']}</td>";
        $result_list .= "<td>{$result['fname']}</td>";
        $result_list .= "<td>{$result['lname']}</td>";
        $result_list .= "<td>{$result['phone']}</td>";
        $result_list .= "<td>{$result['email']}</td>";
        $result_list .= "<td>{$result['location']}</td>";
        $result_list .= "<td>{$result['donateDate']}</td>";
        $result_list .= "<td>{$result['donateAmount']}</td>";
        $result_list .= "<td>{$result['message']}</td>";
        $result_list .= "<td><a href=\"app.view.php?id={$result['id']}&fname={$result['fname']}&lname={$result['lname']}&phone={$result['phone']}&email={$result['email']}&location={$result['location']}&donateDate={$result['donateDate']}&donateAmount={$result['donateAmount']}&message={$result['message']}\">E</a></td>";
        $result_list .= "<td><a href=\"app.ctrl.php?contact=delete&id={$result['id']}\" 
						onclick=\"return confirm('Are you sure?');\">D</a></td>";
        $result_list .= "</tr>";
      }
    } catch (Exception $e) {
      $err=array("time"=>date("F j, Y, g:i a"),"sql"=>$query,"mysqlerror"=> "Selected failed: " . $e->getMessage() ,"filename"=>__FILE__,"linenumber"=>__LINE__,"remotehost"=>gethostbyaddr($_SERVER['REMOTE_ADDR']),"clientaddress"=>$_SERVER['REMOTE_ADDR']);
      global $current;
      $my_file = fopen("error_log.txt", "a+") or die("can't open file");;
      $current .="Array(\n";
      foreach ($err as $key => $val){
        $current .=$key."==>".$val."\n";
      }
      $current .=")\n";
      fwrite($my_file,$current);
      echo '<script>alert("Select failed:")</script>';
      exit();
    }
  }
}

?>
