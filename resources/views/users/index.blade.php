@extends('admin_template')

@section('title') | {!! trans('app.label.dashboard') !!}@endsection

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('app.menu.user') !!}
        </h1>
       
    </section>
    <section class="content" id="index-component">
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered view-datatables" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script type="text/javascript">
    console.log('aaaa');
    $(function () {
        $('.view-datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('admin::user.show', 'datatables') !!}",
            columns: [
                { data: 'id', name: 'id', searchable: true, width: '5%', className: 'dt-center' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: '12%', className: 'dt-center' }
            ],
            drawCallback: function () {
                App.tooltip();
                call.modalDetail('.btn-show-detail');
                call.modalDelete('.btn-confirm-delete');
            }
        });
    });
</script>
@endpush