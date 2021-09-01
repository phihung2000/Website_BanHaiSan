<?php 
require_once('../../db/dbhelper.php');
    if(!empty($_POST)){
        if(isset($_POST['action'])){
            $action = $_POST['action'];

            switch ($action)
            {
                case 'XacNhan':
                    if(isset($_POST['id_HD']))
                    {
                        $id = $_POST['id_HD'];
                        $sql ='update hoadon SET TrangThai = "Xác Nhận" WHERE id_HD ='.$id;
                        execute($sql);
                        echo'xác nhận đơn hàng';
                    }
                    break;
            }

        }
    }
?>