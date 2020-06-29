<?php
    use App\Classes\TestimonialListInfo;

    $route = Request::path();

    $testimonials = App\Models\Testimonial\Testimonial::all();

    $displayData = [];
    foreach($testimonials as $testimonial) {
        array_push($displayData, new TestimonialListInfo($testimonial));
    }

    $isAdmin = false;

    if (Session::get('isAdmin')) {
        $isAdmin = true;
    }
?>

<div class="testimonials-section">
    <div class="testimonials-container">
        <header class="container-header">
            <h2 class="section-title">What patients say <span>About KairHealth</span></h2>
            <p></p>
        </header>

        <div class="testimonial-carousel">
            <div class="stage-outer">
                <div class="stage">
                    @foreach($displayData as $testimonial)
                        <div class="item">
                            <div class="carousel-item">
                                <header class="carousel-item-header">
                                    <h3 class="item-title">{{ $testimonial -> name }}</h3>
                                    <p class="item-text">{{ $testimonial -> quote }}</p>
                                </header>
                                <footer class="carousel-item-footer">
                                    <img width="70px" height="70px" src="{{$testimonial -> image}}" class="author-photo" >
                                    <div class="author-content">
                                        <h3 class="author-name">{{ $testimonial -> name }}</h3>
                                        <a class="author-link" target="_blank">{{ $testimonial -> location }}</a>
                                    </div>
                                </footer>
                                @if ($isAdmin)
                                <div class="edit-wrapper">
                                    <div class="edit-icon">
                                        <a href="/admin/testimonial/{{ $testimonial -> testimonialID}}/edit"></a>
                                    </div>
                                </div>
                                @endif
                            </div> 
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
    @if ($isAdmin)
        <div class="admin-add">
            <a href="/admin/testimonial/add">+</a>
        </div>
    @endif
</div>

<style>
    .item {
        flex: 0 0 12.5%;

    }

    @media (max-width: 992px) {
        .item {
            flex : 0 0 25%;
        }
    }

</style>