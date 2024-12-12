<?php
    if(isset($_GET['delete_user'])){
        $delete_id = $_GET['delete_user'];
        // delete from user payments
        $delete_query = "DELETE FROM `admin_table` WHERE admin_id = $delete_id";
        $delete_result = mysqli_query($con,$delete_query);
        if($delete_result){
            echo "<script>window.alert('Usuario administrador Eliminado correctamente.');</script>";
            echo "<script>window.open('index.php?list_users','_self');</script>";
        }

    }
?>