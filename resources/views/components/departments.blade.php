<?php

    use App\Models\Image;

    $route = request() -> path;

    $isAdmin = true;
    
    $departments = App\Models\Department\Department::all();

?>

<div class="department-section">
    <div class="department-container">
        <div class="row">

            @foreach ($departments as $department)

            <div class="column">
                <article>
                    <div class="thumb-wrapper">
                        <a href="/treatments/{{ $department -> id }}">
                            <img src="/images/{{ $department -> image_id }}">
                        </a>
                    </div>
                    <div class="content-wrapper">
                        <h3 class="item-title"><a href="/treatments/{{ $department -> dept_id }}"> {{ $department->info->first()->full_name}}</a></h3>
                        <div class="item-content">
                            <p>No description..</p>
                        </div>
                        @if ($isAdmin)
                        <div class="edit-icon">
                            <a href="/admin/department/{{ $department -> id}}/edit">Edit</a>
                        </div>
                        @endif
                    </div>
                </article>
            </div>

            @endforeach
        </div>
    </div>

    @if(Request::path() == '/')
        <div class="button-wrapper">
            <a href="/departments"></a>
        </div>
    @endif

    @if ($isAdmin)
        <div class="admin-add">
            <a href="/admin/department/add">+</a>
        </div>
    @endif
</div>
