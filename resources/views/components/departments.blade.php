<?php
    use App\Models\Department\Department;
    use App\Models\Image;
    use App\Classes\DepartmentListInfo;

    $route = request() -> path();

    $isAdmin = false;

    if (Session::get('isAdmin')) {
        $isAdmin = true;
    }

    $displayData = [];

    $count = 0;
    foreach(Department::all() as $department) {
        if ($route == '/' && $count >= 4)
            break;
        

        array_push($displayData, new DepartmentListInfo($department));

        $count++;
    }

?>

<div class="department-section">
    <div class="department-container">
        <header>
            <h2 class="section-title">Discover High Quality and Affordable Treatment in India</h2>
        </header>
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
                        <!--<div class="item-content">
                            <p>No description..</p>
                        </div>-->
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
        @if($route != '/')
        <div class="admin-add">
            <a href="/admin/department/add">+</a>
        </div>
        @endif
    @endif
</div>
