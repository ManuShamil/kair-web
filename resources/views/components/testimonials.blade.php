<?php
    $testimonials = App\Models\Testimonial::all()
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
                    @foreach($testimonials as $testimonial)
                        <div class="item">
                            <div class="carousel-item">
                                <header class="carousel-item-header">
                                    <h3 class="item-title">{{ $testimonial -> info[0] -> name }}</h3>
                                    <p class="item-text">{{ $testimonial -> info[0] -> testimonial }}</p>
                                </header>
                                <footer class="carousel-item-footer">
                                    <img width="70px" height="70px" src="/images/testimonial/{{$testimonial -> file_name}}" class="author-photo" >
                                    <div class="author-content">
                                        <h3 class="author-name">{{ $testimonial -> info[0] -> name }}</h3>
                                        <a class="author-link" target="_blank">{{ $testimonial -> info[0] -> location }}</a>
                                    </div>
                                </footer>
                            </div> 
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
</div>