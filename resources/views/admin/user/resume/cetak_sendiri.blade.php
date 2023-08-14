<?php
$fileName = 'Lampiran-doc-'.strtoupper($model['nokp']).".doc";

// Headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-word");
header("Pragma:no-cache");
header("Expires:0");
?>
<html>
<head><title>Resume</title>
	<style>
.grey{
	background-color: #D1D0CE;
	height: 30px;
	}

	.grey1{
	background-color: #D1D0CE;
	}

.outerline {
			border: 1px solid black;
/*			border-collapse: collapse;*/
			width: 100%;
			font-family:Tahoma, sans-serif;
			font-size: 11px;
}

.noline {
	font-family:Tahoma, sans-serif;
	font-size: 11px;
}

.smallbox {
	font-family:Tahoma, sans-serif;
	font-size: 11px;
	width: 100%;

}

.mainbox {
    border-collapse: collapse;
}

.boxpengalaman{
	border: 1px solid black;
	border-collapse: collapse;
	font-family:Tahoma, sans-serif;
	font-size: 11px;
	border-left: 0px;

}

.kini{
font-family:Tahoma, sans-serif;
	font-size: 11px;

}

.boxpengalaman2{
   font-family:Tahoma, Geneva, Verdana, sans-serif;
   font-size: 11px;9
   border-left: 0px;

}


.font{
	font-family:Arial, Helvetica, sans-serif;
	font-size: 12pt;

}


.bordertop{
	border-top: 1px solid black;
	border-right: 1px solid black;

}


.righttop{
	border-top: 1px solid black;
}


.photo{
	margin-top: 10px;
	margin-right: 0px;
/*	text-align:right;*/
}

/*.no {
  vertical-align:top}
*/
/*.page-break {
	page-break-after: always!important;
}

@media print {

.page-break {
	page-break-after: always!important;
}
}*/
</style>
</head>
<body bgcolor="white">
    <div class="resume">
       <table style="page-break-before: always" class="outerline">
          <tr >
             <th class="grey" colspan="7" >RESUME</th>
          </tr>
          <tr>
             <td colspan="7"><b>A.BUTIRAN PERIBADI</b></td>
          </tr>
          <tr>
             <td colspan="7">
                <table class="noline">
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>NAMA</td>
                      <td>:</td>
                      <td>{{$model['gelaran']}} {{ strtoupper($model['name']) }}</td>
                      <td rowspan="7" class="photo">
                         <img src="{{ asset('files/foto-'.$model['nokp'].'.jpg') }}"
                            alt="" width="120" height="140" align="top">
                      </td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>JAWATAN</td>
                      <td>:</td>
                       <td>{{$model['gelaran_jawatan'] ?? '' }}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>KAD PENGENALAN</td>
                      <td>:</td>
                      <td>{{ strtoupper($model['nokp']) }}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>TARIKH LAHIR</td>
                      <td>:</td>
                      <td>{{ date('d-m-Y', strtotime($model['peribadi']['tkh_lahir'])) }}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>TEMPAT LAHIR</td>
                      <td>:</td>
                      <td> {{ strtoupper($model['peribadi']['tempat_lahir']) }} </td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>ALAMAT PEJABAT</td>
                      <td>:</td>
                      <td>{{ strtoupper($model['alamat_pejabat']) }}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>ALAMAT RUMAH</td>
                      <td>:</td>
                      <td>{{ strtoupper($model['peribadi']['alamat_rumah']) }}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>TARAF PERKAHWINAN</td>
                      <td>:</td>
                      <td>{{ strtoupper($model['peribadi']['taraf_perkahwinan']) }} </td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>NO. TELEFON PEJABAT</td>
                      <td>:</td>
                      <td>{{ strtoupper($model['tel_pejabat']) }}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>NO. TELEFON BIMBIT</td>
                      <td>:</td>
                      <td>{{ strtoupper($model['peribadi']['tel_bimbit'])}}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>NO. FAX</td>
                      <td>:</td>
                      <td>{{ strtoupper($model['peribadi']['no_fax'] )}}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>EMEL</td>
                      <td>:</td>
                      <td>{{ $model['email']}}</td>
                   </tr>
                   <tr>
                      <td><span>&#8226;</span></td>
                      <td>TARIKH PENGISYTIHARAN HARTA TERKINI</td>
                      <td>:</td>
                      <td> {{isset($model['isytiharHarta']['tkh_mula_peristiwa']) ? date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) : ""  }}</td>
                   </tr>
                </table>
             </td>
          </tr>
          <tr >
              <td style="vertical-align:top;" colspan="2" class="bordertop"><b>B. PRESTASI</b><br>(LNPT 3 tahun terkini)</td>
              <td colspan="5" class="righttop">
                  @role(['superadmin','adminjusa','secretariat'])
                  <ul>
                   @if(isset($model['markah']))
                   @foreach($model['markah'] as $markah)
                   <li>{{ $markah['tahun'] }} - {{ $markah['purata'] }} % </li>
                   @endforeach
                   @endif
                </ul>
                @endrole
             </td>
          </tr>
          <tr>
             <td style="vertical-align:top;"colspan="2"  class="bordertop">
                <b>C. KEPAKARAN DAN PENGALAMAN</b><br>
                <ul>
                   <li>Tempoh bidang pengkhususan</li>
                   <li>Tempoh atas gred terakhir</li>
                   <li>Tempoh perkhidmatan</li>
                </ul>
             </td>
             <td colspan="5" class="righttop">
                <b>Pengkhususan</b>
                @if(isset($model['pengalamanPengkhususan']['khusus']))
                @foreach($model['pengalamanPengkhususan']['khusus'] as $val)
                <ul>
                   <li>
                      {{ $val['jumlah_pengalaman']}}
                   </li>
                </ul>
                @endforeach
                @else
                <ul>
                   <li>
                      tiada
                   </li>
                </ul>
                @endif
                <br><br>
                <ul>
                   <li>Tempoh Perkhidmatan di Gred Terkini selama {{$tempoh_gred->y}} tahun</li>
                   <li>Tempoh Perkhidmatan Sektor Awam selama {{$tempoh_awam->y}} tahun</li>
                   <!-- <li>Tempoh Perkhidmatan di Gred P&P selama {{$tempoh_pnp->y}} tahun</li> -->
                </ul>
             </td>
          </tr>
          <tr>
             <td style="vertical-align:top;"colspan="2"  class="bordertop">
                <b>D. PENDEDAHAN</b><br><br>
                <table class="smallbox" >
                   <tr>Majikan :</tr>
                   <tr> JABATAN KERJA RAYA MALAYSIA</tr>
                   <tr>Skim Perkhidmatan  :</tr>
                   <tr>PENGURUSAN DAN PROFESSIONAL</tr>
                   <tr>Tarikh Mula Perkhidmatan    :</tr>
                   <tr>{{ isset($mula_khidmat->tkh_lantik) ? date('d-m-Y', strtotime($mula_khidmat->tkh_lantik)) : ''}}</tr>
                   <tr>Tarikh Bersara Wajib  :</tr>
                   <tr>{{date('d-m-Y', strtotime($model['peribadi']['tkh_wajib_bersara']))}}</tr>
                   @if(!empty($gred_sekarang->status_perkhidmatan))
                   @if($gred_sekarang->status_perkhidmatan == 'H')
                   <tr>Gred Hakiki     :</tr>
                   <tr> {{$model['perkhidmatan']['gred_sekarang']}}</tr>
                   <tr>Tarikh Mula Gred Hakiki    : {{date('d-m-Y', strtotime($gred_sekarang->tkh_lantik))}}</tr>
                   @elseif ($gred_sekarang->status_perkhidmatan == 'M')
                   <tr>Gred Memangku :{{$model['perkhidmatan']['gred_sekarang']}}</tr>
                   <tr>Tarikh Mula Gred Memangku : </tr>
                   <tr>{{date('d-m-Y', strtotime($gred_sekarang->tkh_lantik))}}</tr>
                   @endif
                   @endif
                </table>
             </td>
             <td style="vertical-align:top;" colspan="5" class="righttop">
                <b>Pengalaman Kerja</b>
                <table class="mainbox" >
                   <tr class="">
                      <th class="boxpengalaman">Kategori</th>
                      <th class="boxpengalaman">Penempatan</th>
                      <th class="boxpengalaman">Gred Jawatan</th>
                      <th class="boxpengalaman">Gelaran Jawatan</th>
                      <th class="boxpengalaman" style="border-right: 0px;">Tempoh Khidmat</th>
                   </tr>
                   @if(isset($model['pengalaman']))
                   @foreach($model['pengalaman'] as $pengalaman)
                   <tr>
                      <td class="boxpengalaman">{{ strtoupper($pengalaman['aktiviti']) }}</td>
                      <td class="boxpengalaman">{{ strtoupper($pengalaman['tempat']) }}</td>
                      <td class="boxpengalaman"><center>{{ strtoupper($pengalaman['kod_gred_sebenar']) }}</center></td>
                      <td class="boxpengalaman">{{ $pengalaman['kod_gelaran_jawatan']}}</td>
                      <td class="boxpengalaman" style="border-right: 0px">
                         <table class="kini">
                            <tr><td class="boxpengalaman2">{{date('d-m-Y', strtotime($pengalaman['mula']))  }}</td></tr>
                               <tr><td class="boxpengalaman2">sehingga</td></tr>
                                @if (date('d-m-Y', strtotime($pengalaman['tamat'] )) == '01-01-0001')
                               <tr><td class="boxpengalaman2">kini<td></tr>
                               @else
                               <tr><td class="boxpengalaman2" s>{{ date('d-m-Y', strtotime($pengalaman['tamat'] )) }}</td></tr>
                               @endif
                         </table>
                     </td>
                   </tr>
                   @endforeach
                   @endif
                </table>
             </td>
          </tr>
          <tr>
             <td style="vertical-align:top;" colspan="2" rowspan={{$kira_kelayakan}} class="bordertop">
                <p><b>E. KELAYAKAN AKADEMIK DAN PROFESSIONAL</b></p>
                <p><b>KELAYAKAN KOMPETENSI TEMPATAN/</b></p>
                <p><b>KELAYAKAN KOMPETENSI ANTARABANGSA</b></p>
             </td>
             <td  colspan="5" class="righttop" style="border-spacing:0px;">
          <tr class="grey1">
             <td colspan="5">
                <center><b>KELAYAKAN AKADEMIK</b></center>
             </td>
          </tr>
          <tr>
             <th  class="boxpengalaman">No</th>
             <th class="boxpengalaman" colspan="2">Tajuk <br/> Kelulusan</th>
             <th class="boxpengalaman">Institusi Pengajian</th>
             <th class="boxpengalaman" style="width: 10%">
                <center>Tahun Kelulusan</center>
             </th>
          </tr>
          <?php $i=0; ?>
          @if(isset($model['kelayakan']))
          @foreach($model['kelayakan'] as $kelayakan)
          <tr>
             <td style="vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman"colspan="2">{{ strtoupper(htmlspecialchars_decode($kelayakan['nama_kelulusan'])) }}</td>
             <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($kelayakan['institusi'])) }}</td>
             <td class="boxpengalaman" style="width: 10%">
                <center>{{ date('Y', strtotime($kelayakan['tkh_kelulusan'])) }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          @endif
          <tr class="grey1">
             <td colspan="5">
                <center><b>PROFESIONAL</b></center>
             </td>
          </tr>
          <tr>
             <th class="boxpengalaman">No</th>
             <th class="boxpengalaman" colspan="2">Badan Profesional yang diiktiaf dan Kelayakan</th>
             <th class="boxpengalaman" colspan="2">No pendaftaran</th>
          </tr>
          <?php $i=0; ?>
          @if(isset($model['professional']))
          @foreach($model['professional'] as $professional)
          <tr>
              <td style="vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman" colspan="2">{{ strtoupper(htmlspecialchars_decode($professional['nama_kelulusan'])) }}</td>
             <td class="boxpengalaman" colspan="2"><center>{{strtoupper($professional['no_daftar'])}}</center></td>
             <!-- <td class="boxpengalaman">
                <center>{{ date('Y', strtotime($professional['tkh_kelulusan'])) }}</center>
             </td> -->
          </tr>
          <?php $i++; ?>
          @endforeach
          @endif
          <tr class="grey1">
             <td colspan="5">
                <center><b>KELAYAKAN KOMPETENSI TEMPATAN</b></center>
             </td>
          </tr>
          <tr>
             <th class="boxpengalaman">No</th>
             <th class="boxpengalaman">Pensijilan Kompetensi</th>
             <th class="boxpengalaman">Tahap</th>
             <th class="boxpengalaman">No pendaftaran</th>
             <th class="boxpengalaman">Tahun</th>
          </tr>
          <?php $i=0; ?>
          @if(isset($model['tempatan']))
          @foreach($model['tempatan'] as $tempatan)
          <tr>
           <td style="vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             @if($tempatan['nama_kelulusan'] != 9999)
             <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($tempatan['nama_kelulusan'])) }}</td>
             @else
             <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($tempatan['institusi']))}}</td>
             @endif
             <td class="boxpengalaman">{{ strtoupper($tempatan['tahap']??'') }}</td>
             <td class="boxpengalaman">{{strtoupper($tempatan['no_daftar'])}}</td>
             <td class="boxpengalaman">
                <center>{{ date('Y', strtotime($tempatan['tkh_kelulusan'])) }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          @endif
          <tr class="grey1">
             <td colspan="5">
                <center><b>KELAYAKAN KOMPETENSI ANTARABANGSA</b></center>
             </td>
          </tr>
          <tr>
             <th class="boxpengalaman">No</th>
             <th class="boxpengalaman">Pensijilan Kompetensi</th>
             <th class="boxpengalaman">Tahap</th>
             <th class="boxpengalaman">No pendaftaran</th>
             <th class="boxpengalaman">Tahun</th>
          </tr>
          <?php $i=0; ?>
          @if(isset($model['antarabangsa']))
          @foreach($model['antarabangsa'] as $antarabangsa)
          <tr>
             <td style="vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             @if($antarabangsa['nama_kelulusan'] != 9999)
             <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($antarabangsa['nama_kelulusan'])) }}</td>
             @else
             <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($antarabangsa['institusi']))}}</td>
             @endif
             <td class="boxpengalaman">{{ strtoupper($antarabangsa['tahap']??'') }}</td>
             <td class="boxpengalaman">{{strtoupper($antarabangsa['no_daftar'])}}</td>
             <td class="boxpengalaman">
                <center>{{ date('Y', strtotime($antarabangsa['tkh_kelulusan'])) }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          @endif
          </td>
          </tr>
          <tr>
             <td style="vertical-align:top;" colspan="2" class="bordertop" rowspan={{$kira_sumbangan}} ><b>F. SUMBANGAN DAN KEGIATAN</b></td>
             <td colspan="5" class="righttop">
          <tr class="grey1">
             <td colspan="5">
                <center><b>JURNAL/BULETIN/KERTAS UTAMA</center>
                </b>
             </td>
          </tr>
          @if(isset($model['jurnal']))
          <tr>
             <th style="width: 6px;" class="boxpengalaman" >No</th>
             <th class="boxpengalaman" colspan="3">Tajuk</th>
             <th style="width: 90px;" class="boxpengalaman" >Tahun</th>
          </tr>
          <?php $i=0; ?>
          @foreach($model['jurnal'] as $jurnal)
          <tr>
             <td style="width: 6px;vertical-align:top;" class="boxpengalaman" >
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman" colspan="3">{{ strtoupper(htmlspecialchars_decode($jurnal['nama_kelulusan'])) }}</td>
             <td style="width: 90px;"class="boxpengalaman" >
                <center>{{ date('Y', strtotime($jurnal['tkh_kelulusan'])) }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          @endif
          <tr class="grey1">
             <td colspan="5" >
                <center><b>JAWATAN KUASA TEKNIKAL</center>
                </b>
             </td>
          </tr>
          <tr>
             <th style="width: 6px;" class="boxpengalaman">No</th>
             <th class="boxpengalaman"colspan="3">Jawatankuasa Teknikal</th>
             <th class="boxpengalaman">Tahun</th>
          </tr>
          <?php $i=0; ?>
          @foreach($model['jawatanKuasateknikal'] as $jawatanKuasateknikal)
          <tr>
             <td style="width: 6px;vertical-align:top;" class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman" colspan="3">{{ strtoupper(htmlspecialchars_decode($jawatanKuasateknikal['nama_kelulusan'])) }}</td>
             <td class="boxpengalaman">
                <center>{{ date('Y', strtotime($jawatanKuasateknikal['tkh_kelulusan'])) }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          <tr class="grey1">
             <td colspan="5">
                <center><b>SUMBANGAN DAN KEGIATAN DI DALAM TUGAS RASMI</center>
                </b>
             </td>
          </tr>
          <tr>
             <th style="width: 6px;" class="boxpengalaman">No</th>
             <th class="boxpengalaman" colspan="3">Sumbangan</th>
             <th class="boxpengalaman">Tahun</th>
          </tr>
          <?php $i=0; ?>
          @foreach($model['dalamTugasrasmi'] as $dalamTugasrasmi)
          <tr>
             <td style="width: 6px;vertical-align:top;" class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman" colspan="3">{{ strtoupper(htmlspecialchars_decode($dalamTugasrasmi['nama_kelulusan'])) }}</td>
             <td class="boxpengalaman" >
                <center>{{ date('Y', strtotime($dalamTugasrasmi['tkh_kelulusan'])) }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          <tr class="grey1">
             <td colspan="5">
                <center><b>SUMBANGAN DAN KEGIATAN DI LUAR TUGAS RASMI</center>
                </b>
             </td>
          </tr>
          <tr>
             <th style="width: 6px;"class="boxpengalaman">No</th>
             <th class="boxpengalaman"colspan="3">Sumbangan</th>
             <th class="boxpengalaman">Tahun</th>
          </tr>
          <?php $i=0; ?>
          @foreach($model['luarTugasrasmi'] as $luarTugasrasmi)
          <tr>
             <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman"colspan="3">{{ strtoupper(htmlspecialchars_decode($luarTugasrasmi['nama_kelulusan'])) }}</td>
             <td class="boxpengalaman">
                <center>{{ date('Y', strtotime($luarTugasrasmi['tkh_kelulusan'])) }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          </td>
          </tr>
          <tr>
             <td style="vertical-align:top;"colspan="2" class="bordertop" rowspan={{$kira_iktiraf}}><b>G.PENGIKTIRAFAN</b></td>
             <td colspan="5" class="righttop">
          <tr class="grey1" >
             <td colspan="5">
                <center><b>APC</b></center>
             </td>
          </tr>
          <tr>
             <th style="width: 6px;"class="boxpengalaman"> No</th>
             <th class="boxpengalaman" colspan="3">APC</th>
             <th class="boxpengalaman" >Tahun</th>
          </tr>
          <?php $i=0; ?>
          @foreach($model['aPC'] as $aPC)
          <tr>
             <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman"colspan="3">{{ strtoupper(htmlspecialchars_decode($aPC['kod_peristiwa'])) }}</td>
             <td class="boxpengalaman">
                <center>{{date('Y', strtotime($aPC['tkh_mula_peristiwa']))  }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          <tr class="grey1">
             <td colspan="5">
                <center><b>PINGAT</center>
                </b>
             </td>
          </tr>
          <tr>
             <th style="width: 6px;"class="boxpengalaman">No</th>
             <th class="boxpengalaman" colspan="3">Pingat</th>
             <th class="boxpengalaman" >Tahun</th>
          </tr>
          <?php $i=0; ?>
          @foreach($model['pingat'] as $pingat)
          <tr>
             <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman"colspan="3">{{ strtoupper(htmlspecialchars_decode($pingat['kod_peristiwa'])) }} ({{ strtoupper(htmlspecialchars_decode($pingat['catatan'])) }})</td>
             <td class="boxpengalaman">
                <center>{{date('Y', strtotime($pingat['tkh_mula_peristiwa']))  }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          <tr class="grey1">
             <td colspan="5">
                <center><b>ANUGERAH UMUM</center>
                </b>
             </td>
          </tr>
          <tr>
             <th style="width: 6px;"class="boxpengalaman">No</th>
             <th class="boxpengalaman" colspan="3">Anugerah Umum</th>
             <th class="boxpengalaman">Tahun</th>
          </tr>
          <?php $i=0; ?>
          @foreach($model['anugerahUmum'] as $anugerahUmum)
          <tr>
             <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                <center>{{ $i + 1 }}</center>
             </td>
             <td class="boxpengalaman" colspan="3">{{ isset($anugerahUmum['catatan']) ? strtoupper(htmlspecialchars_decode($anugerahUmum['catatan'])) : '' }}</td>
             <td class="boxpengalaman">
                <center>{{date('Y', strtotime($anugerahUmum['tkh_mula_peristiwa']))  }}</center>
             </td>
          </tr>
          <?php $i++; ?>
          @endforeach
          </td>
          </tr>
       </table>
     <br>
    </div>
    <div style="page-break-before: always"></div>
    <div></div>
      <div style="page-break-before: always" class="lampiran2 font">
          <table class="font">
             <tr>
                <td colspan="7" style="text-align:right; width:800px">
                   <b>LAMPIRAN 2</b>
                </td>
             </tr>
             <tr>
                <td colspan="7">
                   <b>KURSUS DAN SEMINAR YANG DIHADIRI</b>
                </td>
             </tr>
                <?php $i=0; ?>
                @if(isset($lampiran_kursus))
                @foreach($lampiran_kursus as $lk)
             <tr style="font-family: Arial, Helvetica, sans-serif; font-size: 12pt">
                <td style="width: 5%;vertical-align:top;">{{ $i + 1 }}.</td>
                <td colspan="6">{{htmlspecialchars_decode($lk->nama_kursus)  }}.<br>({{date('d-m-Y', strtotime($lk->tkh_mula))}} - {{date('d-m-Y', strtotime($lk->tkh_tamat))}}) . {{$lk->tempat}}</td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @else
             <tr>
                <td style="width: 5%;vertical-align:top;"></td>
                <td colspan="6"></td>
             </tr>
             @endif
          </table>
          <br>
       </div>
    <div style="page-break-before: always" class="lampiran3">
          <table class="font">
             <tr>
                <td colspan="7" style="text-align:right; width:800px">
                   <b>LAMPIRAN 3</b>
                </td>
             </tr>
             <tr>
                <td colspan="7" style="text-align:left; width:800px">
                            <p>-RUJUK LAMPIRAN JD- </p>
                </td>
             </tr>
             <?php
                // A few settings
                // $image =url('/').$lampiran_beban->path;

                // // Read image path, convert to base65 encoding
                // $imageData = base64_encode(file_get_contents($image));

                // // Format the image SRC:  data:{mime};base64,{data};
                // $src = 'data:'.mime_content_type($image).';base64,'.$imageData;

                // // Echo out a sample image
                // echo '<img src="',$src,'">';
                ?>
             <tr>
                <td colspan="7" style="text-align:right; width:800px">	</td>
             </tr>
          </table>
          <br>
       </div>
    <div></div>
    <div style="page-break-before: always" class="lampiran4">
          <table class="font">
             <tr>
                <td colspan="7" style="text-align:right;  width:800px">
                   <b>LAMPIRAN 4</b>
                </td>
             </tr>
             <tr>
                <td colspan="7">
                   <b>SENARAI PROJEK BESERTA KOS(DI PENEMPATAN SEMASA SAHAJA)</b>
                </td>
             </tr>
             <?php $i=0; ?>
                @if(isset($lampiran_projek))
                @foreach($lampiran_projek as $lp)
             <tr>

                <td style="width: 5%;vertical-align:top;">{{ $i + 1 }}.</td>
                <td colspan="6">{{htmlspecialchars_decode($lp->nama_projek)}}.<br>Kos Projek: RM{{number_format($lp->kos_projek,2)}}</td>
             </tr>
             <?php $i++; ?>
             @endforeach
             {{-- <tr>
                <td>@.</td>
                <td colspan="6">!@#$%^&*()_+ +_)(*&^%$#@!)</td>
             </tr> --}}
             {{-- <tr>
                <td colspan="7" style="text-align:right; width:800px; height: 800px;">	</td>
             </tr> --}}
             <tr>
                <td style="width: 5%;vertical-align:top;"></td>
                <td colspan="6"></td>
             </tr>
             @endif
          </table>
           <br>
    </div>
    <div ></div>
    <div style="page-break-before: always">
       <table class="font" class="lampiran5">
             <tr>
                <td colspan="7"style="text-align:right; width:800px; font-family:Arial, Helvetica, sans-serif;">
                   <b>LAMPIRAN 5</b>
                </td>
             </tr>
             <tr>
                <td colspan="7" style="font-family:Arial, Helvetica, sans-serif;">
                   <b>SENARAI KEPAKARAN</b>
                </td>
             </tr>
              <?php $i=0; ?>
                @if(isset($lampiran_kepakaran))
                @foreach($lampiran_kepakaran as $lk)
             <tr>
                <td style="width: 5%;vertical-align:top; font-family:Arial, Helvetica, sans-serif;">{{ $i + 1 }}.</td>
                <td colspan="6" style="font-family:Arial, Helvetica, sans-serif;">{{htmlspecialchars_decode($lk->diskripsi)}}</td>
             </tr>
             <tr></tr>
             <tr></tr>
             <?php $i++; ?>
             @endforeach
             @else
             <tr>
                <td style="width: 5%;vertical-align:top;"></td>
                <td colspan="6"></td>
             </tr>
             @endif
             <tr>
                <td colspan="7" style="font-family:Arial, Helvetica, sans-serif;">
                   <b>SENARAI PENCAPAIAN TERTINGGI</b>
                </td>
             </tr>

                <?php $i=0; ?>
                @if(isset($lampiran_pencapaian))
                @foreach($lampiran_pencapaian as $lpc)
             <tr>
                <td style="width: 5%;vertical-align:top; font-family:Arial, Helvetica, sans-serif;">{{ $i + 1 }}.</td>
                <td colspan="6" style="font-family:Arial, Helvetica, sans-serif;">{{htmlspecialchars_decode($lpc->diskripsi)}}</td>
             </tr>
             <tr></tr>
             <tr></tr>
             <?php $i++; ?>
             @endforeach
             @else
             <tr>
                <td style="width: 5%;vertical-align:top;"></td>
                <td colspan="6"></td>
             </tr>
             @endif
          </table>
           <br>
    </div>

      <!--  <div style="page-break-before: always" class="lampiran6">
           <span>tmat</span>
           <table></table>
       </div> -->

    </body>

</html>
