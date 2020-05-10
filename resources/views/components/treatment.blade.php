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
                            <div class="toggle-content">
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