@extends('layout.main')
@section('content')
@if(Auth::user()->role == 'admin')
<div class="m-portlet">
    <div class="m-portlet__body  m-portlet__body--no-padding">
        <div class="row m-row--no-padding m-row--col-separator-xl">
            <div class="col-xl-4">
                <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">User</h3>
                                <span class="m-widget1__desc">Seluruh User yang ada</span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-brand">{{$tenant}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">User</h3>
                                <span class="m-widget1__desc">Seluruh User yang ada</span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-danger">{{$tenant}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">User</h3>
                                <span class="m-widget1__desc">Jenis User yang tersedia</span>
                            </div>
                            <div class="col m--align-right">
                                <span class="m-widget1__number m--font-success">{{$tenant}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->role == 'user')
<div class="m-portlet">
    <div class="m-portlet__body  m-portlet__body--no-padding">
        <div class="row m-row--no-padding m-row--col-separator-xl">
            <div class="col-xl-4">
                <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">{{$data->nama}}</h3>
                                <span class="m-widget1__desc">Nama User yang masuk</span>
                            </div>
                            <div class="col m--align-right">
                                <!-- <span class="m-widget1__number m--font-brand">user</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">{{$data->alamat}}</h3>
                                <span class="m-widget1__desc">Alamat User yang masuk</span>
                            </div>
                            <div class="col m--align-right">
                                <!-- <span class="m-widget1__number m--font-danger">user</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-widget1">
                    <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                            <div class="col">
                                <h3 class="m-widget1__title">{{$data->email}}</h3>
                                <span class="m-widget1__desc">Email User yang masuk</span>
                            </div>
                            <div class="col m--align-right">
                                <!-- <span class="m-widget1__number m--font-success">user</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- <div class="m-portlet m-portlet--head-solid-bg m-portlet--bordered m-portlet--info">
    <div class="m-portlet__head ">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    TOP 10 PRODUK TERLARIS<p id="hax"></p>
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="m_datatable"></div>
    </div>
</div>
<script type="text/javascript">
    var method;
    window.addEventListener('DOMContentLoaded', (event) => {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var tableData = $('.m_datatable').mDatatable({
            data: {
                type: 'remote', 
                source: {
                    read: {
                        url: "{{ route('dashboard.data_list') }}", 
                        method: 'POST', 
                        headers: {
                            'X-CSRF-TOKEN': csrfToken 
                        },
                        dataType: 'json' 
                    }
                },
                pageSize: 10, 
                serverPaging: true 
            },

            layout: {
                theme: 'default', 
                class: '', 
                scroll: false, 
                footer: false 
            },

            sortable: false,

            pagination: true,

            search: {
                input: $('#generalSearch')
            },
            order: [
                [0, 'desc'] 
            ],

            columns: [{
                field: "no",
                title: "No",
                width: 50,
                sortable: false,
                textAlign: 'center',
            }, {
                field: "nama",
                title: "Nama Barang"
            }, {
                field: "stok",
                title: "Stok"
            }, {
                field: "harga_jual",
                title: "Harga"
            }, {
                field: "total_penjualan",
                title: "Terjual"
            }]
        });

        $('#m_form_status').on('change', function () {
            tableData.search($(this).val(), 'status');
        });

        $('#m_form_status').selectpicker();
    });
</script> -->
@endsection




