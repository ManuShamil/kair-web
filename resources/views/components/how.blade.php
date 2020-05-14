<?php
    use App\Classes\HowListInfo;

    $route = Request::path();

    $how_list = App\Models\How\How::all();


    $displayData = [];
    foreach($how_list as $how) {
        array_push($displayData, new HowListInfo($how));
    }
?>

<div class="why-section">
    <div class="why-container">
        <header>
            <h2 class="section-title">How it Works?</h2>
            <p><span>KairHealth</span> helps you arrange the best health care solutions in India. </p>
        </header>

        <div class="row">
            @foreach ($displayData as $data)
            <div class="column">
                <article>
                    <div class="thumb-wrapper"><a><img src="{{ $data->image }}" alt=""></a></div>
                    <div class="content-wrapper">
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
                <a href="/how"></a>
            </div>
        @endif
    </div>
</div>