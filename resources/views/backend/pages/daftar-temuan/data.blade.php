<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="text-center" rowspan="2" style="width:15px;">#</th>
			<th class="text-center" rowspan="2">Bidang Pengawasan<br>No & Tgl LHP</th>
			<th class="text-center" rowspan="2">Temuan / Penyebab<br>(Uraian Ringkas)</th>
			<th class="text-center" colspan="2">Kode</th>
			<th class="text-center" rowspan="2">Rekomendasi<br>(Uraian Ringkas)</th>
			<th class="text-center" rowspan="2">Kode Rekomendasi</th>
			<th class="text-center" rowspan="2">Tanggapan</th>
			<th class="text-center" rowspan="2">Aksi</th>
        </tr>
        <tr>
            <th class="text-center">Temuan</th>
            <th class="text-center">Sebab</th>
        </tr>
	</thead>
	<tbody>
		@foreach ($daftar as $key => $us)
			<tr>
				<td>{{ $key = $key + 1 }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					<a class="btn btn-xs btn-warning btn-edit" style="height:24px !important;">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-xs btn-danger btn-delete" style="height:24px !important;">
						<i class="fa fa-trash"></i>
					</a>
				</td>
			</tr>
	@endforeach
	</tbody>
</table>