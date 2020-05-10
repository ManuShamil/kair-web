<?php
    
    $departments = App\Models\Department::all();

?>

<div class="department-section">
    <div class="department-container">
        <div class="row">

            @foreach ($departments as $department)

            <div class="column">
                <article>
                    <div class="thumb-wrapper">
                        <a href="/treatments/{{ $department -> id }}">
                            <img src="images/department/{{ $department -> images ->first() -> file_name }}">
                        </a>
                    </div>
                    <div class="content-wrapper">
                        <h3 class="item-title"><a href="/treatments/{{ $department -> dept_id }}"> {{ $department->info->first()->full_name}}</a></h3>
                        <div class="item-content">
                            <p>No description..</p>
                        </div>
                    </div>
                </article>
            </div>

            @endforeach
        </div>
    </div>

    <div class="button-wrapper">
        <a href="/departments"></a>
    </div>
</div>