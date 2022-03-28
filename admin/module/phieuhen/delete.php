<?php
    include_once "../../../config/config.php"; 
    $id = intval($_GET["id"]);
    $sql = "DELETE FROM `phieu_hen_tiem` WHERE phieu_hen_tiem.ma_hen = $id";
    $result = $conn->query($sql);
    $phieudki = array();
    if($result){
        echo "<script>location.href='/dkitiemchung/admin/module/phieuhen/phieuhen.php'</script>";	
        }
  

?>