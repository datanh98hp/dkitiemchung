<?php
    include_once "../../../config/config.php"; 
    $id = intval($_GET["id"]);
    $sql = "DELETE FROM `phieu_dang_ky` WHERE phieu_dang_ky.ma_pdk = $id";
    $result = $conn->query($sql);
    $phieudki = array();
    if($result){
        echo "<script>location.href='/dkitiemchung/admin/module/phieudangky/phieudangky.php'</script>";	
        }
  

?>