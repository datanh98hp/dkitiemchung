<?php
    include_once "../../../config/config.php"; 
    $id = intval($_GET["id"]);
    $sql = "DELETE FROM `phieu_sang_loc` WHERE phieu_sang_loc.ma_psl = $id";
    $result = $conn->query($sql);
    $phieudki = array();
    if($result){
        echo "<script>location.href='/dkitiemchung/admin/module/phieusangloc/phieusangloc.php'</script>";	
        }
  

?>