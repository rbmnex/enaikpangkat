@extends('layouts.main')

@section('CSS')
    @include('segment.layouts.custom_view_links.toast.css.index')
    @include('segment.layouts.custom_view_links.datatable.css.index')
    @include('segment.layouts.custom_view_links.swal.css.index')
    @include('segment.layouts.custom_view_links.datepicker.flatpickr.css.index')
@endsection

@section('customCss')
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Borang</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="card" style="padding:25px">
            <div class="row">
                <div class="col-md-12">
                    <h3>Bahagian 1 - Maklumat Pegawai</h3>
                </div>
                <br><br><br>
                <div class="col-md-3">(i) Nama</div>
                <div class="col-md-9">
                    : {{ $data['user']['nama'] }}<br>
                </div>
                <div class="col-md-3">(ii) Nokp </div>
                <div class="col-md-9">
                    : {{ $data['user']['nokp_baru'] }}
                </div>
                <div class="col-md-3">(iii) Skim Perkhidmatan</div>
                <div class="col-md-9">
                    : {{ $data['user']['jawatan'] }}
                </div>
                <div class="col-md-3">(iv) Gred Hakiki</div>
                <div class="col-md-9">
                    : {{ $pemohon->gred }}
                </div>
                <div class="col-md-3">(v) Nama & Gred Jawatan yang Disandang Sekarang</div>
                <div class="col-md-9">
                    : {{ $pemohon->gred.' / '.$pemohon->jawatan}}
                </div>
                <div class="col-md-3">(vii) Tarikh Memangku Jawatan Sekarang</div>
                <div class="col-md-9">
                    : {{ $ukp11->tkh_lapor_diri ?? 'Tiada Tarikh'}}
                </div>
                <br><br><br>
                <div class="col-md-12">
                    <h3>Bahagian 2 - KRITERIA YANG DINILAI</h3>
                </div>
                <br><br><br>
                @foreach($data['soalan'] as $s)
                    <div class="col-md-12">
                        <span style="font-size:20px"><h3 style="text-decoration:underline">{{ $s['nama'] }}</h3></span><br>
                    </div>
                    <div class="col-md-12" style="margin-bottom:30px">
                        <table class="table" border="1">
                            <tr>
                                <td colspan="2">
                                    Sangat Rendah
                                </td>
                                <td colspan="2">
                                    Rendah
                                </td>
                                <td colspan="2">
                                    Sederhana
                                </td>
                                <td colspan="2">
                                    Tinggi
                                </td>
                                <td colspan="2">
                                    Sangat Tinggi
                                </td>
                            </tr>
                            <tr style="text-align:center">
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                            </tr>
                        </table>
                    </div>

                    @foreach($s['get_child'] as $sc)
                        <div class="col-md-11" style="margin-bottom: 20px">
                            <span style="font-size:15px;font-weight:bold">{{ $sc['nama'] }}</span><br>
                            {{ $sc['penerangan'] }}
                        </div>
                        <div class="col-md-1">
                            <select class="form-control lpnk-skor" data-soalan-id="{{$sc['id']}}">
                                <option value="">Pilih</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    @endforeach
                    <hr>
                @endforeach
                <hr>
                <br><br>
                <br><br>
                <div class="col-md-10" style="font-size:25px">
                    JUMLAH MARKAH
                </div>
                <div class="col-md-2" style="text-align:right;font-size:25px">
                    0/100
                </div>
                <br><br>
                <br><br>
                <div class="col-md-12">
                    <h3>Bahagian 3 - Ulasan Keseluruhan Dan Pengesahan Oleh Pegawai Penilai</h3>
                </div>
                <br><br><br>
                <div class="col-md-12 form-group">
                    1. Tempoh pegawai yang dinilai berugas di bawah pengawasan (bulan) <input type="text" class="form-control" id="jumlah-pengawasan">
                </div>
                <br><br>
                <div class="col-md-12">
                    2. Pegawai penilai hendaklah memberi ulasan terhadap prestasi keseluruhan Pegawai Yang Dinilai
                </div>
                <div class="col-md-12 form-group">
                    <textarea class="form-control penyelia-ulasan"></textarea>
                    <div class="invalid-feedback"></div><br>
                </div>
                <br><br><br><br>
                <div class="col-md-3">Nama Pegawai Penilai</div>
                <div class="col-md-9">
                    : {{ $data['penyelia']['name'] }}<br>
                </div>
                <br><br>
                <div class="col-md-3">No. Kad Pengenalan</div>
                <div class="col-md-9">
                    : {{ $data['penyelia']['nokp'] }}<br>
                </div>
                <br><br>
                <div class="col-md-3">Jawatan</div>
                <div class="col-md-9">
                    : {{ $data['penyelia']['jawatan'] }}<br>
                </div>
                <br><br>
                <div class="col-md-3">Kementerian/Jabatan</div>
                <div class="col-md-9">
                    : {{ $data['penyelia']['waran_name']['waran_penuh'] }}<br>
                </div>
                <br><br>
                <div class="col-md-3">Borang Sasaran Kerja: </div>
                <div class="col-md-9 form-group">
                    <input type="file" class="form-control" id="skt">
                    <div class="invalid-feedback"></div><br>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger post-tidak-setuju" style="width:100%">Tidak Setuju</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success post-setuju" style="width:100%">Setuju</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="id-permohonan" value="{{ $id_permohonan }}">
    @include('segment.bpsm.modal.index')
@endsection

@section('JS')
    @include('segment.layouts.custom_view_links.toast.js.index')
    @include('segment.layouts.custom_view_links.datatable.js.index')
    @include('segment.layouts.custom_view_links.modals.js.index')
    @include('segment.layouts.custom_view_links.swal.js.index')
    @include('segment.layouts.custom_view_links.datepicker.flatpickr.js.index')
@endsection

@section('customJs')
    @include('segment.layouts.custom_view_links.customjavascript.index')
    <script src="{{ asset('app_js_helper/segment/penyelia/lpnk/settings.js') }}"></script>
    <script src="{{ asset('app_js_helper/segment/penyelia/lpnk/controller.js') }}"></script>
    <script src="{{ asset('app_js_helper/segment/penyelia/lpnk/main.js') }}"></script>
@endsection
