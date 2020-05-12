<?php
    class FooterMenuItem {
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
        new FooterMenuItem("Home", "/", []),
        new FooterMenuItem("Why KairHealth", "/why", []),
        new FooterMenuItem("How it Works", "/how", []),
        new FooterMenuItem("Treatments", "/departments", []),
        new FooterMenuItem("Hospitals", "/hospitals", [
            new FooterMenuItem("Apollo", "/hospital/apollo", [])
        ]),
        new FooterMenuItem("Contact", "/contact", []),
    );
?>

<div class="top-container">
    <div class="row">
        <div class="section">
            <section>
                <h3 class="title">About KairHealth</h3>
                <div class="text-widget">
                    <p>Treatment in India Made Easy</p>
                    
                </div>
            </section>  
        </div>

        <div class="section">
            <section>
                <h3 class="title">Menu</h3>
                <nav id="footer-navigation">
                    <ul>
                        @foreach ($menuItems as $item)
                            <li><a href="{{ $item -> path }}">{{ $item -> text }}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </section>
        </div>
        <!--
        <div class="section">
            <section>
                <h3 class="title">Categories</h3>
                <div class="text-widget">
                    <p>Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diamno nummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    
                    <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </section>  
        </div>
        <div class="section">
            <section>
                <h3 class="title">Newsletter Sign Up</h3>

                <div class="text-widget">
                    <p>Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diamno nummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    
                    <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </section>  

        </div>-->
    </div>

</div>
<div class="footer-bottom">
        <div class="bottom-container">
            <div class="row">
                <div class="bottom-left">
                    <!--<nav id="footer-navigation">
                        <ul>
                            <li><router-link to="/">Home</router-link></li>
                            <li><router-link to="/treatments">Treatments</router-link></li>
                            <li><a>Hospitals</a></li>
                            <li><router-link to="/contact">Contact</router-link></li>
                            <li><a>Why KairHealth?</a></li>
                            <li><a>How it Works?</a></li>
                        </ul>
                    </nav>-->

                    <div class="site-info">
                        <p>© Copyright 2020. All Rights Reserved by KairHealth</p>
                    </div>
                </div>
            </div>
        </div>
    </div>