<?php 

    

    $department_list = App\Models\Department::all();

    for ($i=0; $i<count($department_list); $i++) {

        echo json_encode($department_list[$i]);
    }

?>