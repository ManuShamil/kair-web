<?php
    $treatments = $department -> treatments;

?>

<div class="treatments-list-container">
    <div class="row">
        @foreach ($treatments as $treatment)
        <div class="column">
            <article class="treatment-item">
                <div class="entry-content">

                    <div class="title-wrapper">
                        <div class="treatment-item-thumb-wrapper">
                            <figure class="overlay-effect">
                                <img width="585" height="386" src="/images/treatment/{{$treatment -> file_name}}" class="treatment-item-image">	
                                <a class="overlay"><i class="top"></i> <i class="bottom"></i></a>
                            </figure>
                        </div>
                        <h3 class="entry-title">
                            <a href="/{{$treatment -> department -> dept_id}}/{{$treatment -> id}}">{{ $treatment -> titles -> first() -> title}}</a>
                        </h3>
                    </div>


                    <div class="entry-info">
                        <p>{{ substr($treatment -> descriptions -> first() -> answer, 0, 150) . '...'}}</p>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
    </div>
</div>