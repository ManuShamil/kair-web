<?php
    $route = Request::path();

    $how_list = App\Models\How::all();

    /*if ($route == "/") {
        $how_list = array_slice($how_list, 0, 3);
    }*/

?>

<div class="why-section">
    <div class="why-container">
        <header>
            <h2 class="section-title">How it Works?</h2>
            <p><span>KairHealth</span> helps you arrange the best health care solutions in India. </p>
        </header>

        <div class="row">
            @foreach ($how_list as $how)
            <div class="column">
                <article>
                    <div class="thumb-wrapper"><a><img src="/images/how/{{ $how -> file_name}}" alt=""></a></div>
                    <div class="content-wrapper">
                        <h3 class="item-title"> {{ $how -> infos[0] -> info }}</h3>
                        <div class="item-content">
                            <p> {{ $how -> infos[0] -> description }}</p>
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