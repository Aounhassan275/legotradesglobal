@extends('user.layout.index')
@section('title')
VIEW REWARD INCOME 
@endsection
@section('styles')
<script src="{{asset('user_asset/global_assets/js/demo_pages/picker_date.js')}}"></script>
<style>
      .chart-container {
  position: relative;
  margin: auto;
  height: 80vh;
}
</style>
@endsection
@section('contents')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Reward Income History</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th>#</th>
                <th>Due To</th>
                <th>Created At</th>
                <th>Amount</th>

            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->roiIncome as $key => $income)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>Company</td>
                    <td>{{$income->created_at->format('d M,Y')}}</td>
                    <td>$ {{$income->price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-center">Total Income : </td>
                    <td>$ {{Auth::user()->roiIncome->sum('price')}}</td>
                </tr>
        </tbody>
    </table>
</div>

@endsection
@section('scripts')

@endsection