<?php
require_once ("dbcontroller.php");

$db_handle=new DBController();

if(!empty($_POST["spec_type"])){
    $query="select * from spec where spec_type='".$_POST["spec_type"]."' AND spec='Frame' order by spec_name asc";
    $results=$db_handle->runQuery($query);
?>
    <option value disabled selected>Select Frame Name</option>
<?php
    foreach($results as $frametype){
?>
        <option value="<?php echo $frametype["spec_name"]; ?>"><?php echo $frametype["spec_name"]; ?></option>
<?php
    }
}
?>