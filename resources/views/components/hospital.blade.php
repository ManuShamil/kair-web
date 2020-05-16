<?php
    use App\Classes\HospitalInfo;
    use App\Classes\HospitalListInfo;

    $hospital = $hospital;

    $hospitalInfo = new HospitalInfo($hospital);

    $relatedHospitals = [];

    $related_hospitals = App\Models\Location::find($hospital->location_id)->hospitals;

    foreach($related_hospitals as $related) {
        array_push($relatedHospitals, new HospitalListInfo($related)); 
    }

?>

<div class="hospital-info-container">
    <div class="row">
        <div class="col-1">
            <div class="hospital-info">
                <figure>
                    <a class="swipebox"  title="{{ $hospitalInfo-> name }}">
                        <img width="0" height="0"  src="{{ $hospitalInfo->image}}" style="background-image : url('{{ $hospitalInfo->image}}')" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image" alt="">                
                    </a>
                </figure>
                <h3 class="hospital-title">{{ $hospitalInfo-> name }}</h3>
                <div class="hospital-departments">
                    @foreach ($hospitalInfo->departments as $department)
                    <div class="department">
                        <a href="{{$department->page}}">{{$department->name}}</a>
                    </div>
                    @endforeach
                </div>
                <div class="hospital-specialities">
                    <p>
                        <strong>Beds</strong>
                        <span>{{ $hospitalInfo->beds}}</span>
                    </p>

                    <p>
                        <strong>Accreditations</strong>
                        @foreach ($hospitalInfo->accreditations as $accreditation)
                        <span class="accreditaion" style="background-image : url('{{$accreditation->image}}')">{{$accreditation->name}}</span>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="single-side-content">
                <h2 class="entry-title">{{ $hospitalInfo->name }}</h2>
                <div class="entry-content">
                    <h4>{{ $hospitalInfo->address }}</h4>
                    <h5>{{ $hospitalInfo->landmark }}</h5>

                    @foreach ($hospitalInfo->infrastructures as $infrastructure)
                    <p> {{ $infrastructure->infrastructure }}</p>
                    @endforeach

                    <h4>About {{ $hospitalInfo->name }}</h4>
                    @foreach ($hospitalInfo->about as $about)
                    <p> {{ $about->about}}</p>
                    @endforeach

                    <h4>Achievements and Specialities </h4>
                    <ul>
                        @foreach ($hospitalInfo->specialities as $speciality)
                        <li> {{$speciality->speciality}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="related-hospitals-container">
    <header class="home-section-header">
        <h2 class="home-section-title">Related <span>Hospitals</span></h2>
        <p class="home-section-description">Looking for similar hospitals in or around <strong>{{ $hospitalInfo->name }}</strong> region?</p>                        
    </header>
    <div class="row">
        @foreach($relatedHospitals as $related)
        <div class="col">
            <article>
                <figure class="overlay-effect">
                    <figure>
                        <a href="{{ $related->page }}" title="{{$related->name}}">
                            <img width="585" height="500" src="{{$related->image}}" style="background-image : url('{{$related->image}}')" class="attachment-doctor-grid-thumb size-doctor-grid-thumb wp-post-image" alt="">
                        </a>
                    </figure>
                    <a class="overlay" href="{{$related->page}}">
                        <i class="top"></i> 
                        <i class="bottom"></i>
                    </a>
                </figure>
                <div class="entry-content">
                    <h3 class="entry-title">
                        <a href="{{$related->page}}">{{ $related->name }}</a>
                    </h3>
                    <div class="entry-info">
                        <a rel="tag">{{ $related->location}}</a>
                    </div>

                </div>
                
            </article>
        </div>
        @endforeach
    </div>
</div>