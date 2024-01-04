<div class="container">
    <div class="homeContact__wrap">
        <div class="row">
            <div class="col-lg-6">
                <div class="section__title">
                    <span class="sub-title">07 - Say hello</span>
                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                </div>
                <div class="homeContact__content">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                    <h2 class="mail"><a href="mailto:Info@webmail.com">Hazhe.chakmaraq@gmail.com</a></h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="homeContact__form">
                    <form method="POST" action="{{route('contact.store')}}">
                        @csrf
                        <input type="text"  name="name" placeholder="Enter name*">
                        <input type="email" name="email" placeholder="Enter mail*">
                        <input type="number" name="phone" placeholder="Enter number*">
                        <textarea name="message" placeholder="Enter Massage*"></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>