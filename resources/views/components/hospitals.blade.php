<?php
    use App\Classes\HospitalListInfo;

    $route = request()->path();

    $hospitals = App\Models\Hospital\Hospital::all();

    $displayData = [];

    foreach($hospitals as $hospital) {
        array_push($displayData, new HospitalListInfo($hospital));
    }

    $isAdmin = true;
?>

<div class="hospitals-section">
        <div class="hospitals-container ">
            @if ($route == '/')
            <header>
                <h2 class="section-title">Browse our <span>Hospitals</span></h2>
                <p>More than <span>50+</span> Hospitals across India.</p>
            </header>
            @endif
            <div class="row">
                @foreach ($displayData as $hospital)
                <div class="column">
                    <article>
                        <figure class="overlay-effect">
                            <figure>
                                <a href="{{$hospital->page}}" title="{{$hospital->name}}">
                                    <img width="585" height="500" src="{{$hospital->image}}" style="background-image : url('{{$hospital->image}}')" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image" alt="">
                                </a>
                            </figure>
                            <a class="overlay" href="{{$hospital->page}}">
                                <i class="top"></i> 
                                <i class="bottom"></i>
                            </a>
                        </figure>
                        <div class="entry-content">
                            <h3 class="entry-title">
                                <a href="{{$hospital->page}}">{{$hospital->name}}</a>
                            </h3>
                            <div class="entry-info">
                                <a href="{{$hospital->page}}">{{$hospital->location}}</a>    
                            </div>
                            @if($route != '/')
                            <hr>
                            <p class="entry-summary">
                                {{ $hospital->truncatedDesc }}
                            </p>
                            @endif
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            @if ($route == '/')
            <div class="button-wrapper">
                <a href="/hospitals" >View all Hospitals</a>
            </div>
            @endif
        </div>
        @if ($isAdmin)
            @if($route != '/')
            <div class="admin-add">
                <a href="/admin/hospital/add">+</a>
            </div>
            @endif
        @endif
    </div>