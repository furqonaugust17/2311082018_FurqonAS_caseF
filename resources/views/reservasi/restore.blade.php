@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
@endsection

@section('script')
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="{{asset('assets/modules/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        let table = new DataTable('#reservasi-table', {
            lengthMenu: [
                [10],
                [10]
            ],
            responsive: true, 
            processing: true,
            serverSide: true,
            ajax: "{{ url()->current() }}",
            columns: [
                    { data: null, name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: 'nama_pelanggan',
                    },
                    {
                        data: 'nomor_meja',
                    },
                    {
                        data: 'jumlah_orang',
                    },
                    {
                        data: 'tanggal_reservasi',
                    },
                    {
                        data: 'waktu_reservasi',
                    },
                    {
                        data: 'catatan_khusus',
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'id',
                        "render": function(data, type, row) {
                            return `<div class="d-flex">
                                        <button type="button" class="btn btn-danger shadow btn-xs sharp" onclick="restoreData(${data})">Pulihkan</button>
									</div>`
                        }
                    }
                ],
                columnDefs: [
                    {
                        targets: 0,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }
                ]
            });
        })
        function restoreData(id) {
            swal({
                title: 'Anda yakin?',
                text: 'Data akan akan dipulihkan!!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal('Data Berhasil Dipulihkan', {
                    icon: 'success',
                });
                let uriRestore = "{{ route('reservasi.restore', ['id' => ':id']) }}".replace(':id', id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: uriRestore,
                    type: 'POST',
                    success: function(data) {
                        iziToast.success({
                            title: 'Success',
                            message: data.message,
                            position: 'topRight'
                        });
                        $('#reservasi-table').DataTable().ajax.reload()
                    }
                })
            } else {
                swal('pulih data Dibatalkan');
            }
            });
        }
</script>
@endsection
<x-layout>
    <x-slot:title>Data Terhapus</x-slot:title>
    <section class="section">
        <div class="section-header">
            <h1>Data Reservasi Terhapus</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Reservasi</h4>
                        </div>
                        <div class="card-body">
                            <table class="w-100" id="reservasi-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nomor Meja</th>
                                        <th>Jumlah Orang</th>
                                        <th>Tanggal Reservasi</th>
                                        <th>Waktu Reservasi</th>
                                        <th>Catatan Khusus</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>