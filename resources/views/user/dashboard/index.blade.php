@extends('user.layout.index')

@section('title')

    
DASHBOARD

@endsection
@section('styles')
<style>
    blink {
        animation: blinker 2s linear infinite;
    }
    @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
  </style>   
@endsection


@section('contents')
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->refer_by_name(Auth::user()->referral)}}</h3>
                    <span class="text-uppercase font-size-xs">Your Child</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->refer_by_name(Auth::user()->refer_by)}}</h3>
                    <span class="text-uppercase font-size-xs">Refer By</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-lan icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->placement()}}</h3>
                    <span class="text-uppercase font-size-xs">Your Placement</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-indigo-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-cart2 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">$ {{Auth::user()->total_referrals()}}</h3>
                    <span class="text-uppercase font-size-xs">Referral Packages</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-violet-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->directIncome()->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Total Direct Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-orange-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->indirectTeamIncome()->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Total Indirect Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-teal-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->roiIncome()->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Total Reward Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-brown-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->totalEarning()}}</h3>
                    <span class="text-uppercase font-size-xs">Total Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-cash3 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-pointer icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        $ {{Auth::user()->package->price + Auth::user()->investment_amount}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Price</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-enter6 icon-3x text-indigo-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->package->name}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Name</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->a_date->format('d M,Y')}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Date</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-calendar52 icon-3x text-blue-400"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">{{Auth::user()->packagehistory()->count()}}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Purchased Package</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-bag icon-3x text-danger-400"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
