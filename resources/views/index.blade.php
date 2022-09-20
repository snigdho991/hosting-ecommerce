@extends('layouts.master')
@section('title', config('settings.site_title'))
@section('content')

{{-- <div id="top-content" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div id="main-slider">
                    <div class="slide info-slide1" title="Welcome !">
                        <div class="image-holder"><img src="{{ asset('/assets/images/main-slide-img1.png') }}" alt="" />
                        </div>
                        <div class="text-holder txt">Take your career to the next level<br>
                            Get your website today.</div>
                        <div class="button-holder"><a href="signup.html" class="blue-button">Sign up now</a></div>
                    </div>
                    <div class="slide domainsearch-slide" title="Search">
                        <div class="image-holder"><img src="{{ asset('/assets/images/bg1.png') }}" alt="" /></div>
                        <div class="b-title txt">Find a personal or professional domain<br>
                            that stands out.</div>
                        <div class="domain-search-holder">
                            <form id="domain-search">
                                <input id="domain-text" type="text" name="domain"
                                    placeholder="Search a domain name here" />
                                <input id="search-btn" type="submit" name="submit" value="Search now" />
                            </form>
                        </div>
                    </div>
                    <div class="slide info-slide2" title="Get started">
                        <div class="image-holder"><img src="{{ asset('/assets/images/main-slide-img2.png') }}" alt="" />
                        </div>
                        <div class="text-holder txt">Take your career to the next level<br>
                            Get your website today.</div>
                        <div class="button-holder"><a href="signup.html" class="blue-button">Sign up now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div id="features" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">What makes Hostino the best choise for you?</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="mfeature-title">Uptime 100%. Guaranteed.</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="mfeature-box active">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mfeature-title">Readymade templates</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="mfeature-title">Amazing support</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="light-blue-button" href="#">About us</a>
            </div>
        </div>
    </div>
</div> --}}
<div id="pricing" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title">Our hosting plans. What suite you the best?</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="pricing-box pr-color1">
                    <div class="pricing-title" title="Starter">Starter</div>
                    <div class="pricing-box-body">
                        <div class="pricing-amount">
                            <div class="price">
                                <span class="currency">$</span><span class="amount">8.3</span>
                            </div>
                            <div class="duration">monthly</div>
                        </div>

                        <div class="pricing-details">
                            <ul>
                                <li>Storage — 10 GB</li>
                                <li>Bandwidth ( Traffic ) — 15 GB</li>
                                <li>Domain name — Free!</li>
                                <li>Ram — 128 MB</li>
                                <li>Subdomains — 10 GB</li>
                                <li>Sharing data</li>
                                <li>Unlimited Email Account</li>
                                <li class="not-supported">Support 24/7</li>
                                <li class="not-supported">One Click Install</li>
                                <li class="not-supported">Private SSL & IP</li>
                                <li class="not-supported">Free VoIP Phone Service</li>
                            </ul>
                        </div>

                        <div class="pricing-button"><a href="{{ route('product.show', 'starter-shared') }}" class="pricing-button">Buy now</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="pricing-box pr-color2 recommended">
                    <div class="pricing-title" title="Advanced">Advanced</div>
                    <div class="pricing-box-body">
                        <div class="pricing-amount">
                            <div class="price">
                                <span class="currency">$</span><span class="amount">12.7</span>
                            </div>
                            <span class="duration">monthly</span>
                        </div>

                        <div class="pricing-details">
                            <ul>
                                <li>Storage — 10 GB</li>
                                <li>Bandwidth ( Traffic ) — 15 GB</li>
                                <li>Domain name — Free!</li>
                                <li>Ram — 128 MB</li>
                                <li>Subdomains — 10 GB</li>
                                <li>Sharing data</li>
                                <li>Unlimited Email Account</li>
                                <li>Support 24/7</li>
                                <li>One Click Install</li>
                                <li class="not-supported">Private SSL & IP</li>
                                <li class="not-supported">Free VoIP Phone Service</li>
                            </ul>
                        </div>

                        <div class="pricing-button"><a href="{{ route('product.show', 'premium-shared') }}" class="pricing-button">Buy now</a></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="pricing-box pr-color3">
                    <div class="pricing-title" title="Superb">Superb</div>
                    <div class="pricing-box-body">
                        <div class="pricing-amount">
                            <div class="price">
                                <span class="currency">$</span><span class="amount">46</span>
                            </div>
                            <span class="duration">monthly</span>
                        </div>

                        <div class="pricing-details">
                            <ul>
                                <li>Storage — 10 GB</li>
                                <li>Bandwidth ( Traffic ) — 15 GB</li>
                                <li>Domain name — Free!</li>
                                <li>Ram — 128 MB</li>
                                <li>Subdomains — 10 GB</li>
                                <li>Sharing data</li>
                                <li>Unlimited Email Account</li>
                                <li>Support 24/7</li>
                                <li>One Click Install</li>
                                <li>Private SSL & IP</li>
                                <li>Free VoIP Phone Service</li>
                            </ul>
                        </div>

                        <div class="pricing-button"><a href="{{ route('product.show', 'business-shared') }}" class="pricing-button">Buy now</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 link-holder">
                <a href="webhosting.html" class="link-with-arrow">View all plans</a>
            </div>
        </div>
    </div>
</div>
{{-- <div id="apps" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title" title="One-Click Install">+ The best applications on the web, with one click
                    install.</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="apps-holder">
                    <div class="apps-links-holder">
                        <div class="app-icon-holder app-icon-holder1 opened" data-id="1">
                            <div class="app-icon"><img src="{{ asset('/assets/images/wordpress.png') }}"
                                    alt="wordpress"></div>
                            <div class="app-title">Wordpress</div>
                        </div>
                        <div class="app-icon-holder app-icon-holder2" data-id="2">
                            <div class="app-icon"><img src="{{ asset('/assets/images/joomla.png') }}" alt="joomla">
                            </div>
                            <div class="app-title">Joomla</div>
                        </div>
                        <div class="app-icon-holder app-icon-holder3" data-id="3">
                            <div class="app-icon"><img src="{{ asset('/assets/images/drupal.png') }}" alt="drupal">
                            </div>
                            <div class="app-title">Drupal</div>
                        </div>
                        <div class="app-icon-holder app-icon-holder4" data-id="4">
                            <div class="app-icon"><img src="{{ asset('/assets/images/magento.png') }}" alt="magento">
                            </div>
                            <div class="app-title">Magento</div>
                        </div>
                    </div>
                    <div class="apps-details-holder">
                        <div class="app-details">
                            <div class="app-details1 show-details">
                                <div class="app-title">Wordpress Hosting</div>
                                <div class="app-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            </div>
                            <div class="app-details2">
                                <div class="app-title">Joomla Hosting</div>
                                <div class="app-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat.</div>
                            </div>
                            <div class="app-details3">
                                <div class="app-title">Drupal Hosting</div>
                                <div class="app-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                    accusantium doloremque laudantium, totam rem aperiam.</div>
                            </div>
                            <div class="app-details4">
                                <div class="app-title">Magento Hosting</div>
                                <div class="app-text">emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                                    aut fugit, mo enim ipsam voluptatem quia voluptas sit.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div id="testimonials" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row-title" title="Testimonials">Testimonials</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div id="testimonials-slider">
                    <div>
                        <div class="details-holder">
                            <img class="photo" src="{{ asset('/assets/images/person1.jpg') }}" alt="">
                            <h4>Chris Walker</h4>
                            <h5>CEO & CO-Founder @HelloBrandio</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non
                                consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae
                                odio eget orci finibus auctor ut eget magna.</p>
                        </div>
                    </div>
                    <div>
                        <div class="details-holder">
                            <img class="photo" src="{{ asset('/assets/images/person2.jpg') }}" alt="">
                            <h4>Chris Walker</h4>
                            <h5>CEO & CO-Founder @HelloBrandio</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas non ante non
                                consequat. Aenean accumsan eros vel elit tristique, non sodales nunc luctus. Etiam vitae
                                odio eget orci finibus auctor ut eget magna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div id="more-features" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row-title" title="Great features">And more other great features</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <div class="icon-img"><img src="{{ asset('/assets/images/feature1.png') }}" alt="" /></div>
                    </div>
                    <div class="mfeature-title">%99.9 Uptime</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <div class="icon-img"><img src="{{ asset('/assets/images/feature2.png') }}" alt="" /></div>
                    </div>
                    <div class="mfeature-title">Domain Names</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <div class="icon-img"><img src="{{ asset('/assets/images/feature3.png') }}" alt="" /></div>
                    </div>
                    <div class="mfeature-title">Envirmoent Friendly</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <div class="icon-img"><img src="{{ asset('/assets/images/feature4.png') }}" alt="" /></div>
                    </div>
                    <div class="mfeature-title">Secure Servers</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <div class="icon-img"><img src="{{ asset('/assets/images/feature5.png') }}" alt="" /></div>
                    </div>
                    <div class="mfeature-title">Page Builder</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mfeature-box">
                    <div class="mfeature-icon">
                        <div class="icon-bg"><img src="{{ asset('/assets/images/clouds-light.png') }}" alt="" /></div>
                        <div class="icon-img"><img src="{{ asset('/assets/images/feature6.png') }}" alt="" /></div>
                    </div>
                    <div class="mfeature-title">E-commerce Ready</div>
                    <div class="mfeature-details">Mauris at libero sed justo pretium maximus ac non ex. Donec sit amet
                        ultrices dolo.</div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div id="bluebg-info" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">Ready to rock with Hostino,<br>
                    Register Today.</div>
                <a href="signup.html" class="white-button">Register</a>
            </div>
        </div>
    </div>
</div> --}}
@stop