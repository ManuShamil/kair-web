<?php
    use App\Classes\TreatmentListInfo;

    $treatments = $department -> treatments;

    $data = [];

    foreach ($treatments as $treatment) {
        array_push($data, new TreatmentListInfo($treatment));
    }
?>

<div class="treatments-list-container">
    <div class="row">
        @foreach ($data as $treatment)
        <div class="column">
            <article class="treatment-item">
                <div class="entry-content">

                    <div class="title-wrapper">
                        <div class="treatment-item-thumb-wrapper">
                            <figure class="overlay-effect">
                                <img width="585" height="386" src="{{$treatment->image}}" class="treatment-item-image">	
                                <a class="overlay"><i class="top"></i> <i class="bottom"></i></a>
                            </figure>
                        </div>
                        <h3 class="entry-title">
                            <a href="{{$treatment->page}}">{{ $treatment->treatmentName}}</a>
                        </h3>
                    </div>


                    <div class="entry-info">
                        <p>{{ $treatment->truncated_desc . '...'}}</p>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div>
</div>