<?php

    $treatment = $treatment->get()->first()

?>

<div class="treatment-info-container">
    <div class="row">
        <div class="col-1">
            <div class="treatment-info">
                <figure>
                    <a class="swipebox" title="{{ $treatment -> titles[0] -> title}}">
                        <img width="0" height="0" src="/images/treatment/{{ $treatment -> file_name }}" style="background-image : url('/images/treatment/{{ $treatment -> file_name }}')" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image">                
                    </a>
                </figure>
                <h3 class="treatment-title">{{ $treatment -> titles[0] -> title}}</h3>
            </div>
        </div>
        <div class="col-2">
            <div class="single-side-content">
                <h2 class="entry-title">{{ $treatment -> titles[0] -> title}}</h2>
                <div class="entry-content">
                    <h4>{{ $treatment -> department -> info -> first() -> full_name }}</h4>

                    <div class="toggle-main">
                        @foreach ($treatment -> descriptions as $description)
                        <div class="toggle">
                            <div class="toggle-title">
                                <h3>{{ $description -> first() -> question }}
                                    <i class="fa fa-plus"></i>
                                </h3>
                            </div>
                            <div class="toggle-content" style="overflow:hidden; max-height: 0; transition: max-height 0.5s ease-out;">
                                <p>{{ $description -> first() -> answer }}</p>
                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="related-treatments-container">
    <header class="home-section-header">
        <h2 class="home-section-title">Related <span>Treatments</span></h2>
        <p class="home-section-description">Treatments under <strong>{{ $treatment -> department -> info -> first() -> full_name }}</strong></p>                        
    </header>
    <div class="row">
        @foreach ($treatment -> department -> treatments as $related )
        <div class="col">
            <article>
                <figure class="overlay-effect">
                    <figure>
                        <a href="/{{ $related -> department -> dept_id}}/{{ $related -> id }}" title="{{ $related -> titles -> first() -> title }}">
                            <img width="585" height="500" src="/images/treatment/{{ $related -> file_name }}" style="background-image: url('{{ $related -> file_name }}')" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image" alt="">
                        </a>
                    </figure>
                    <a class="overlay" href="/{{ $related -> department -> dept_id}}/{{ $related -> id }}">
                        <i class="top"></i> 
                        <i class="bottom"></i>
                    </a>
                </figure>
                <div class="entry-content">
                    <h3 class="entry-title">
                        <a href="/{{ $related -> department -> dept_id}}/{{ $related -> id }}">{{ $related -> titles -> first() -> title }}</a>
                    </h3>
                    <div class="entry-info">
                        <a rel="tag">{{ substr($related -> descriptions -> first() -> answer, 0, 150) . '...'}}</a>
                    </div>

                </div>
                
            </article>
        </div>
        @endforeach
    </div>
</div>