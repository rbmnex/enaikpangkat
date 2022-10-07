<html>
<head><title>My CV </title></head>
<body bgcolor="white">
<h1><b> <b></h1>


<table border="1"  >
<tr>
    <th colspan="3">RESUME</th>
    
</tr>
<tr>
	<th style="color:blue;" colspan="3">A.BUTIRAN PERIBADI</th>
	<tr>
		<td>Nama</td>
    <td>{{ $model['name'] }}</</td>
<td rowspan="6">https://mykj.jkr.gov.my/foto/820530045278.jpg?rands=1226940542</td></tr>
    <tr>
		<td>Jawatan</td>
    <td>{{ $model['jawatan'] }}</</td></tr>
    <tr>
		<td>No. Kad Pengenalan</td>
    <td>{{ $model['nokp'] }}</</td></tr>
    <tr>
		<td>Tarikh Lahir</td>
    <td>{{ $model['peribadi']['tkh_lahir'] }}</</td></tr>
    <tr>
		<td>Tempat Lahir</td>
    <td>{{ $model['peribadi']['tempat_lahir'] }}</</td></tr>
    <tr>
		<td>Alamat Pejabat</td>
    <td>{{ $model['alamat_pejabat'] }}</</td></tr>
     <tr>
		<td>Alamat Rumah</td>
    <td>{{ $model['peribadi']['alamat_rumah'] }}</</td></tr>
     <tr>
		<td>Taraf Perkahwinan</td>
    <td>{{ $model['peribadi']['taraf_perkahwinan'] }}</</td></tr>
     <tr>
		<td>No. Telefon</td>
    <td>{{ $model['tel_pejabat'] }}{{ $model['peribadi']['tel_bimbit']}}</</td></tr>
     <tr>
		<td>No. Fax</td>
    <td>{{ $model['peribadi']['no_fax'] }}</</td></tr>
     <tr>
		<td>Email</td>
    <td>{{ $model['email'] }}</</td></tr>
     <tr>
		<td>Tarikh Pengishtiharan Harta Terkini</td>
    <td>{{ $model['name'] }}</</td></tr>
    </td>
    
</tr>
<tr><td style="color:blue;" colspan="3" >
	B. PRESTASI (LNPT 3 tahun terkini)</td>
	<tr>
		<td>Tahun</td>
        <td>Purata</td>
    </tr>
	 @if(isset($model['markah'])) 
       @foreach($model['markah'] as $markah) 	
    	<tr><td>{{ $markah['tahun'] }}</td>
    	<td>{{ $markah['purata'] }}</td></tr>
        @endforeach
    @endif    
</tr>
<tr><td style="color:blue;" colspan="3" >
	C. KEPAKARAN DAN PENGALAMAN </td></tr>
	<tr>
		<td><li>Tempoh bidang pengkhususan</li>
		<li>Tempoh atas gred terakhir</li>
		<li>Tempoh perkhidmatan</li></td>
		<td>
			Pengkhususan

		</td>
		
	</tr>
    
   
   
</tr>
<tr><td style="color:blue;" colspan="3" >
	D. PENDEDAHAN </td></tr>
	<tr>
		<tr>
		<td>Majikan</td>
        <td>JABATAN KERJA RAYA MALAYSIA</td></tr>
        <tr><td>Skim Perkhidmatan</td>
    <td>PENGURUSAN DAN PROFESSIONAL</td></tr>
		
   
</tr>
<tr><td style="color:blue;" colspan="3" >
	E. KELAYAKAN AKADEMIK DAN PROFESSIONAL
	<tr>
		<td>2017</td>
    <td>{{ $model['name'] }}</</td>
    <tr>
		<td>2018</td>
    <td>{{ $model['jawatan'] }}</</td></tr>
    <tr>
		<td>2019</td>
    <td>{{ $model['nokp'] }}</</td></tr>
    </tr>
    </td>
   
</tr>
<tr><td style="color:blue;" colspan="3" >
	F. SUMBANGAN DAN KEGIATAN
	<tr>
		<td>2017</td>
    <td>{{ $model['name'] }}</</td>
    <tr>
		<td>2018</td>
    <td>{{ $model['jawatan'] }}</</td></tr>
    <tr>
		<td>2019</td>
    <td>{{ $model['nokp'] }}</</td></tr>
    </tr>
    </td>
   
</tr>
<tr><td style="color:blue;" colspan="3" >
	G. PENGIKTIRAFAN
	<tr>
		<td>2017</td>
    <td>{{ $model['name'] }}</</td>
    <tr>
		<td>2018</td>
    <td>{{ $model['jawatan'] }}</</td></tr>
    <tr>
		<td>2019</td>
    <td>{{ $model['nokp'] }}</</td></tr>
    </tr>
    </td>
   
</tr>
<tr>
	<tr>
		<td style="color:blue;" colspan="3" >
				H. LAIN-LAIN
		</td></tr>

</tr>
</table>

</body>
</html>