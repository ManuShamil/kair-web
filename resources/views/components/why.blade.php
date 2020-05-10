<?php
    $route = Request::path();

    $why_list = App\Models\Why::all();

    /*if ($route == "/") {
        $why_list = array_slice($why_list, 0, 3);
    }*/

?>

<div class="why-section">
    <div class="why-container">
        <header>
            <h2 class="section-title">Why <span>KairHealth</span>?</h2>
            <p><span>KairHealth</span> helps you arrange the best health care solutions in India. </p>
        </header>

        <div class="row">
            @foreach ($why_list as $why)
            <div class="column">
                <article>
                    <div class="thumb-wrapper"><a><img src="/images/why/{{ $why -> file_name}}" alt=""></a></div>
                    <div class="content-wrapper">
                        <h3 class="item-title"> {{ $why -> infos[0] -> info }}</h3>
                        <div class="item-content">
                            <p> {{ $why -> infos[0] -> description }}</p>
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
</div>