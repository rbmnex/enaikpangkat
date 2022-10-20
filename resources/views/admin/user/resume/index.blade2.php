<html>
<head><title>Resume</title>
<style>

	
.stan{
	width: 250px;
	background-color: powderblue;
}

.label{
	width: 150%;
	background-color: powderblue;
}
.dev{
	width: 5px;
	background-color: powderblue;
}
}
</style>
</head>
<body bgcolor="white">

<table>
	<tr>
    <th colspan="6" style="background-color: grey";>RESUME</th>   
	</tr>
	<tr>
		<td colspan="6">A.BUTIRAN PERIBADI</td>
		
	</tr>
	<tr>
		<td colspan="5">
			<ul>
			  <li>Nama           :  {{ $model['name'] }} </li>
			  <li>Jawatan        : {{ $model['jawatan'] }}</li>
			  <li>No. Kad Pengenalan:{{ $model['nokp'] }}</li>
			  <li>Tarikh Lahir   :  {{ date('d-m-Y', strtotime($model['peribadi']['tkh_lahir'])) }} </li>
			  <li>Tempat Lahir    : {{ $model['peribadi']['tempat_lahir'] }} </li>
			  <li>Taraf Perkahwinan :  {{ $model['peribadi']['taraf_perkahwinan'] }} </li>
			  <li>No. Telefon       : {{ $model['tel_pejabat'] }}</li>
			  <li>HP       :{{ $model['peribadi']['tel_bimbit']}}</li>
			  <li>No. Fax     :{{ $model['peribadi']['no_fax'] }} </li>
			  <li>Email    :  {{ $model['email'] }}  </li>
			  <li>Tarikh Pengisytiharan Harta Terkini :  {{date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) }}</li><br>
			  <li>Alamat Pejabat:{{ $model['alamat_pejabat'] }}</li><br>
			  <li>Alamat Rumah:{{ $model['peribadi']['alamat_rumah'] }}</li>
			</ul>
		</td>
		<td rowspan="5"><img src=https://mykj.jkr.gov.my/{{ $model['peribadi']['gambar'] }}	
  alt="" width="120" height="140" align="top"></td>
		
	</tr>
	<tr>
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
		<td></td>
	</tr>
</table>
<table border="1"  >
<tr>
    <th colspan="3" style="background-color: grey";>RESUME</th>   
</tr>
<tr border="1">
	<th style="color:blue;text-align: left;" colspan="3">A.BUTIRAN PERIBADI</th>
	<tr>
		<td >Nama</td>
    	<td >{{ $model['name'] }}</</td>
		<td  rowspan="5"><img src=https://mykj.jkr.gov.my/{{ $model['peribadi']['gambar'] }}	
  alt="" width="120" height="140"></td>
	</tr>
    <tr>
		<td>Jawatan</td>
    	<td>{{ $model['jawatan'] }}</</td>
	</tr>
    <tr>
		<td>No. Kad Pengenalan</td>
    	<td>{{ $model['nokp'] }}</</td>
    </tr>
    <tr>
		<td>Tarikh Lahir</td>
    	<td>{{ date('d-m-Y', strtotime($model['peribadi']['tkh_lahir'])) }}</</td>
	</tr>
    <tr>
		<td>Tempat Lahir</td>
    	<td>{{ $model['peribadi']['tempat_lahir'] }}</td>
    </tr>
    <tr>
		<td>Alamat Pejabat</td>
    	<td>{{ $model['alamat_pejabat'] }}</</td>
	</tr>
    <tr>
		<td>Alamat Rumah</td>
    	<td>{{ $model['peribadi']['alamat_rumah'] }}</td>
	</tr>
    <tr>
		<td>Taraf Perkahwinan</td>
    	<td>{{ $model['peribadi']['taraf_perkahwinan'] }}</</td>
	</tr>
    <tr>
		<td>No. Telefon</td>
    	<td>{{ $model['tel_pejabat'] }}</td>
    </tr>
    <tr>
    	<td>HP</td>
    	<td>{{ $model['peribadi']['tel_bimbit']}}</</td>

    </tr>
    <tr>
		<td>No. Fax</td>
    	<td>{{ $model['peribadi']['no_fax'] }}</</td>
    </tr>
    <tr>
		<td>Email</td>
    	<td>{{ $model['email'] }}</</td>
    </tr>
    <tr>
		<td>Tarikh Pengisytiharan Harta Terkini</td>
    	<td>{{date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) }}</</td>
    </tr>   
</tr>
<br>
<tr border="1">
	<th style="color:blue;text-align: left;" colspan="3" >
		B. PRESTASI (LNPT 3 tahun terkini)
	</th>
	<tr>
		<td>Tahun</td>
        <td>Purata</td>
    </tr>
	 @if(isset($model['markah'])) 
       @foreach($model['markah'] as $markah) 	
    	<tr>
    		<td>{{ $markah['tahun'] }}</td>
    		<td>{{ $markah['purata'] }}</td>
    	</tr>
        @endforeach
    @endif    
</tr>
<br>
<tr border="1">
	<th style="color:blue;text-align: left;" colspan="3" >
	C. KEPAKARAN DAN PENGALAMAN </th>
</tr>
	<tr>
		<td>
			<li>Tempoh bidang pengkhususan</li>
			<li>Tempoh atas gred terakhir</li>
			<li>Tempoh perkhidmatan</li>
		</td>
		<td>
			
			 @if(isset($model['pengalamanPengkhususan'])) 
       			@foreach($model['pengalamanPengkhususan'] as $pengalamanPengkhususan) 	
		    	<table>
		    	<tr>
		    	@if ($pengalamanPengkhususan['kod_aktiviti'] >= 50)
		    	<td>Kategori</td>
		    	<td>{{ $pengalamanPengkhususan['aktiviti'] }}</td>
		    	<td>{{ date('d-m-Y', strtotime($pengalamanPengkhususan['mula'])) }}</td>
		    	<td>{{ date('d-m-Y', strtotime($pengalamanPengkhususan['tamat'])) }}</td>

		    	@endif<!--  -->
		    	</tr>
		    
		    	</table>
		    	<br>
        		@endforeach
    		@endif   


		</td>
		
	</tr>
    <br>
   
   
</tr>
<tr border="1">
	<th style="color:blue; text-align: left;" colspan="3" >
	D. PENDEDAHAN </th>
</tr>
	<tr>
	
			<tr>
			<td>Majikan</td>
	        <td>JABATAN KERJA RAYA MALAYSIA</td></tr>
	        <tr><td>Skim Perkhidmatan</td>
	    	<td>PENGURUSAN DAN PROFESSIONAL</td></tr>
		    <br>
		    <tr><td>Tarikh Mula Perkhidmatan</td><td>{{ date('d-m-Y', strtotime($mula_khidmat->tkh_lantik)) }}</td></tr>
		    <tr><td>Tarikh Bersara Wajib</td><td>{{date('d-m-Y', strtotime($model['peribadi']['tkh_wajib_bersara']))}}</td></tr>
		    <tr><td>Gred Hakiki</td><td>{{$model['perkhidmatan']['gred_hakiki']}}</td></tr>
		    <tr><td>Tarikh Mula Gred Hakiki</td><td>{{date('d-m-Y', strtotime($mula_gred_hakiki->tkh_lantik))}}</td></tr>
		
		
			
			 @if(isset($model['pengalaman'])) 
       			@foreach($model['pengalaman'] as $pengalaman) 	
		    	<table border="1" style="width:500px;">
		    	<tr>
		    	<td>Kategori</td>
		    	<td>{{ $pengalaman['aktiviti'] }}</td>
		    	</tr>
		    	<tr>
		    		<td>Penempatan</td>
		    		<td>{{ $pengalaman['tempat'] }}</td>
		    	</tr>
		    	<tr>
		    		<td>Gred Jawatan</td>
		    		<td>{{ $pengalaman['kod_gred_sebenar'] }}</td>
		    	</tr>
		    	<tr>
		    		<td>Gelaran Jawatan</td>
		    		<td>{{ $pengalaman['kod_gelaran_jawatan'] }}</td>
		    	</tr>
		    	<tr>
		    		<td>Tempoh Khidmat</td>
		    		<td>{{date('d-m-Y', strtotime($pengalaman['mula']))  }} sehingga {{ date('d-m-Y', strtotime($pengalaman['tamat'] )) }} </td>
		    	</tr>
		    	</table>
		    	<br>
        		@endforeach
    		@endif   


		
   
</tr>
<tr border="1"><th style="color:blue;text-align: left;" colspan="3" >
	E. KELAYAKAN AKADEMIK DAN PROFESSIONAL</th></tr>
	<tr>
		<table>
			<tr><td>AKADEMIK</td></tr>
			<tr>
				<th>No</th>
				<th>Tajuk Kelulusan</th>
				<th>Institusi Pengajian</th>
				<th>Tahun Kelulusan</th>
			</tr>
			<?php $i = 1 ?>
			 @if(isset($model['kelayakan'])) 
                 @foreach($model['kelayakan'] as $kelayakan)
                 <tr><td>{{$i}}</td>
                 <td>{{ $kelayakan['nama_kelulusan'] }}</td>
                 <td>{{ $kelayakan['institusi'] }}</td>
                 <td>{{ date('Y', strtotime($kelayakan['tkh_kelulusan'])) }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  

		</table>
		<table>
			<tr><td>PROFESIONAL</td></tr>
			<tr>
				<th>No</th>
				<th>Kelayakan Profesional /Pendaftaran Dengan Badan Profesional</th>
				<th>Badan Profesional Yang Diiktiraf</th>
				<th>No pendaftaran</th>
				<th>Tahun</th>
			</tr>
			<?php $i = 1 ?>
			 @if(isset($model['professional'])) 
                 @foreach($model['professional'] as $professional)
                 <tr><td>{{$i}}</td>
                 <td>{{ $professional['nama_kelulusan'] }}</td>
                 <td>{{ $professional['institusi'] }}</td>
                 <td>{{$professional['no_daftar']}}</td>
                 <td>{{ date('Y', strtotime($professional['tkh_kelulusan'])) }}</td></tr>
	             @endforeach
	              <?php $i++ ?>
	        @endif  

		</table>
		
    </tr>
    </td>
   
</tr>
<tr border="1"><th style="color:blue;text-align: left;" colspan="3" >
	F. SUMBANGAN DAN KEGIATAN </th>
</tr>
	<tr><td>Jurnal/buletin/kertas utama</td></tr>
	<tr>
		<?php $i = 1 ?>
		 @if(isset($model['jurnal'])) 
                 @foreach($model['jurnal'] as $jurnal)
                 <tr><td>{{$i}}</td>
                 <td>{{ $jurnal['nama_kelulusan'] }}</td>
                 <td>{{ date('Y', strtotime($jurnal['tkh_kelulusan'])) }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  
	</tr>
	<tr><td>Jawatan Teknikal</td></tr>
	<tr>
		<?php $i = 1 ?>
		 @if(isset($model['jawatanKuasateknikal'])) 
                 @foreach($model['jawatanKuasateknikal'] as $jawatanKuasateknikal)
                 <tr><td>{{$i}}</td>
                 <td>{{ $jawatanKuasateknikal['nama_kelulusan'] }}</td>
                 <td>{{ date('Y', strtotime($jawatanKuasateknikal['tkh_kelulusan'])) }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  
	</tr>
	<tr><td>Sumbangan dan Kegiatan di dalam Tugas Rasmi</td></tr>
	<tr>
		<?php $i = 1 ?>
		 @if(isset($model['dalamTugasrasmi'])) 
                 @foreach($model['dalamTugasrasmi'] as $dalamTugasrasmi)
                 <tr><td>{{$i}}</td>
                 <td>{{ $dalamTugasrasmi['nama_kelulusan'] }}</td>
                 <td>{{ date('Y', strtotime($dalamTugasrasmi['tkh_kelulusan'])) }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  
	</tr>
	<tr><td>Sumbangan dan Kegiatan di luar Tugas Rasmi</td></tr>
	<tr>
		<?php $i = 1 ?>
		 @if(isset($model['luarTugasrasmi'])) 
                 @foreach($model['luarTugasrasmi'] as $luarTugasrasmi)
                 <tr><td>{{$i}}</td>
                 <td>{{ $luarTugasrasmi['nama_kelulusan'] }}</td>
                 <td>{{ date('Y', strtotime($luarTugasrasmi['tkh_kelulusan'])) }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  
	</tr>
	
	
   
   
</tr>
<tr border="1"><td style="color:blue;text-align: left;" colspan="3" >
	G. PENGIKHTIRAFAN </td>
</tr>
		<tr><td>APC</td></tr>
	<tr>
		<?php $i = 1 ?>
		 @if(isset($model['aPC'])) 
                 @foreach($model['aPC'] as $aPC)
                 <tr><td>{{$i}}</td>
                 <td>{{ $aPC['kod_peristiwa'] }}</td>
                 <td>{{date('Y', strtotime($aPC['tkh_mula_peristiwa']))  }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  
	</tr>
	<tr><td>Pingat</td></tr>
	<tr>
		<?php $i = 1 ?>
		 @if(isset($model['pingat'])) 
                 @foreach($model['pingat'] as $pingat)
                 <tr><td>{{$i}}</td>
                 <td>{{ $pingat['kod_peristiwa'] }}</td>
                 <td>{{date('Y', strtotime($pingat['tkh_mula_peristiwa']))  }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  
	</tr>
	<tr><td>Anugerah Umum</td></tr>
	<tr>
		<?php $i = 1 ?>
		 @if(isset($model['anugerahUmum'])) 
                 @foreach($model['anugerahUmum'] as $anugerahUmum)
                 <tr><td>{{$i}}</td>
                 <td>{{ $anugerahUmum['kod_peristiwa'] }}</td>
                 <td>{{date('Y', strtotime($anugerahUmum['tkh_mula_peristiwa']))  }}</td></tr>
	             @endforeach
	             <?php $i++ ?>
	        @endif  
	</tr>

	<tr>
		<td style="color:blue;text-align: left;" colspan="3" >
				H. LAIN-LAIN
		</td></tr>

</tr>
</table>

</body>
</html>