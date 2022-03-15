<?php
require_once ("dbcontroller.php");

$db_handle=new DBController();

if(!empty($_POST["spec_type"])){
    $query="select * from spec where spec_type='".$_POST["spec_type"]."' AND spec='Rims' order by spec_name asc";
    $results=$db_handle->runQuery($query);
?>
    <option value disabled selected>Select Rims Name</option>
<?php
    foreach($results as $rimstype){
?>
        <option value="<?php echo $rimstype["spec_name"]; ?>"><?php echo $rimstype["spec_name"]; ?></option>
<?php
    }
}
?>
