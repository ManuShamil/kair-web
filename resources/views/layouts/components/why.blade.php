<?php
    class Card {
        public $image;
        public $title;
        public $description;

        function __construct($image, $title, $description) {
            $this -> image = $image;
            $this -> title = $title;
            $this -> description = $description;
        }
    }

    $myCards = [
        new Card("/icons/smile.png", "Free Service", "You do not pay for KairHealth services. We are financed by the hospitals."),
        new Card("/icons/assistance.png", "24/7 assistance", "Our doctors and staff stay in touch 24/7 to resolve any unforeseen issues during the whole treatment duration.."),
        new Card("/icons/heart.png", "Freedom to choose", "You get to choose 50+ alternative healthcare providers based on accreditation, ambiance and method of treatment."),
        new Card("/icons/add.png", "Pre & post treatment assistance", "You get pre and post treatment consultations with a KairHealth doctor and, if required, a second opinion too."),
        new Card("/icons/snowflake.png", "Transparency", "KairHealth shares all required information and makes sure that you clearly know how much and what you are paying for, before the travel."),
        new Card("/icons/check.png", "Medical Visa assistance", "We provide you with the invitation letter from the hospital and help you with your medical visa application."),
        new Card("/icons/global.png", "Help with leisure tours", "Besides your treatment, we also help you in arranging leisure trips in order to make your visit to India a holistic experience."),
        new Card("/icons/cutlery.png", "Halal and organic", "KairHealth makes sure that the treatment is 100% herbal based, with use of organic products only. We make sure that the food and services provided are Halal."),
        new Card("/icons/handshake.png", "Services on demand", "We help you to arrange services of interpreters, bystanders and chefs. We also assist you with ticketing, foreign exchange, accommodation, SIM card and inner city transportation.")
    ]

?>

<div class="why-section">
    <div class="why-container">
        <header>
            <h2 class="section-title">Why <span>KairHealth</span>?</h2>
            <p><span>KairHealth</span> helps you arrange the best health care solutions in India. </p>
        </header>

        <div class="row">
            @foreach ($myCards as $card)
            <div class="column">
                <article>
                    <div class="thumb-wrapper"><a><img src="{{ $card -> image}}" alt=""></a></div>
                    <div class="content-wrapper">
                        <h3 class="item-title"> {{ $card -> title }}</h3>
                        <div class="item-content">
                            <p> {{ $card -> description }}</p>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        <div class="button-wrapper">
            <a to="/why"></a>
        </div>
    </div>
</div>