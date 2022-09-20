{{-- footer big area --}}
<div id="footer" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="footer-menu-holder">
                    <h4>Company</h4>
                    <ul class="footer-menu">
                        <li><a href="{{ url('/blogs') }}">News</a></li>
                <?php
                    $all_companies = \App\Models\Page::where('footer_position', 'company')->get()->random(3);                    
                ?>
                    @foreach($all_companies as $all_company)
                        <li><a href="{{ route('frontend.page', $all_company->slug) }}">{{ $all_company->title }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="footer-menu-holder">
                    <h4>Services</h4>
                    <ul class="footer-menu">

                <?php
                    $all_services = \App\Models\Product::where('status', 1)->get()->random(4);
                ?>
                    @foreach($all_services as $all_service)
                        <li><a href="{{ route('frontend.page', $all_service->slug) }}">{{ $all_service->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="footer-menu-holder">
                    <h4>Other links</h4>
                    <ul class="footer-menu">
                <?php
                    $all_others = \App\Models\Page::where('footer_position', 'other_links')->get()->random(4);
                    
                ?>
                    @foreach($all_others as $all_other)
                        <li><a href="{{ route('frontend.page', $all_other->slug) }}">{{ $all_other->title }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="address-holder">
                    <div class="phone"><i class="fas fa-phone"></i> 00 285 900 38502</div>
                    <div class="email"><i class="fas fa-envelope"></i> hello@hostino.io</div>
                    <div class="address">
                        <i class="fas fa-map-marker"></i>
                        <div>Bahrain, Manama<br>
                            Road 398, Block 125<br>
                            The City Avenue<br>
                            Office 38, floor 3</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="hr">
{{-- footer copyright area --}}
<div class="footer-second">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 text-white">
                <div class="row p-3">
                    <div class="col-md-6 col-12">
                        <p class="m-0 footer-copyright-text"><a href="/">{{ config('settings.footer_copyright_text') }}</a></p>
                    </div>
                    <div class="col-md-6 col-12 footer-icon text-right">
                        <a href="{{ config('settings.social_facebook') }}"><i class="fab fa-facebook"></i></a>
                        <a href="{{ config('settings.social_instagram') }}"><i class="fab fa-instagram"></i></a>
                        {{-- <i class="fab fa-pinterest"></i> --}}
                        <a href="{{ config('settings.social_linkedin') }}"><i class="fab fa-linkedin"></i></a>
                        <a href="{{ config('settings.social_twitter') }}"><i class="fab fa-twitter"></i></a>
                        {{-- <i class="fab fa-youtube"></i> --}}
                        {{-- <i class="fab fa-vimeo"></i> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>