<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Borang JKR/UKP/11</title>
    <style>
        .centerCell {
            text-align: center;
            vertical-align: middle !important;
            font-weight: bold !important;
        }
        .center {
            text-align: center;
            vertical-align: middle !important;
            font-weight: solid;
        }

        div.a {
            text-align: center;
        }
        table, th, td {
            table-layout: fixed ;
            width: 100% ;
            /*border: 1px solid black;*/
        }

        i {
            content: "\2713";
        }

        .page-break {
            page-break-before: always;
        }
        .word-line {
            line-height: 15px;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" style="text-align: center" colspan="2"><img src="{{ asset('images/jkr_logo.png') }}" width="70" height="50"></td>

                <td></td>
                <td></td>
                <td></td>
                <td colspan="3" style="font-size: 7;text-align: right;">
                    <span style="font-weight:bold;">JKR/UKP/11(Pind 1/2021)</span><br>
                    PENGESAHAN PENERIMAAN<br>
                    PEMANGKUAN
                </td>
            </tr>
            <tr>
                <td colspan="12" style="height: 20px;"></td>
            </tr>
            <tr class="word-line">
                <td colspan="2" style="font-size:16px">
                    Nama
                </td>
                <td>:</td>
                <td colspan="9" style="font-size:16px">
                    <span style="text-decoration: underline">{{ $data->pemohonPeribadi->nama }}</span><br>
                </td>
            </tr>
            <tr class="word-line">
                <td colspan="2" style="font-size:16px">
                    Jawatan/Disiplin
                </td>
                <td>:</td>
                <td colspan="9" style="font-size:16px">
                    <span style="text-decoration: underline">{{ $data->jawatan }}</span>
                </td>
            </tr>
            <tr class="word-line">
                <td colspan="2" style="font-size:16px">
                    Gred Memangku
                </td>
                <td>:</td>
                <td colspan="9" style="font-size:16px">
                    <span style="text-decoration: underline">{{ $data->pemohonPermohonan->gred }}</span>
                </td>
            </tr>
            <tr class="word-line">
                <td colspan="2" style="font-size:16px; vertical-align: top;">
                    Alamat Pejabat
                </td>
                <td style="vertical-align: top;">:</td>
                <td colspan="9" style="font-size:16px; vertical-align: top;">
                    <span style="text-decoration: underline">{{ empty($data->pemohonUkp11->alamat_pejabat) ?strtoupper(empty($data->pemohonPink) ? '' : $data->pemohonPink->alamat) : strtoupper($data->pemohonUkp11->alamat_pejabat)}}</span>
                </td>
            </tr>
            <tr class="word-line">
                <td colspan="2" style="font-size:16px">
                    No telefon/emel
                </td>
                <td>:</td>
                <td colspan="9" style="font-size:16px">
                    <span style="text-decoration: underline">{{ $data->pemohonPeribadi->tel_bimbit }} / {{ $data->pemohonPeribadi->email }}</span>
                </td>
            </tr>
        <tr>
            <td colspan="12" style="height: 10px"></td>
        </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" style="font-size:16px">
                    Ketua Bahagian<br>
                    Bahagian Pengurusan Sumber Manusia<br>
                    Cawangan Pengurusan Dasar & Korporat<br>
                    Tingkat 29, Blok G, Ibu Pejabat JKR<br>
                    50480 Kuala Lumpur<br>
                    (u.p : Urus Setia Kenaikan Pangkat - emel: urusetiakenaikanpangkat@jkr@.gov.my)<br>
                    Fax : 03-26188649
                </td>
            </tr>
            <tr>
                <td style="font-size:16px" colspan="5">
                    <br>
                    Tuan,
                    <br>
                    <br>
                    Merujuk kepada surat Pemberituahuan Pertukaran {{ $data->pemohonPeribadi->nama }} {{ $data->pemohonPink->no_surat }}. Adalah saya No. Kad Pengenalan {{ $data->pemohonPeribadi->nokp }}. *
                    @if($data->status == 'TL')
                        Bersetuju / <span style="text-decoration: line-through;font-weight:bold">Tidak Bersetuju</span>
                    @else
                        <span style="text-decoration: line-through;font-weight:bold">Setuju</span> / Tidak Bersetuju
                    @endif
                    ditawarkan pemangkuan ke Gred <span style="font-weight:bold">{{$data->pemohonPermohonan->gred}}</span> disiplin <span style="font-weight:bold">{{$data->pemohonPermohonan->disiplin}}</span>.

                    <br>
                    <br>
                    <span style="padding-right:20px">2.</span>Dengan ini saya memahami bahawa sepanjang tempoh pemangkuan ini, prestasi saya akan dinilai untuk tempoh sekurang-kurangnya dua belas (12) bulan dan saya boleh dipertimbangkan untuk kenaikan pangkat selepas daripada tempoh tersebut sekiranya saya menunjukkan prestasi dan pencapaian yang baik di gred jawatan yang dipangku serta memenuhi syarat kenaikan angkat yang ditetapkan dalam skim perkhidmatan. <span style="font-weight:bold">Saya tidak akan dipertimbangkan kenaikan pangkat sekiranya tidak menunjukkan prestasi dan pencapaian yang baik dalam tempoh pemangkuan. Saya juga akan ditamatkan tempoh pemangkuan sekiranya terlibat dengan tindakan tatatertib, pelanggaran peraturan dan sebagainya.</span>
                    <br>
                    <br>
                    <span style="padding-right:20px">3.</span><span style="font-weight: bold">Sekiranya saya menolak tawaran pemangkuan ini, saya berhak dikenakan penalti, iaitu tidak dipertimbangkan pemangkuan dalam tempoh enam (6) bulan atau satu urusan pemangkuan dari tarikh surat ini atau satu urusan, yang mana terkemudian.</span>
                    <br>
                    <br>
                    <br>
                    Sekian, Terima Kasih
                </td>
            </tr>
            <tr>
                <td colspan="5" style="font-size:16px; height: 10px;"></td>
            </tr>
            <tr>
                <td style="font-size:16px">
                    Nama<br>
                    Kad Pengenalan<br>
                    <br>
                    Tarikh<br>
                    <br>
                    <br>
                </td>
                <td style="font-size:16px" colspan="4">
                    : <span style="text-decoration: underline">{{ $data->pemohonPeribadi->nama }}</span><br>
                    : <span style="text-decoration: underline">{{ $data->pemohonPeribadi->nokp }}</span><br>
                    <br>
                    : <span style="text-decoration: underline">{{ date('d-m-Y') }}</span><br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="font-size: 14px">
                    <span style="font-weight: bold">Perhatian:</span> Persetujuan penerimaan pemangkuan ini mestilah dikembalikan ke pejabat ini dalam tempoh 14 hari dari tarikh melaporkan diri. Sekiranya tarikh penangguhan melebihi empat belas (14) hari, tarikh kuat kuasa pemangkuan pegawai adalah mulai tarikh pegawai kembali melaporkan diri dan menjalankan tugas sepenuh masa di jawatan yang dipangku.
                </td>
            </tr>
        </tbody>
    </table>
    <div class="page-break"></div>
    <table style="width: 100%">
        <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" style="font-size:16px">
                    <strong>Pengesahan Penerimaan Pemangkuan Oleh Unit / Bahagian Perkhidmatan (pejabat baru)</strong><br><br>
                </td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2">Tarikh Berkuatkuasa Pemangkuan<br>(berdasarkan 'pink form')<br><br></td>
                <td colspan="3">: {{ $data->pemohonPink->tkh_lapor_diri ? date('d-m-Y', strtotime($data->pemohonPink->tkh_lapor_diri)) : '' }}<br><br></td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2">Tarikh Melaporkan Diri<br><br></td>
                <td colspan="3">: {{ empty($data->pemohonUkp11->tkh_lapor_diri) ? '' : date('d-m-Y', strtotime($data->pemohonUkp11->tkh_lapor_diri)) }}<br><br></td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2">Penangguhan (Sekiranya ada),<br>Tempoh Penangguhan<br><br></td>
                <td colspan="3">:
                    @if( !empty($data->pemohonUkp11->tkh_tangguh_mula) && !empty($data->pemohonUkp11->tkh_tangguh_akhir))
                    {{ empty($data->pemohonUkp11->tkh_tangguh_mula) ? '' : \Carbon\Carbon::parse($data->pemohonUkp11->tkh_tangguh_mula)->format('d-m-Y').' hingga '.empty($data->pemohonUkp11->tkh_tangguh_akhir) ? '' : \Carbon\Carbon::parse($data->pemohonUkp11->tkh_tangguh_akhir)->format('d-m-Y') }}
                    @else
                    @endif
                    <br><br>
                </td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2">Tarikh Mula Bertugas<br><br></td>
                <td colspan="3">: {{ empty($data->pemohonUkp11->tkh_kuatkuasa_pemangkuan) ? '' : date('d-m-Y', strtotime($data->pemohonUkp11->tkh_kuatkuasa_pemangkuan)) }}<br><br></td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="5">(Tuan/puan diminta untuk melaporkan diri pada tarikh yang telah ditetapkan. Sekiranya penangguhan/pelepasan tuan/puan melebihi 14 hari (termasuk cuti mingguan dan kelepasan am), tarikh kuat kuasa pemangkuan tuan/puan adalah mulai tarikh tuan/puan kembali melaporkan diri dan melaksanakan tugas sepenuh masa di jawatan yang dipangku. Elaun pemangkuan hanya layak dibayar mulai tarikh tuan/puan menjalankan tugas yang dipangku secara sepenuh masa. Semua  penangguhan/pelepasan hendaklah dipersetujui Ketua Jabatan (yang baru) dan salinan kelulusan penangguhan disertakan bersama)<br><br></td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="5">Ketua Bahagian Perkhidmatan / Kerani Perkhidmatan<br><br></td>
            </tr>
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5" style="height: 30px;"></td>
            </tr>
            @if(empty($data->pemohonUkp11->nokp_kerani))
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5">
                    <span>...........................................................</span><br/>
                    <span>          (Tandangan dan Cop Ketua Perkhidmatan)</span>
                </td>
            </tr>
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5" style="height: 30px;"></td>
            </tr>
            @else
            <tr style="font-size:16px">
                <td colspan="2"></td>

                <td style="text-align: right;">Nama : </td>
                <td colspan="2">{{ $data->pemohonUkp11->nama_kerani ?? '' }}</td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2"></td>
                <td style="text-align: right;">Jawatan : </td>
                <td colspan="2">{{ $data->pemohonUkp11->jawatan ?? '' }}</td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2"></td>

                <td style="text-align: right;">Caw./Jabatan : </td>
                <td colspan="2">{{ $data->pemohonUkp11->cawangan ?? '' }}</td>
            </tr>
            @endif
            <tr style="font-size:16px">
                <td colspan="2"></td>

                <td style="text-align: right;">Tarikh : </td>
                <td colspan="2">{{ empty($data->pemohonUkp11->kerani_tkh) ? '' : date('d-m-Y', strtotime($data->pemohonUkp11->kerani_tkh)) }}</td>
            </tr>
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5" style="height: 30px;"></td>
            </tr>
            <tr style="font-size:16px;">
                <td colspan="5" style="">Perakuan Ketua Jabatan</td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="5">(Pejabat Baru)<br><br></td>
            </tr>
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5" style="height: 30px;"></td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="5">Saya mengesahkan bahawa semua maklumat yang diberikan adalah benar<br><br></td>
            </tr>
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5" style="height: 30px;"></td>
            </tr>
            @if(empty($data->pemohonUkp11->nokp_ketua_jabatan))
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5">
                    <span>...........................................................</span><br/>
                    <span>          (Tandatangan Dan Cop Ketua Jabatan)</span>
                </td>
            </tr>
            <tr style="font-size:16px; text-align: right;">
                <td colspan="5" style="height: 30px;"></td>
            </tr>
            @else
            <tr style="font-size:16px">
                <td colspan="2"></td>

                <td style="text-align: right;">Nama : </td>
                <td colspan="2">{{ $data->pemohonUkp11->nama_ketua_jabatan ?? '' }}</td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2"></td>

                <td style="text-align: right;">Jawatan : </td>
                <td colspan="2">{{ $data->pemohonUkp11->jawatan_ketua_jabatan ?? '' }}</td>
            </tr>
            <tr style="font-size:16px">
                <td colspan="2"></td>

                <td style="text-align: right;">Caw./Jabatan : </td>
                <td colspan="2">{{ $data->pemohonUkp11->cawangan_ketua_jabatan ?? '' }}</td>
            </tr>
            @endif
            <tr style="font-size:16px">
                <td colspan="2"></td>
                <td style="text-align: right;">Tarikh : </td>
                <td colspan="2">{{ empty($data->pemohonUkp11->ketua_jabatan_tkh) ? '' : date('d-m-Y', strtotime($data->pemohonUkp11->ketua_jabatan_tkh)) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
