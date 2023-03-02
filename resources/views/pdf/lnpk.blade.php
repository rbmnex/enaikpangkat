<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.css')}}"> --}}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        .top-border {
            border-left-style: solid;
            border-left-width: 1px;
            border-right-style: solid;
            border-right-width: 1px;
            border-top-style: solid;
            border-top-width: 1px;
        }


        .side-border {
            border-left-style: solid;
            border-left-width: 1px;
            border-right-style: solid;
            border-right-width: 1px;
        }

        .right-border {
            border-right-style: solid;
            border-right-width: 1px;
        }

        .left-border {
            border-left-style: solid;
            border-left-width: 1px;
        }

        .bottom-border {
            border-left-style: solid;
            border-left-width: 1px;
            border-right-style: solid;
            border-right-width: 1px;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .dotted{
            border-bottom: 1px dashed #999;
            text-decoration: none;
            }

        .page-break {
            page-break-after: always;
        }

        .box {
            border-style: solid;
            border-width: 1px;
            width: 60px; height: 30px;
            display: inline-block;
            text-align: center;
        }

        .box-long {
            border-style: solid;
            border-width: 1px;
            width: 90px; height: 30px;
            display: inline-block;
            text-align: center;
        }

    </style>
  </head>
  <body>
    <table style="width:100%;  border-collapse: collapse;">
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
            <td style="vertical-align: top; font-size: 14px; font-weight: bold; width: 135px;">SULIT</td>


            <td colspan="10" style="text-align: center;"><img src="{{ url('/images/jata_negara.png') }}" width="90" height="75"></td>
            <td style="text-align: right; vertical-align: top; font-size: 10px; font-weight: bold; width: 135px;">Borang J.P.A (LNPK) 2/2009</td>
        </tr>
        <tr>
            <td colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>

            <td colspan="10" style="text-align: center;">KERAJAAN MALAYSIA</td>

            <td></td>
        </tr>
        <tr>
            <td colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>

            <td colspan="10" style="text-align: center;">LAPORAN PENILAIAN PRESTASI KHAS</td>

            <td></td>
        </tr>
        <tr>
            <td></td>

            <td colspan="10" style="text-align: center;">BAGI PEGAWAI KUMPULAN PENGURUSAN DAN PROFESIONAL</td>

            <td></td>
        </tr>
        <tr>
            <td></td>

            <td colspan="10" style="text-align: center;">& KUMPULAN SOKONGAN</td>

            <td></td>
        </tr>
        <tr>
            <td colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>

            <td colspan="10" style="text-align: center;">Tahun : <span class="dotted">2022</span></td>

            <td></td>
        </tr>
        <tr>
            <td colspan="12" style="height:10px;"></td>
        </tr>
    </table>
    <table style="width:100%;  border-collapse: collapse;">
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
            <td class="top-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="side-border" colspan="12" style="text-align: center; font-weight: bold;">PERINGATAN</td>
        </tr>
        <tr>
            <td class="side-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="left-border"></td>
            <td style="padding-right: 10px; vertical-align: top;">a)</td>
            <td class="right-border" colspan="10"><span style="font-weight: bold;">Pegawai Penilai (PP)</span> adalah pegawai atasan atau penyelia yang terdekat kepada <span style="font-weight: bold;">Pegawai Yang Dinilai (PYD)</span> dan mempunyai hubungan kerja secara langsung atau yang mengawasi kerjanya;</td>
        </tr>
        <tr>
            <td class="side-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="left-border"></td>
            <td style="padding-right: 10px; vertical-align: top;">b)</td>
            <td class="right-border" colspan="10">Tempoh penyeliaan bagi PP membuat penilaian adalah tidak kurang dari 6 bulan dan;</td>
        </tr>
        <tr>
            <td class="side-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="left-border"></td>
            <td style="padding-right: 10px; vertical-align: top;">c)</td>
            <td class="right-border" colspan="10">PP dan PYD hendaklah memberi perhatian kepada perkara-perkara berikut sebelum dan semasa membuat penilaian:</td>
        </tr>

        <tr>
            <td class="side-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="left-border"></td>
            <td></td>
            <td style="padding-right: 5px; vertical-align: top;">(i)</td>
            <td class="right-border" style="padding-right: 5px;" colspan="9">PYD hendaklah melengkapkan maklumat di <span style="font-weight: bold;">Bahagian I</span> melengkapkan dalam borang Sasaran Kerja dan Pencapaian Sasaran Kerja untuk tempoh penilaian seperti di <span style="font-weight: bold;">Lampiran 'A'</span>;</td>
        </tr>
        <tr>
            <td class="side-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="left-border"></td>
            <td></td>
            <td style="padding-right: 5px; vertical-align: top;">(ii)</td>
            <td class="right-border" style="padding-right: 5px;" colspan="9">PP hendaklah membuat penilaian di <span style="font-weight: bold;">Bahagian II</span> serta membuat ulasan mengenai prestasi keseluruhan pegawai di <span style="font-weight: bold;">Bahagian III</span>;</td>
        </tr>
        <tr>
            <td class="side-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="left-border"></td>
            <td></td>
            <td style="padding-right: 5px; vertical-align: top;">(iii)</td>
            <td class="right-border" style="padding-right: 5px;" colspan="9">PP hendaklah menggunakan Skala Penilaian seperti di <span style="font-weight: bold;">Bahagian II</span> dan penjelasan terhadap skala seperti di <span style="font-weight: bold;">Lampiran 'A'</span> dan;</td>
        </tr>
        <tr>
            <td class="side-border" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="left-border"></td>
            <td></td>
            <td style="padding-right: 5px; vertical-align: top;">(iV)</td>
            <td class="right-border" style="padding-right: 5px;" colspan="9">PYD hendaklah menyertakan senarai tugas jawatan yang disandang.</td>
        </tr>
        <tr>
            <td class="bottom-border" colspan="12" style="height:10px;"></td>
        </tr>
    </table>
    <table style="width:100%;  border-collapse: collapse;">
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
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="font-weight: bold;">BAHAGIAN I - MAKLUMAT PEGAWAI</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="font-style: italic;">(Diisi oleh Pegawai Yang Dinilai)</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; vertical-align: top;">(i)</td>
            <td>Nama</td>
            <td>:</td>
            <td colspan="10" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; vertical-align: top;">(ii)</td>
            <td >No. Kad Pengenalan</td>
            <td>:</td>
            <td colspan="10" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; vertical-align: top;">(iii)</td>
            <td>Skim Perkhidmatan</td>
            <td>:</td>
            <td colspan="10" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; vertical-align: top;">(iv)</td>
            <td>Gred Hakiki</td>
            <td>:</td>
            <td colspan="10" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; vertical-align: top;">(v)</td>
            <td>Nama & Gred Jawatan Yang Disandang Sekarang</td>
            <td>:</td>
            <td colspan="10" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; vertical-align: top;">(vi)</td>
            <td>Tempat Bertugas</td>
            <td>:</td>
            <td colspan="10" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="padding-right: 5px; vertical-align: top;">(vii)</td>
            <td style="width: 150px">Tarikh Memangku Jawatan Sekarang</td>
            <td style="width: 25px">:</td>
            <td colspan="10" class="top-border bottom-border"></td>
        </tr>
    </table>
    <div class="page-break"></div>
    <table style="width: 100%;">
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
            <td colspan="12" style="font-weight: bold;">BAHAGIAN II - KRITERIA YANG DINILAI</td>
        </tr>
        <tr>
            <td colspan="12" style="font-style: italic;">(Diisi oleh Pegawai Penilai)</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td class="" colspan="12">Pegawai Penilai dikehendaki membuat penilaian berasaskan kepada penjelasan setiap kriteria yang dinyatakan dengan menggunakan skala <span style="font-weight: bold;">1 hingga 10. Bagi kriteria 1 - 5,</span> penilaian hendaklah berasaskan pencapaian kerja sebenar Pegawai Yang Dinilai (PYD) atas gred jawatan yang dipangku berbanding dengan <span style="font-weight: bold;">sasaran kerja yang ditetapkan di Lampiran 'A'</span>.</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:50px;"></td>
        </tr>
        @foreach($soalan as $s)
        <tr>
            <td colspan="12" style="font-weight: bold;">{{ $s['nama'] }}</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td>Skala : </td>
            <td colspan="11">
                <table class="top-border bottom-border side-border" style="width: 100%;  border-collapse: collapse;">
                    <tr style="text-align:center; padding: 0px;">
                        <td colspan="2" style="border-bottom-style: solid; border-bottom-width: 1px; border-right-style: solid; border-right-width: 1px; width: 155px;">
                            Sangat Rendah
                        </td>
                        <td colspan="2" style="border-bottom-style: solid; border-bottom-width: 1px; border-right-style: solid; border-right-width: 1px; width: 155px;">
                            Rendah
                        </td>
                        <td colspan="2" style="border-bottom-style: solid; border-bottom-width: 1px; border-right-style: solid; border-right-width: 1px; width: 155px;">
                            Sederhana
                        </td>
                        <td colspan="2" style="border-bottom-style: solid; border-bottom-width: 1px; border-right-style: solid; border-right-width: 1px; width: 155px;">
                            Tinggi
                        </td>
                        <td colspan="2" style="border-bottom-style: solid; border-bottom-width: 1px; width: 155px;">
                            Sangat Tinggi
                        </td>
                    </tr>
                    <tr style="text-align:center">
                        <td style="border-right-style: solid; border-right-width: 1px;">1</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">2</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">3</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">4</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">5</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">6</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">7</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">8</td>
                        <td style="border-right-style: solid; border-right-width: 1px;">9</td>
                        <td style="">10</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        @foreach($s['get_child'] as $sc)
        <tr>
            <td class="" colspan="12" style="font-weight: bold;">{{ $sc['nama'] }}</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td colspan="11" style="">{{ $sc['penerangan'] }}</td>
            <td class=""><div class="box"></div></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        @endforeach
        @endforeach
        <tr>
            <td class="" colspan="11" style="font-weight: bold;">Jumlah Markah : </td>
            <td class=""><div class="box-long" style="vertical-align: center; padding-top:15px">
                <span>&nbsp;&nbsp;&nbsp;/ 100</span>
            </div></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
    </table>
    <table>
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
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td colspan="12" style="font-weight: bold;">BAHAGIAN III - ULASAN KESELURUHAN DAN PENGESAHAN OLEH PEGAWAI PENILAI</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td style="width:25px;">1.</td>
            <td colspan="11">Tempoh Pegawai Yang Dinilai bertugas di bawah pengawasan : <span class="dotted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> bulan.</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td>2.</td>
            <td colspan="11">Pegawai Penilai hendaklah memberi ulasan terhadap prestasi keseluruhan Pegawai Yang Dinilai</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="11" style="height: 100px;" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Nama Pegawai Penilai</td>
            <td style="text-align: center;">:</td>
            <td colspan="8" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">No. Kad Pengenalan</td>
            <td style="text-align: center;">:</td>
            <td colspan="8" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">Jawatan</td>
            <td style="text-align: center;">:</td>
            <td colspan="8" class="top-border bottom-border"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:10px;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="vertical-align: top;">Kementerian / Jabatan</td>
            <td style="text-align: center; vertical-align: top;">:</td>
            <td colspan="8" class="top-border bottom-border" style="height: 50px;"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height:30px;"></td>
        </tr>
        <tr>
            <td colspan="4"><span class="dotted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
            <td colspan="4"></td>
            <td colspan="4"><span class="dotted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center;">Tandatangan PP</td>
            <td colspan="4"></td>
            <td colspan="4" style="text-align: center;">Tarikh</td>
        </tr>
    </table>
    <div class="page-break"></div>
    <table style="width: 100%;  border-collapse: collapse;">
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
            <td colspan="12" style="text-align: right; font-weight: bold; ">Lampiran A</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height: 30px;"></td>
        </tr>
        <tr>
            <td colspan="12" style="text-align: center;">Borang Sasaran Kerja & Laporan Pencapaian</td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height: 10px;"></td>
        </tr>
        <tr>
            <td class="" colspan="12" style=""><span style="font-size: 12px;">Borang Pencapaian Sasaran Kerja</span></td>
        </tr>
        <tr>
            <td class="" colspan="12" style=""><span style="font-size: 12px; font-style: italic;">(PYD hendaklah melaporkan pencapaian kerja dalam tempoh penilaian .......... hingga ...........)</span></td>
        </tr>
        <tr>
            <td class="" colspan="12" style="height: 10px;"></td>
        </tr>
    </table>
    <table style="width: 100%;  border-collapse: collapse;">
        <tr>
            <td style="text-align: center; width: 25px;  border: 1px solid; font-size: 12px;">Bil.</td>
            <td style="text-align: center;  border: 1px solid; font-size: 12px;">AKTIVITI / PROJEK / KETERANGAN</td>
            <td style="text-align: center;  border: 1px solid; font-size: 12px;">PETUNJUK PRESTASI<br/>(Kuantiti / Kualiti / Masa / Kos yang mana berkaitan)</td>
            <td style="text-align: center;  border: 1px solid; font-size: 12px;">SASARAN KERJA<br/>(Untuk tempoh penilaian)</td>
            <td style="text-align: center;  border: 1px solid; font-size: 12px;">PENCAPAIAN SEBENAR<br/>(Diisi pada akhir tempoh penilaian)</td>
            <td style="text-align: center;  border: 1px solid; font-size: 12px;">ULASAN<br/>(Oleh PYD sekiranya berkaitan)</td>
        </tr>
        <tr>
            <td style="border: 1px solid; font-size: 12px; height: 30px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
        </tr>
        <tr>
            <td style="border: 1px solid; font-size: 12px; height: 30px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
            <td style="border: 1px solid; font-size: 12px;"></td>
        </tr>
    </table>
    <table style="width: 100%;  border-collapse: collapse;">
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
    </table>
  </body>
</html>
