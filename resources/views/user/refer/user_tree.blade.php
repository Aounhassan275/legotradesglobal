@extends('user.layout.index')
@section('title')
    Referral Tree
@endsection
@section('contents')
<div class="row">
    @foreach (Auth::user()->mrefers() as $key => $refer)
    <div class="col-xl-3 col-sm-6">
        <div class="card bg-slate-600" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    @if($refer->image)
                        <img class="img-fluid rounded-circle" src="{{asset($refer->image)}}" width="170" height="170" alt="">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" width="170" height="170" alt="">
                    @endif
                </div>
                <h6 class="font-weight-semibold mb-0">{{$refer->name}}</h6>
                <span class="d-block opacity-75"><strong>Cash Wallet</strong> $ {{$refer->cash_wallet}} /-</span>
                <span class="d-block opacity-75"><strong>Total Refferral</strong> $ {{$refer->mrefers()->count()}} /-</span>
                <span class="d-block opacity-75"><strong>Active Refferral</strong> $ {{$refer->refers()->count()}} /-</span>
                <span class="d-block opacity-75"><strong>Phone</strong> {{@$refer->phone}}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')
@endsection