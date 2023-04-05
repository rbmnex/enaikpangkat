
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">UNTUK TINDAKAN URUS SETIA KENAIKAN PANGKAT</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Markah LNPT TerkinI (Tiga (3) Tahun Terakhir)</label>
                    </div>
                    <div class="form-group col-md-12">
                        <table style="border-collapse: collapse; " class="table">
                            <tbody>
                                <tr>
                                    <td class="cell head-cell">Tahun</td>
                                    @foreach($lnpt as $m)
                                    <td class="cell">{{ $m->tahun }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="cell head-cell">Markah</td>
                                    @foreach($lnpt as $p)
                                    <td class="cell">
                                        <div class="form-group">
                                        <input type="number" id="markah-{{ $p->tahun }}" class="markah-lnpt form-control" readonly data-tahun-lnpt="{{ $p->tahun }}" value="{{ $p->purata }}">
                                        <div class="invalid-feedback"></div>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" style="font-style: italic" for=""><b>* Pegawai KADER perlu memajukan salinan LNPT yang telah disahkan oleh pejabat</b></label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" style="font-style: italic" for=""><b>* Sekiranya menggunakan Laporan Nilaian Prestasi Khas (LNPK), LNPK tersebut perlu disahkan dan disertakan bersama.</b></label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Pengesahan Tindakan Tatatertib</label>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-check form-check-inline ">
                            <input type="radio" value="1" class="form-check-input medium tatatertib2" onclick="return false;" @if(!empty($tatatertib)){{ $tatatertib->pengesahan_tindakan == '1' ? 'checked' : '' }}@endif name="tatatertib2" id="radio1" />
                            <label class="col-form-label" for="tatatertib"> Ada</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input type="radio" value="0" class="form-check-input medium tatatertib2" onclick="return false;" @if(!empty($tatatertib)){{ $tatatertib->pengesahan_tindakan == '0' ? 'checked' : '' }}@endif name="tatatertib2" id="radio2" />
                            <label class="col-form-label" for="tatatertib"> Tiada </label>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Jenis Hukuman (Jika Ada)</label>
                        <input type="text" id="nama_hkm" readonly class="form-control" name="nama_hkm" value="{{ empty($tatatertib) ? '' : $tatatertib->jenis_hukuman }}" placeholder=""/>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Tarikh Hukuman</label>
                        <input type="text" readonly class="form-control tkh_hukuman" id="selesai_bayar" name="selesai_bayar" value="@if(!empty($tatatertib)){{ empty($tatatertib->tkh_hukuman) ? '' : \Carbon\Carbon::parse($tatatertib->tkh_hukuman)->format('d-m-Y') }} @endif"/>
                    </div>
                </div>
            </div>
            </div>
        </div>
