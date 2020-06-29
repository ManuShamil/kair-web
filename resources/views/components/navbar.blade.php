<?php

    class menuItem {
        public $text;
        public $path;
        public $children = [];

        function __construct($text, $path, $children) {
            $this->text = $text;
            $this->path = $path;
            $this->children = $children;
        }
        
        function isEmpty() {

            if (count($this -> children) > 0)
                return false;
            else
                return true;
        }
    }

    $menuItems = array(
        new menuItem("Home", "/", []),
        new menuItem("Why KairHealth", "/why", []),
        new menuItem("How it Works", "/how", []),
        new menuItem("Treatments", "/departments", []),
        new menuItem("Hospitals", "/hospitals", [
            new menuItem("Apollo", "/hospital/apollo", [])
        ]),
        new menuItem("Contact", "/contact", []),
    );

    
?>

<div class="container">
    <div>   
        <a class="site-logo" href="/"></a>
    </div>
    <div class="contact-container">
        <div class="phone">
            <svg class="icon-mail" version="1.1" width="34px" height="34px"  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512" >			
            <path d="M486.4,59.733H25.6c-14.138,0-25.6,11.461-25.6,25.6v341.333c0,14.138,11.461,25.6,25.6,25.6h460.8
				c14.138,0,25.6-11.461,25.6-25.6V85.333C512,71.195,500.539,59.733,486.4,59.733z M494.933,426.667
				c0,4.713-3.82,8.533-8.533,8.533H25.6c-4.713,0-8.533-3.82-8.533-8.533V85.333c0-4.713,3.82-8.533,8.533-8.533h460.8
				c4.713,0,8.533,3.82,8.533,8.533V426.667z"/>
			<path d="M470.076,93.898c-2.255-0.197-4.496,0.51-6.229,1.966L266.982,261.239c-6.349,5.337-15.616,5.337-21.965,0L48.154,95.863
				c-2.335-1.96-5.539-2.526-8.404-1.484c-2.865,1.042-4.957,3.534-5.487,6.537s0.582,6.06,2.917,8.02l196.864,165.367
				c12.688,10.683,31.224,10.683,43.913,0L474.82,108.937c1.734-1.455,2.818-3.539,3.015-5.794c0.197-2.255-0.51-4.496-1.966-6.229
				C474.415,95.179,472.331,94.095,470.076,93.898z"/>
			<path d="M164.124,273.13c-3.021-0.674-6.169,0.34-8.229,2.65l-119.467,128c-2.162,2.214-2.956,5.426-2.074,8.392
				c0.882,2.967,3.301,5.223,6.321,5.897c3.021,0.674,6.169-0.34,8.229-2.65l119.467-128c2.162-2.214,2.956-5.426,2.074-8.392
				C169.563,276.061,167.145,273.804,164.124,273.13z"/>
			<path d="M356.105,275.78c-2.059-2.31-5.208-3.324-8.229-2.65c-3.021,0.674-5.439,2.931-6.321,5.897
				c-0.882,2.967-0.088,6.178,2.074,8.392l119.467,128c3.24,3.318,8.536,3.442,11.927,0.278c3.391-3.164,3.635-8.456,0.549-11.918
				L356.105,275.78z"/></svg>
            <small>Email</small>
            <span>
                contact@kairhealth.in
            </span>
        </div>

        <!--
        <div class="phone">
            <svg class="icon-phone" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="34px" height="40px" viewBox="0 0 50 50" version="1.1"><path d="M 11.839844 2.988281 C 11.070313 2.925781 10.214844 3.148438 9.425781 3.703125 C 8.730469 4.1875 7.230469 5.378906 5.828125 6.726563 C 5.128906 7.398438 4.460938 8.097656 3.945313 8.785156 C 3.425781 9.472656 2.972656 10.101563 3 11.015625 C 3.027344 11.835938 3.109375 14.261719 4.855469 17.980469 C 6.601563 21.695313 9.988281 26.792969 16.59375 33.402344 C 23.203125 40.011719 28.300781 43.398438 32.015625 45.144531 C 35.730469 46.890625 38.160156 46.972656 38.980469 47 C 39.890625 47.027344 40.519531 46.574219 41.207031 46.054688 C 41.894531 45.535156 42.59375 44.871094 43.265625 44.171875 C 44.609375 42.769531 45.800781 41.269531 46.285156 40.574219 C 47.390625 39 47.207031 37.140625 45.976563 36.277344 C 45.203125 35.734375 38.089844 31 37.019531 30.34375 C 35.933594 29.679688 34.683594 29.980469 33.566406 30.570313 C 32.6875 31.035156 30.308594 32.398438 29.628906 32.789063 C 29.117188 32.464844 27.175781 31.171875 23 26.996094 C 18.820313 22.820313 17.53125 20.878906 17.207031 20.367188 C 17.597656 19.6875 18.957031 17.320313 19.425781 16.425781 C 20.011719 15.3125 20.339844 14.050781 19.640625 12.957031 C 19.347656 12.492188 18.015625 10.464844 16.671875 8.429688 C 15.324219 6.394531 14.046875 4.464844 13.714844 4.003906 L 13.714844 4 C 13.28125 3.402344 12.605469 3.050781 11.839844 2.988281 Z M 11.65625 5.03125 C 11.929688 5.066406 12.09375 5.175781 12.09375 5.175781 C 12.253906 5.398438 13.65625 7.5 15 9.53125 C 16.34375 11.566406 17.714844 13.652344 17.953125 14.03125 C 17.992188 14.089844 18.046875 14.753906 17.65625 15.492188 L 17.65625 15.496094 C 17.214844 16.335938 15.15625 19.933594 15.15625 19.933594 L 14.871094 20.4375 L 15.164063 20.9375 C 15.164063 20.9375 16.699219 23.527344 21.582031 28.410156 C 26.46875 33.292969 29.058594 34.832031 29.058594 34.832031 L 29.558594 35.125 L 30.0625 34.839844 C 30.0625 34.839844 33.652344 32.785156 34.5 32.339844 C 35.238281 31.953125 35.902344 32.003906 35.980469 32.050781 C 36.671875 32.476563 44.355469 37.582031 44.828125 37.914063 C 44.84375 37.925781 45.261719 38.558594 44.652344 39.425781 L 44.648438 39.425781 C 44.28125 39.953125 43.078125 41.480469 41.824219 42.785156 C 41.195313 43.4375 40.550781 44.046875 40.003906 44.457031 C 39.457031 44.867188 38.96875 44.996094 39.046875 45 C 38.195313 44.972656 36.316406 44.953125 32.867188 43.332031 C 29.417969 41.714844 24.496094 38.476563 18.007813 31.984375 C 11.523438 25.5 8.285156 20.578125 6.664063 17.125 C 5.046875 13.675781 5.027344 11.796875 5 10.949219 C 5.003906 11.027344 5.132813 10.535156 5.542969 9.988281 C 5.953125 9.441406 6.558594 8.792969 7.210938 8.164063 C 8.519531 6.910156 10.042969 5.707031 10.570313 5.339844 L 10.570313 5.34375 C 11.003906 5.039063 11.382813 5 11.65625 5.03125 Z "></path></svg>
            <small>Contact</small>
            <span>
                +91-494-246-8004
            </span>
        </div>
        -->

        <div class="button-wrapper">
            <button class="cmb-pop-opener">Call me Back</button>

            <div class="cmb-form">
                <img src="/icons/technical-support.png" style="max-width: 64px;">
                <div style="padding: 1rem 0px; font-weight: 600;">Get Call back</div>
                <hr>
                <div style="padding: 1rem 0px;">Get Call back for Treatment plan</div>
                <div>
                    <form action="/callback" method="POST">
                        @csrf
                        <input type="text" placeholder="Mobile Number">
                        <button type="submit">Get Call back</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="nav-container"> 
    <nav class="desktop-menu">
        <ul>
            @foreach ($menuItems as $item)
                <li>
                    <a href="{{ $item->path }}"> {{ $item->text }} </a>

                    @if (!($item->isEmpty()))
                    <ul class="sub-menu">
                        @foreach ((array) $item->children as $subitem)
                            <li>
                                <a href="{{ $subitem->path}}"> {{ $subitem->text }}</a>
                            </li>

                        @endforeach    
                    </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="menu-bar">
        <a class="menu-reveal" v-on:click="openMobileMenu">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <nav class="mobile-menu" >
            <ul>
                @foreach ($menuItems as $item)
                    <li>
                        <a href="{{ $item -> path }}" class="{{ $item->isEmpty() == true ? 'max-flex' : '' }}">{{ $item-> text }}</a>

                        @if (!($item->isEmpty()))
                        <a class="menu-expand"> + </a>

                        <ul style="overflow: hidden;max-height: 0px; transition: max-height 0.5s ease-out" class="sub-menu collapsed">
                            @foreach ((array) $item->children as $subitem)
                            <li>
                                <a href="{{ $subitem -> path }}"> {{ $subitem -> text}} </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>

    <!--
    <div class="search-form">
        <form method="GET" action="/hospitals" style="display: flex;">
            <input name="hospital" type="text" placeholder="Search..">
            <div class="button-wrapper">
                <button type="submit">_</button>
            </div>
        </form>
    </div>
    -->
</div>