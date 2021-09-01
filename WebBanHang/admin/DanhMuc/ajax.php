<?php 
require_once('../../db/dbhelper.php');
    if(!empty($_POST)){
        if(isset($_POST['action'])){
            $action = $_POST['action'];

            switch ($action)
            {
                case 'delete':
                    if(isset($_POST['id']))
                    {
                        $id = $_POST['id'];
                        $sql = 'delete from danhmuc where danhmuc.id_DanhMuc='.$id;
                        execute($sql);
                    }
                    break;
            }

        }
    }
?>