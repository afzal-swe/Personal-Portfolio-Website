

@php
    $website_settings = DB::table('website_settings')->first();
    $socials = DB::table('socials')->first();
@endphp



<footer class="footer">
    
    <div class="container">
        <div class="row justify-content-between">
            <a href="{{ url('/') }}"><h2  class="text-primary mb-5">Md.Afzal Hossen</h2></a>
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="title">Phone : {{$website_settings->phone_one ??'+81383 766 284'}}</h4>
                        <h4 class="title">Phone : {{$website_settings->phone_two ??'+81383 766 284'}}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{$website_settings->description ??'+81383 766 284'}}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                        <h4 class="title">Bangladesh</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{$website_settings->address ??'+81383 766 284'}}</p>
                        <a href="#" class="mail">E-mail : {{$website_settings->main_email ??'noreply@envato.com'}}</a><br>
                        <a href="#" class="mail">E-mail : {{$website_settings->support_email ??'noreply@envato.com'}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>This Is My Socials Links. <br> Please Click And Flow Me.</p>
                        <ul class="footer__social__list">
                            <li><a href="{{ $socials->linkedin ?? '#' }}"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $socials->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $socials->instagram ?? '#' }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $socials->twitter ?? '#' }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $socials->github ?? '#' }}"><i class="fab fa-github"></i></a></li>
                            <li><a href="{{ $socials->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>Copyright @ CodeArtist.IT 2024 All right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>