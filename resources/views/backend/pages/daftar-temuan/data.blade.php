<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="text-center" rowspan="2" style="width:15px;">#</th>
			<th class="text-center" rowspan="2">Bidang Pengawasan<br>No & Tgl LHP</th>
			<th class="text-center" rowspan="2">Temuan / Penyebab<br>(Uraian Ringkas)</th>
			<th class="text-center" colspan="2">Kode</th>
			<th class="text-center" rowspan="2">Rekomendasi<br>(Uraian Ringkas)</th>
			<th class="text-center" rowspan="2">Kode Rekomendasi</th>
			@if (Auth::user()->level==3)
				<th class="text-center" rowspan="2">Tanggapan</th>
			@else
				<th class="text-center" rowspan="2">Status</th>
			@endif
			<th class="text-center" rowspan="2">Aksi</th>
        </tr>
        <tr>
            <th class="text-center">Temuan</th>
            <th class="text-center">Sebab</th>
        </tr>
	</thead>
	<tbody>
		{{-- @foreach ($daftar as $key => $us) --}}
			<tr>
				<td>1</td>
				<td>
					Audit Kinerja <br>
					700.138/08-Insp/I/2017 <br>
					29 Mei 2017
				</td>
				<td>
					Terdapat 2 orang Pejabat belum membuat Program Kerja, yaitu sebagai berikut:
					<br>
					- Kepala Sub Bidang Keuangan <br>
					- Kepala Sub Bidang Administratif <br>
					<br>
					Penyebab: <br>
					Pejabat yang bersangkutan belum menaati peraturan yang berlaku.
				</td>
				<td>03</td>
				<td>104</td>
				<td>
					Kepala Dinas secara tertulis memerintahkan agar segera membuat Program Kerja Tahunan untuk Tahun Anggaran 2017.
				</td>
				<td>050</td>
				@if (Auth::user()->level==3)
					<td><i style="color:red;">Belum Ada</i></td>
				@else
					<td><i style="color:green;">Sudah Verifikasi</i></td>
				@endif
				<td style="display:flex;">
					@if (Auth::user()->level==3)
						<span data-toggle="tooltip" data-title="Tanggapan">
							<a href="{{ route('tindak-lanjut.index') }}" class="btn btn-xs btn-success" style="height:24px !important;">
								<i class="fa fa-volume-up"></i>
							</a>
						</span>&nbsp;
						<span data-toggle="tooltip" data-title="Detail">
							<a class="btn btn-xs btn-primary" style="height:24px !important;">
								<i class="fa fa-list"></i>
							</a>
						</span>
					@endif
					@if (Auth::user()->level==1)
						<span data-toggle="tooltip" data-title="Verifikasi">
							<a href="" class="btn btn-xs btn-success" style="height:24px !important;">
								<i class="fa fa-check"></i>
							</a>
						</span>
					@endif
					@if (Auth::user()->level==2)
						<span data-toggle="tooltip" data-title="Ubah">
							<a href="" class="btn btn-xs btn-warning" style="height:24px !important;">
								<i class="fa fa-edit"></i>
							</a>
						</span>&nbsp;
						<span data-toggle="tooltip" data-title="Hapus">
							<a href="" class="btn btn-xs btn-danger" style="height:24px !important;">
								<i class="fa fa-trash"></i>
							</a>
						</span>
					@endif
				</td>
			</tr>
	{{-- @endforeach --}}
	</tbody>
</table>