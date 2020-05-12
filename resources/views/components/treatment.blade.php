<?php
    use App\Classes\TreatmentListInfo;

    use App\Classes\TreatmentPageInfo;
    $displayData = new TreatmentPageInfo($treatment);

    $relatedTreatments = array();

    foreach ($treatment->department->treatments as $treatment) {
        array_push($relatedTreatments, new TreatmentListInfo($treatment));
    }
?>

<div class="treatment-info-container">
    <div class="row">
        <div class="col-1">
            <div class="treatment-info">
                <figure>
                    <a class="swipebox" title="{{ $displayData -> treatmentName }}">
                        <img width="0" height="0" src="{{ $displayData -> image }}" style="background-image : url('{{$displayData->image}}')" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image">                
                    </a>
                </figure>
                <h3 class="treatment-title">{{ $displayData -> treatmentName }}</h3>
            </div>
        </div>
        <div class="col-2">
            <div class="single-side-content">
                <h2 class="entry-title">{{ $displayData -> treatmentName }}</h2>
                <div class="entry-content">
                    <h4>{{ $displayData -> departmentName }}</h4>

                    <div class="toggle-main">
                        @foreach ($displayData->descriptions as $description)
                        <div class="toggle">
                            <div class="toggle-title">
                                <h3>{{ $description -> question }}
                                    <i class="fa fa-plus"></i>
                                </h3>
                            </div>
                            <div class="toggle-content" style="overflow:hidden; max-height: 0; transition: max-height 0.5s ease-out;">
                                <p>{{ $description -> answer }}</p>
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
        <p class="home-section-description">Treatments under <strong>{{ $displayData -> departmentName }}</strong></p>                        
    </header>
    <div class="row">
        @foreach ($relatedTreatments as $treatment )
        <div class="col">
            <article>
                <figure class="overlay-effect">
                    <figure>
                        <a href="{{$treatment->page}}" title="{{ $treatment ->treatmentName }}">
                            <img width="585" height="500" src="{{$treatment->image}}" style="background-image: url('{{ $treatment->image }}')" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image" alt="">
                        </a>
                    </figure>
                    <a class="overlay" href="{{$treatment->page}}">
                        <i class="top"></i> 
                        <i class="bottom"></i>
                    </a>
                </figure>
                <div class="entry-content">
                    <h3 class="entry-title">
                        <a href="{{$treatment->page}}">{{$treatment->treatmentName}}</a>
                    </h3>
                    <div class="entry-info">
                        <a rel="tag">{{ $treatment -> truncated_desc . '...'}}</a>
                    </div>

                </div>
                
            </article>
        </div>
        @endforeach
    </div>
</div>