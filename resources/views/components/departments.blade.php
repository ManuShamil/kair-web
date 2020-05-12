<?php
    use App\Models\Department\Department;
    use App\Models\Image;
    use App\Classes\DepartmentListInfo;

    $route = request() -> path;

    $isAdmin = true;

    $displayData = [];

    foreach(Department::all() as $department) {
        array_push($displayData, new DepartmentListInfo($department));
    }

?>

<div class="department-section">
    <div class="department-container">
        <div class="row">

            @foreach ($displayData as $department)

            <div class="column">
                <article>
                    <div class="thumb-wrapper">
                        <a href="{{ $department -> page }}">
                            <img src="{{ $department -> image }}">
                        </a>
                    </div>
                    <div class="content-wrapper">
                        <h3 class="item-title"><a href="{{ $department -> page }}"> {{ $department->departmentName}}</a></h3>
                        <div class="item-content">
                            <p>No description..</p>
                        </div>
                        @if ($isAdmin)
                        <div class="edit-wrapper">
                            <div class="edit-icon">
                                <a href="{{ $department -> adminPage}}"></a>
                            </div>
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
