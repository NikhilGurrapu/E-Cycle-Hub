<?php
require_once ("dbcontroller.php");

$db_handle=new DBController();

if(!empty($_POST["spec_type"])){
    $query="select * from spec where spec_type='".$_POST["spec_type"]."' AND spec='Motor' order by spec_name asc";
    $results=$db_handle->runQuery($query);
?>
    <option value disabled selected>Select Motor Name</option>
<?php
    foreach($results as $motortype){
?>
        <option value="<?php echo $motortype["spec_name"]; ?>"><?php echo $motortype["spec_name"]; ?></option>
<?php
    }
}
?>