@extends('admin_template')

@section('title') | {!! trans('app.label.dashboard') !!}@endsection

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('app.menu.tmp_tposbill_item') !!}
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
                                <th>ITEM SEQ</th>
                                <th>MENU ITEM CODE</th>
                                <th>ITEM QTY</th>
                                <th>AMOUNT</th>
                                <th>TRANS TYPE</th>
                                <th>ITEM MANAGER CODE</th>
                                <th>REFUND REASON CODE</th>
                                <th>TRANS DATE</th>
                                <th>USER UPD</th>
                                <th>DATE UPD/th>
                                <th>TIME UPD</th>
                                <th>SYNC FLAG</th>
                                <th>AMT TAX</th>
                                <th>TS</th>
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
                ajax: "{!! route('admin::tmptposbillitem.show', 'datatables') !!}",
                columns: [
                    { data: 'REGION_CODE', name: 'REGION_CODE', searchable: true, width: '5%', className: 'dt-center' },
                    { data: 'OUTLET_CODE', name: 'OUTLET_CODE' },
                    { data: 'POS_CODE', name: 'POS_CODE' },
                    { data: 'DAY_SEQ', name: 'DAY_SEQ' },
                    { data: 'BILL_NO', name: 'BILL_NO' },
                    { data: 'ITEM_SEQ', name: 'ITEM_SEQ' },
                    { data: 'MENU_ITEM_CODE', name: 'MENU_ITEM_CODE' },
                    { data: 'ITEM_QTY', name: 'ITEM QTY' },
                    { data: 'AMOUNT', name: 'AMOUNT' },
                    { data: 'TRANS_TYPE', name: 'TRANS_TYPE' },
                    { data: 'ITEM_MANAGER_CODE', name: 'ITEM MANAGER CODE' },
                    { data: 'REFUND_REASON_CODE', name: 'REFUND_REASON_CODE' },
                    { data: 'TRANS_DATE', name: 'TRANS_DATE' },
                    { data: 'USER_UPD', name: 'USER_UPD' },
                    { data: 'DATE_UPD', name: 'DATE_UPD' },
                    { data: 'TIME_UPD', name: 'TIME_UPD' },
                    { data: 'SYNC_FLAG', name: 'SYNC_FLAG' },
                    { data: 'AMT_TAX', name: 'AMT_TAX' },
                    { data: 'TS', name: 'TS' }
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