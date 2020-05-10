<?php
    
    $departments = App\Department::all();


    foreach($departments as $department) {
        echo ' IO : ' . $department -> dept_id;
        $images = $department -> images;
        foreach ($images as $image) {
            echo 'Image dept : ' . $image -> department_id;
        }

        echo json_encode($images);
    }


?>
{{--
<div class="department-section">
    <div class="department-container">
        <div class="row">

            @foreach ($department_list as $department)

            <div class="column">
                <article>
                    <div class="thumb-wrapper">
                        <a>
                            <img src="/images/department/{{1}}.png">
                        </a>
                    </div>
                    <div class="content-wrapper">
                        <h3 class="item-title"><a :to="`/treatments/${department.departmentId}`"></a></h3>
                        <div class="item-content">
                            <p></p>
                        </div>
                    </div>
                </article>
            </div>

            @endforeach
        </div>
    </div>

    <div class="button-wrapper">
        <router-link to="/treatments"></router-link>
    </div>
</div> --}}