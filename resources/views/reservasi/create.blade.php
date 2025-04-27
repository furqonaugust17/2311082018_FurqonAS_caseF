@section('css')
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">

@endsection

@section('script')
<script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').daterangepicker({
        locale: {format: 'YYYY-MM-DD'},
        singleDatePicker: true,
      });
    })
</script>
@endsection

<x-layout>
    <x-slot:title>Tambah Reservasi</x-slot:title>
    <section class="section">
        <div class="section-header">
            <h1>Tambah Reservasi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('reservasi.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text" value="{{old('nama_pelanggan')}}" name="nama_pelanggan"
                                            class="form-control @error('nama_pelanggan')
                                            is-invalid
                                        @enderror">
                                        @error('nama_pelanggan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Meja</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-table"></i>
                                            </div>
                                        </div>
                                        <select name="nomor_meja" id="" class="form-control">
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="A3">A3</option>
                                            <option value="B1">B1</option>
                                            <option value="B2">B2</option>
                                            <option value="B3">B3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Orang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <input type="number" value="{{old('jumlah_orang')}}" name="jumlah_orang" class="form-control @error('jumlah_orang')
                                            is-invalid
                                        @enderror">
                                        @error('jumlah_orang')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Reservasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="text" value="{{old('tanggal_reservasi')}}" name="tanggal_reservasi"
                                            class="form-control datepicker @error('tanggal_reservasi')
                                            is-invalid
                                        @enderror">
                                        @error('tanggal_reservasi')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Waktu Reservasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="text" value="{{old('waktu_reservasi')}}" name="waktu_reservasi"
                                            class="form-control timepicker @error('waktu_reservasi')
                                            is-invalid
                                        @enderror">
                                        @error('waktu_reservasi')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Catatan Khusus</label>
                                    <textarea class="form-control" name="catatan_khusus" id="catatan_khusus" cols="30"
                                        rows="10">{{old('catatan_khusus')}}</textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>