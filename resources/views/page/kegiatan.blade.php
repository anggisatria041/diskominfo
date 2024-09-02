@extends('layout.main')
@section('subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Kegiatan</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Kegiatan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="m-portlet m-portlet--head-solid-bg m-portlet--bordered m-portlet--brand">
    <div class="m-portlet__head ">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Manage Data Kegiatan<p id="hax"></p>
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <button type="button" class="btn btn-info btn-md">
                <i class="la la-plus"></i> Tambah
            </button>
        </div>
    </div>
    <div class="m-portlet__body">
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <!-- <div class="col-md-4">
                            <div class="m-form__group m-form__group--inline">
                                <div class="m-form__label">
                                    <label>Status:</label>
                                </div>
                                <div class="m-form__control">
                                    <select class="form-control m-bootstrap-select" id="m_form_status">
                                        <option value="">All</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Request">Request</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-md-none m--margin-bottom-10"></div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--end: Search Form -->

        <!--begin: Datatable -->
        <div class="m_datatable"></div>
        <!--end: Datatable -->
    </div>
</div>

<!-- form -->
<script type="text/javascript">
    var method;
    window.addEventListener('DOMContentLoaded', (event) => {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var tableData = $('.m_datatable').mDatatable({
            data: {
                type: 'remote', 
                source: {
                    read: {
                        url: "{{ route('aplikasi.data_list') }}", 
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
                field: "nos",
                title: "No",
                width: 50,
                sortable: false,
                textAlign: 'center',
            }, {
                field: "tgl",
                title: "Tanggal Kegiatan"
            }, {
                field: "nama_kegiatan",
                title: "Nama Kegaiatn"
            }, {
                field: "uraian_kegiatan",
                title: "Uraian Kegiatan"
            }]
            });

            $('#m_form_status').on('change', function () {
                tableData.search($(this).val(), 'status');
            });

            $('#m_form_status').selectpicker();
    });
    function resetForm() {
        $('#m_form_1_msg').hide();
        $('#formAdd')[0].reset();
        $('.m-select2').select2({
            width: '100%'
        });
    }

    function add_ajax() {
        method = 'add';
        resetForm();
        $('#exampleModalLongTitle').html("Tambah Karyawan");
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#m_form_1_msg').hide();
        $('#m_modal_6').modal('show');
        $('#btnSaveAjax').show();
    }
    function save() {
        let url;

        if (method === 'add') {
            url = "{{ route('aplikasi.store') }}";
        } else {
            url = "{{ route('aplikasi.update') }}";
        }

        const formData = $('#formAdd').serialize();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const formDataWithToken = formData + '&_token=' + encodeURIComponent(csrfToken);

        if ($('[name="keterangan"]').val() == "" ) {
            $('#m_form_1_msg').show();
            mApp.unblock(".modal-content");
        } else {
            $.ajax({
                url: url,
                type: "POST",
                data: formDataWithToken,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        $('#m_modal_6').modal('hide');
                        swal("Berhasil..", "Data Anda berhasil disimpan", "success");
                        $('.m_datatable').mDatatable().reload();
                    } else {
                        swal({
                            text: data.message,
                            type: "warning",
                            closeOnConfirm: true
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal("Oops", "Data gagal disimpan!", "error");
                }
            });
        }
    }
    function edit(id) {
        method = 'edit';
        resetForm(); 

        $('#exampleModalLongTitle').html("Edit Karyawan"); 

        $.ajax({
            url: "{{ url('aplikasi/edit') }}/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data.data) {
                    $('#formAdd')[0].reset();
                    $('[name="aplikasi_id"]').val(data.data.aplikasi_id);
                    $('.m-select2').select2({width : '100%'});
                    $('[name="tgl_pengajuan"]').val(data.data.tgl_pengajuan);
                    $('[name="keterangan"]').val(data.data.keterangan);
                    $('[name="nama_aplikasi"]').val(data.data.nama_aplikasi);
                    $('.m-select2').select2({width : '100%'});
                    $('#m_modal_6').modal('show'); 
                } else {
                    swal("Oops", "Gagal mengambil data!", "error");
                }
                mApp.unblockPage();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                mApp.unblockPage();
                alert('Error get data from ajax');
            }
        });
    }
    function hapus(id) {
        swal({
            title: "Apakah anda yakin?",
            text: "Anda yakin ingin hapus data ini?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "<span><i class='flaticon-interface-1'></i><span>Ya, Hapus!</span></span>",
            confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--icon",
            cancelButtonText: "<span><i class='flaticon-close'></i><span>Batal Hapus</span></span>",
            cancelButtonClass: "btn btn-metal m-btn m-btn--pill m-btn--icon"
        }).then(function(e) {
            if (e.value) {
                mApp.blockPage({ //block page
                    overlayColor: "#000000",
                    type: "loader",
                    state: "primary",
                    message: "Please wait..."
                });

                $.ajax({
                    url: "{{ url('aplikasi') }}/" + id, 
                    type: "DELETE", 
                    data: {
                        _token: '{{ csrf_token() }}' 
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status == true) {
                            swal("Berhasil..", "Data Anda berhasil dihapus", "success");
                            $('.m_datatable').mDatatable().reload();
                        } else {
                            swal("Oops", "Data gagal dihapus!", "error");
                        }
                        mApp.unblockPage();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        mApp.unblockPage();
                        swal("Oops", "Data gagal dicancel!", "error");
                    }
                })
            }
        });
    }
</script>
@stop