<div>
    @if($success)
        <div class="result" >
            <div class="success">
                <img src="/icons/tick.png">
                <h2>Your Message has been sent succesfully.</h2>
                <div class="button-wrapper">
                    <a  href="/">Go to Home</a>
                </div>
            </div>
        </div>
    @else

    <div class="contact-form">
        <div class="contact-form-container">
            <div class="page-content-wrapper">
                <div class="entry-content">
                    <h2>Get in Touch</h2>
                    <p>
                        Would you like to know more about Us?
                        <br>
                        Use this form to send us a message, We will reply within 24 hours.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <form action="/contact" method="POST">
                        @csrf
                        <input type="text" name="name" id="name" value="{{ $name }}" placeholder="Full Name">
                        <input type="text" name="email" id="email" value="{{ $email }}" placeholder="Email Address">
                        <input type="text" name="number" id="number" value="{{ $number }}" placeholder="Phone Number">
                        <textarea cols="30" rows="5" type="text" value="{{ $message }}" name="message" id="message" placeholder="Enter your Message.."></textarea>
                        <div class="button-wrapper">
                            <input class="button" type="submit" placeholder="Submit">
                        </div>
                    </form>

                    
                    <div class="error-container">
                        @if (in_array('name', $errors))
                        <label class="error" for="name">* Please provide your name</label> 
                        @endif
                        @if (in_array('email', $errors))
                        <label class="error" for="email">* Please provide a valid email address</label> 
                        @endif
                        @if (in_array('number', $errors))
                        <label class="error" for="number">* Please provide your phone number </label> 
                        @endif
                        @if (in_array('message', $errors))
                        <label class="error" for="message">* Please fill in your message</label> 
                        @endif
                    </div>
                    

                </div>
                <div class="col-2">
                    <div class="contact-sidebar">
                        <h2><span>KairHealth</span></h2>
                        <address>1<sup>st</sup> floor Machingal Tower, Kolappuram Kerala 676305</address>
                        <a href="tel:+914942468004"><strong>Phone:</strong> +91-494-246-8004</a>
                        <a href="mailto:contact@kairhealth.in"><strong>Email:</strong> contact@kairhealth.in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>