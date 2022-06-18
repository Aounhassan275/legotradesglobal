@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW PACKAGES | Lego Trades Global</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Package Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Package Name</th>
                        <th style="width:auto;">Package Price</th>
                        <th style="width:auto;">Direct Income</th>
                        <th style="width:auto;">Indirect Income</th>
                        <th style="width:auto;">Weekly Reward</th>
                        <th style="width:auto;">Withdraw Limit</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Package::all() as $key => $package)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{$package->price}}</td>
                        <td>{{$package->direct_income}}</td>
                        <td>{{$package->indirect_income}}</td>
                        <td>{{$package->weekly_roi}}</td>
                        <td>{{$package->withdraw_limit}}</td>
                        <td class="table-action">
                            <a href="{{route('admin.package.edit',$package->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        </td>
                        <td class="table-action">
                            <form action="{{route('admin.package.destroy',$package->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            // responsive: true,
            // lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection