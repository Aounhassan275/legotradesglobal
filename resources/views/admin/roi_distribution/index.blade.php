@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Reward Income Distribution | Lego Trades Global</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Reward Income Distribution</h5>
                <a href="{{url('admin/roi_distrubtion/transfer')}}" class="btn btn-primary text-right">Transfer Amount From Reward Account To Cash Wallet </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.roi_distribution.save')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Distribute</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            let name = $(this).attr('name');
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.source.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            // responsive: true
        });
    });
</script>
@endsection