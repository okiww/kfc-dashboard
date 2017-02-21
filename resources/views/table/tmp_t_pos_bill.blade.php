@extends('admin_template')

@section('title') | {!! trans('app.label.dashboard') !!}@endsection

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('app.menu.tmp_tposbill') !!}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Total Data : {{ $count }}</a></li>
        </ol>
    </section>
    <section class="content" id="index-component">
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered view-datatables" width="100%">
                        <thead>
                            <tr>
                                <th>REGION CODE</th>
                                <th>OUTLET CODE</th>
                                <th>POS CODE</th>
                                <th>DAY SEQ</th>
                                <th>BILL NO</th>
                                <th>TRANS DATE</th>
                                <th>BILL DATE</th>
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
                ajax: "{!! route('admin::tmptposbill.show', 'datatables') !!}",
                columns: [
                    { data: 'REGION_CODE', name: 'REGION_CODE', searchable: true, width: '5%', className: 'dt-center' },
                    { data: 'OUTLET_CODE', name: 'OUTLET_CODE' },
                    { data: 'POS_CODE', name: 'POS_CODE' },
                    { data: 'DAY_SEQ', name: 'DAY_SEQ' },
                    { data: 'BILL_NO', name: 'BILL_NO' },
                    { data: 'TRANS_DATE', name: 'TRANS_DATE' },
                    { data: 'BILL_DATE', name: 'BILL_DATE' }
                ],
                drawCallback: function () {
                    // App.tooltip();
                    // call.modalDetail('.btn-show-detail');
                    // call.modalDelete('.btn-confirm-delete');
                }
            });
        });
    </script>
@endpush