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
    <x-slot:title>Edit Reservasi</x-slot:title>
    <section class="section">
        <div class="section-header">
            <h1>Edit Reservasi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('reservasi.update', $reservasi->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text"
                                            value="{{ $errors->any()? old('nama_pelanggan') : $reservasi->nama_pelanggan}}"
                                            name="nama_pelanggan" class="form-control @error('nama_pelanggan')
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
                                            <option value="A1" @if ($reservasi->nomor_meja == 'A1')
                                                selected
                                                @endif>A1</option>
                                            <option value="A2" @if ($reservasi->nomor_meja == 'A2')
                                                selected
                                                @endif>A2</option>
                                            <option value="A3" @if ($reservasi->nomor_meja == 'A3')
                                                selected
                                                @endif>A3</option>
                                            <option value="B1" @if ($reservasi->nomor_meja == 'B1')
                                                selected
                                                @endif>B1</option>
                                            <option value="B2" @if ($reservasi->nomor_meja == 'B1')
                                                selected
                                                @endif>B2</option>
                                            <option value="B3" @if ($reservasi->nomor_meja == 'B1')
                                                selected
                                                @endif>B3</option>
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
                                        <input type="number"
                                            value="{{ $errors->any()? old('jumlah_orang') : $reservasi->jumlah_orang}}"
                                            name="jumlah_orang" class="form-control @error('jumlah_orang')
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
                                        <input type="text"
                                            value="{{ $errors->any()? old('tanggal_reservasi') : $reservasi->tanggal_reservasi}}"
                                            name="tanggal_reservasi" class="form-control datepicker @error('tanggal_reservasi')
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
                                        <input type="text"
                                            value="{{ $errors->any()? old('waktu_reservasi') : date('g:i A', strtotime($reservasi->waktu_reservasi))}}"
                                            name="waktu_reservasi" class="form-control timepicker @error('waktu_reservasi')
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
                                        rows="10">{{ $errors->any()? old('catatan_khusus') : $reservasi->catatan_khusus}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <select name="status" id="" class="form-control @error('status')
                                            is-invalid
                                        @enderror">
                                            <option value="terjadwal" @if ($reservasi->status == 'terjadwal')
                                                selected
                                                @endif>Terjadwal</option>
                                            <option value="hadir" @if ($reservasi->status == 'hadir')
                                                selected
                                                @endif>Hadir</option>
                                            <option value="dibatalkan" @if ($reservasi->status == 'dibatalkan')
                                                selected
                                                @endif>Dibatalkan</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
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