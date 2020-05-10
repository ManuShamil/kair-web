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
                        <a>
                            <img src="images/department/{{ $department -> images[0] -> file_name }}">
                        </a>
                    </div>
                    <div class="content-wrapper">
                        <h3 class="item-title"><a> {{ $department->info[0]->full_name}}</a></h3>
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
        <router-link to="/treatments"></router-link>
    </div>
</div>