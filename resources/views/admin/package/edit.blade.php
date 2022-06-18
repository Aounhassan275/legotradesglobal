@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3> EDIT PACKAGE | Lego Trades Global </h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Package</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.package.update',$package->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Package Name" value="{{$package->name}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price" value="{{$package->price}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Total Direct Income</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Total Direct Income" value="{{$package->direct_income}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Total Indirect Income</label>
                            <input type="number" class="form-control" name="indirect_income"  placeholder="Indirect Team Income" value="{{$package->indirect_income}}">
                        </div>
                    </div>
                   <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Withdraw Limit</label>
                        <input type="number" class="form-control" name="withdraw_limit"  placeholder="Withdraw Limit" value="{{$package->withdraw_limit}}">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Weekly Reward</label>
                        <input type="number" class="form-control" name="weekly_roi"  placeholder="Weekly Reward" value="{{$package->weekly_roi}}">
                    </div>
               </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection