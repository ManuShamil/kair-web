<?php
    use App\Classes\WhyListInfo;

    $route = Request::path();

    $why_list = App\Models\Why\Why::all();


    $displayData = [];
    foreach($why_list as $why) {
        array_push($displayData, new WhyListInfo($why));
    }

    
    $isAdmin = false;

    if (Session::get('isAdmin')) {
        $isAdmin = true;
    }
?>

<div class="why-section">
    <div class="why-container">
        <header>
            <h2 class="section-title">Why KairHealth?</h2>
            <p><span>KairHealth</span> helps you arrange the best health care solutions in India. </p>
        </header>

        <div class="row">
            @foreach ($displayData as $data)
            <div class="column">
                <article>
                    <div class="thumb-wrapper"><a><img src="{{ $data->image }}" alt=""></a></div>
                    <div class="content-wrapper">
                         @if ($isAdmin)
                        <div class="edit-wrapper">
                            <div class="edit-icon">
                                <a href="/admin/why/{{ $data -> whyID}}/edit"></a>
                            </div>
                        </div>
                        @endif
                        <h3 class="item-title"> {{ $data -> info }}</h3>
                        <div class="item-content">
                            <p> {{ $data -> description }}</p>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        @if ($route == '/')
            <div class="button-wrapper">
                <a href="/why"></a>
            </div>
        @endif
    </div>
    @if ($isAdmin)
        @if($route != '/')
        <div class="admin-add">
            <a href="/admin/why/add">+</a>
        </div>
        @endif
    @endif
</div>