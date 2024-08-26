@extends('frontend.layouts.app')
@section('content')
     <!-- banner-area -->
     @include('frontend.layouts.partial.banner.banner')
     <!-- banner-area-end -->

     <!-- about-area -->
     @include('frontend.layouts.partial.about.about')
     <!-- about-area-end -->

     <!-- services-area -->
     @include('frontend.layouts.partial.services.services')
     <!-- services-area-end -->

     <!-- work-process-area -->
    @include('frontend.layouts.partial.work_process.work')
     <!-- work-process-area-end -->

     <!-- portfolio-area -->
     @include('frontend.layouts.partial.portfolio.portfolio')
     <!-- portfolio-area-end -->

     <!-- partner-area -->
     @include('frontend.layouts.partial.partner.partner')
     <!-- partner-area-end -->

     <!-- testimonial-area -->
     @include('frontend.layouts.partial.testimonial.testimonial')
     <!-- testimonial-area-end -->

     <!-- blog-area -->
    @include('frontend.layouts.partial.blog.blog')

    <section class="homeContact">
     <div class="container">
         <div class="homeContact__wrap">
             <div class="row">
                 <div class="col-lg-6">
                     <div class="section__title">
                         <span class="sub-title">07 - Say hello</span>
                         <h2 class="title">Any questions? Feel free <br> to contact</h2>
                     </div>
                     <div class="homeContact__content">
                         <p>I can creating any web site develope, your need any web site , please you can send me message thank you.</p>
                         <h2 class="mail"><a href="afzal.swe@gmail.com">afzal.swe@gmail.com</a></h2>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="homeContact__form">
                         <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                             <input type="text" name="name" placeholder="Enter name*">
                             <input type="email" name="email" placeholder="Enter mail*">
                             <input type="number" name="phone" placeholder="Enter number*">
                             <textarea name="message" name="message" placeholder="Enter Massage*"></textarea>
                             <button type="submit">Send Message</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

     <!-- blog-area-end -->
@endsection