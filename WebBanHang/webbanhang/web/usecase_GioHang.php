<?php 
require_once('../../db/dbhelper.php');
    if(!empty($_POST)){
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            switch ($action)
            {
                case 'delete':
                    if(isset($_POST['id_HD']))
                    {
                        $id = $_POST['id_HD'];
                        $sql = 'delete from hoadon where id_HD='.$id;
                        execute($sql);
                    }
                    break;
            }

        }
    } 
?>