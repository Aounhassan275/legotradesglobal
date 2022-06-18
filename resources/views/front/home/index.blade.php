@extends('front.layout.index')
@section('meta')
    
<title>HOME | Lego Trades Global</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<!-- statics section begin -->
<section class="statics-section" id="statics-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                <div class="single-statics no-border">
                    <div class="icon-box">
                        <img src="{{asset('front/image/count-icon.png')}}" alt="image">
                    </div>
                    <div class="text-box">
                        <span class="counter">{{25900 + App\Models\User::all()->count()}}</span>
                        <h4>Registered Users</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                <div class="single-statics">
                    <div class="icon-box">
                        <img src="{{asset('front/image/count-icon-2.png')}}" alt="image">
                    </div>
                    <div class="text-box">
                        <span class="counter">$ {{54000 + App\Models\Withdraw::sum('payment')}}</span>
                        <h4>Withdraw </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                <div class="single-statics">
                    <div class="icon-box">
                        <img src="{{asset('front/image/count-icon-3.png')}}" alt="image">
                    </div>
                    <div class="text-box">
                        <span class="counter">{{23000 + App\Models\User::active()->count()}}</span>
                        <h4>Active Users</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- statics section end -->

<!-- about section begin -->
<section class="about-section navigation" id="about-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-left">
                        <div class="section-text">
                            <h5 class="section-subtitle">Who we are</h5>
                            <h2 class="section-title">About Lego Trades Global</h2>
                            <h5 class="about-details">To meet <span>today's challenges</span>, we've created a unique fund management system</h5>
                            <p class="section-description">Lego Trades Global - a private financial company specializing in service providing. Our system is risk-free thanks to the development and improvement of semi-automatic system of rates. We upgraded our automatic system so that the last step before the rate is now done by seller.</p>
                        </div>

                        <div class="about-box">
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-eff">
                                            <div class="icon-box">
                                                <i class="ren-efficiency"></i>
                                            </div>
                                        </div>
                                        <h3>Efficiency</h3>
                                        <div class="hover-box hover-left">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-ex">
                                            <div class="icon-box">
                                                <img src="{{asset('front/image/expierence.svg')}}" alt="#">
                                            </div>
                                        </div>
                                        <h3>Expierence</h3>
                                        <div class="hover-box hover-top">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-security">
                                            <div class="icon-box">
                                                <i class="ren-security"></i>
                                            </div>
                                        </div>
                                        <h3>Security</h3>
                                        <div class="hover-box hover-right">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-trans">
                                            <div class="icon-box">
                                                <i class="ren-transparent"></i>
                                            </div>
                                        </div>
                                        <h3>Transparent</h3>
                                        <div class="hover-box hover-left">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-simple">
                                            <div class="icon-box">
                                                <i class="ren-simple"></i>
                                            </div>
                                        </div>
                                        <h3>Simple</h3>
                                        <div class="hover-box hover-bottom">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-com">
                                            <div class="icon-box">
                                                <i class="ren-compliant"></i>
                                            </div>
                                        </div>
                                        <h3>Compliant</h3>
                                        <div class="hover-box hover-right">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="about-right-area">
                        <img src="{{asset('front/image/about-right-bg.png')}}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->

<!-- choose section begin -->
<section class="choose-section">
    <div class="overlay">
        <div class="container text-center">
            <div class="row mr-0 ml-0 d-flex justify-content-center">
                <div class="col-xl-8 col-lg-12">
                    <div class="section-text">
                        <h5 class="section-subtitle">Boost Your Money</h5>
                        <h2 class="section-title">Why Choose Us?</h2>
                        <p class="section-description">You can manage your products from anywhere either form home or work place, at any time.</p>
                    </div>
                </div>
            </div>
            <div class="choose-section-items">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="choose-section-carousel">

                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">Daily Income</h2>                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-2">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">24/7 Support</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-3">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-4">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">Easy to Use</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-5">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">DDoS  Protect</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-6">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">Affilate Program</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">Daily Income</h2>                        
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-2">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">24/7 Support</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-3">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">FASTEST PAYMENTS</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-4">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">Easy to Use</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-5">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">DDoS  Protect</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="single-item">
                                    <div class="icon-box box-6">
                                    </div>
                                    <div class="text-box">
                                        <h2 class="single-item-title">Affilate Program</h2>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- choose section end -->

<!-- invest section begin -->
<section class="invest-section">
    <div class="overlay">
        <div class="container text-center">
            <div class="row mr-0 ml-0 d-flex justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="section-text">
                        <h5 class="section-subtitle">Our Amazing Features</h5>
                        <h2 class="section-title">Investing for everyone</h2>
                        <p class="section-description">We are worldwide investment company who are committed to the principle of revenue maximization and reduction of the financial risks at investing.</p>
                    </div>
                </div>
            </div>
            <div class="invest-section-items">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="video-box">
                            <img src="{{asset('front/image/investing-video-bg.png')}}" alt="#">
                            <div class="icon-box">
                                <a href="https://www.youtube.com/watch?v=41aUBQ2Hn9U" class="video-play-btn popup-video hoverZoomLink">
                                <i class="ren-playicon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invest section end -->

<!-- features section begin -->
<section class="features-section">
    <div class="overlay">
        <div class="container text-center">
            <div class="row mr-0 ml-0 d-flex justify-content-center">
                <div class="col-xl-8 col-lg-12">
                    <div class="section-text">
                        <h5 class="section-subtitle">Explore Top Destinations</h5>
                        <h2 class="section-title">Our Features Places</h2>
                        <p class="section-description">We are worldwide investment company who are committed to the principle of revenue maximization and reduction of the financial risks at investing.</p>
                    </div>
                </div>
            </div>
            
            <div class="features-section-items">
                <div class="row">

                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-1.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">London</h2>                        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-2.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">New York</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-3.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Paris</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-4.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">San Francisco</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-5.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Vienna</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-6.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Berlin</h2>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
            <div class="features-section-items">
                <div class="row">

                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-7.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Austin</h2>                        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-8.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Boston</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-9.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Edinburgh</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-10.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Zurich</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-11.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Geneva</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="single-item">
                            <div class="icon-box">
                                <img src="{{asset('front/image/places-icon-12.png')}}" alt="#">
                            </div>
                            <div class="text-box">
                                <h2 class="single-item-title">Cambridge</h2>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>

        </div>
    </div>
</section>
<!-- features section end -->

<!-- investment section begin -->
<section class="investment-section" id="investment-section">
    <div class="overlay">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-text">
                        <h5 class="section-subtitle">INVESTMENT OFFER</h5>
                        <h2 class="section-title">Our Investment Plans</h2>
                        <p class="section-description">Lego Trades Global provides a straightforward and transparent mechanism to attract investments and make more profits.</p>
                    </div>
                </div>
            </div>

            <div class="investment-section-items">

                <div class="row d-flex justify-content-sm-center">
                    @foreach (App\Models\Package::all()->take(8) as $package)
                        <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                            <div class="single-item">    
                                <div class="title-box">
                                    <h3>{{$package->name}}</h3>
                                </div>    
                                <div class="icon-box">
                                    <img src="{{asset('front/image/places-icon-1.png')}}" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>$ {{$package->price}}</b></span>
                                    <h4 class="min-max">
                                        {{-- <span class="left">Direct Income : <b>$ {{$package->direct_income}}</b></span>
                                        <br>
                                        <br>
                                        <span class="right">Direct Team Income: <b>$ {{$package->direct_team_income}}</b></span>
                                        <br>
                                        <br>
                                        <span class="left">Upline Income : <b>$ {{$package->upline_income}}</b></span>
                                        <br>
                                        <br>
                                        <span class="right">Down Line Income: <b>$ {{$package->down_line_income}}</b></span>
                                        <br>
                                        <br>
                                        <span class="left">Upline Placement Income : <b>$ {{$package->upline_placement_income}}</b></span>
                                        <br>
                                        <br>
                                        <span class="right">Down Line Placement Income: <b>$ {{$package->down_line_placement_income}}</b></span>
                                        <br>
                                        <br>
                                        <span class="right">Trade Income: <b>$ {{$package->trade_income}}</b></span>
                                        <br>
                                        <br>
                                        <span class="right">Community Income: <b>$ {{$package->community_income}}</b></span> --}}
                                    </h4>
                                </div>
                                <div class="single-image">
                                    <img src="{{asset('front/image/investment-curveshape.png')}}" alt="#">
                                </div>
                                <div class="part-cart">
                                    <a href="{{route('user.login')}}" class="global-btn">Make Deposit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-7 col-md-5 col-sm-12 travula-content-center">
                    <div class="row d-flex justify-content-start">
                        <div class="col-lg-12">
                            <div class="payment-methods-outer">
                                <div class="payment-methods">
                                    <h3>WE ACCEPTED PAYMENT METHOD</h3>
                                    <div class="icon-gallery">
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/card-icon.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Credit Card</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/paypal.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Paypal</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/bitcoin.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Bitcoin</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/litecoin.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Litecoin</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/ethereum.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Ethereum</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/ripple.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Ripple</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- investment section end -->


<!-- referral section begin -->
<section class="referral-section">
    <div class="container">
        <div class="row referral-section-item">
            <div class="col-lg-8 col-md-10 col-sm-10">
                <div class="referral-section-right">
                    <div class="section-text">
                        <h5 class="section-subtitle">What You’ll Get As</h5>
                        <h2 class="section-title">An Affiliate Partner</h2>
                        <p class="section-description">Refferal Commmission and Membership Levels are of 3 levels as below.We give you the opportunity to earn money by recommending our website to others. You can start earning money even if you do not invest. </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people1"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">10%</span>
                                            <h4 class="item-text">Direct Referral Income</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item">
                                        <div class="icon-box">
                                            <i class="ren-people2 bg-second"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">2%</span>
                                            <h4 class="item-text">Indirect Referral Income</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="referral-single-item no-border">
                                        <div class="icon-box">
                                            <i class="ren-people3 bg-third"></i>
                                        </div>
                                        <div class="text-box">
                                            <span class="percentage">Upto 2%</span>
                                            <h4 class="item-text">Reward Income</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-area">
                                <div class="left-area">
                                    <p>Make money with Lego Trades Global</p>
                                    <a class="start-now-btn global-btn" href="#">START EARNING NOW</a>
                                </div>
                                <div class="right-area">
                                    <img src="{{asset('front/image/arrow.png')}}" alt="#">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- referral section end -->
@endsection