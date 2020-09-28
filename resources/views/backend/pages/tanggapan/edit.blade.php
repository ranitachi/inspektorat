@extends('backend.layouts.master')

@section('title')
	<title>Dashboard</title>
@endsection

@section('content')
	<div class="col-md-12">
        <div class="promo-footer" style="background:#fff;">
            <div class="row no-gutter">
                <div class="col-sm-4 promo-tab">
                    <div class="text-right">
                        <small style="margin-right:30px;">Bidang Pengawasan</small>
                        <div style="margin-top:5px;margin-right:30px;">
                            <h4 class="m-0 m-t-xs">{{ $temuan->pengawasan->bidang }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 promo-tab">
                    <div class="text-center">
                        <small>Nomor LHP</small>
                        <h4 class="m-0 m-t-xs">{{ $temuan->no_pengawasan }}</h4>
                    </div>
                </div>
                <div class="col-sm-4 promo-tab">
                    <div class="text-left" style="margin-left:30px;">
                        <small>Tanggal LHP</small>
                        <h4 class="m-0 m-t-xs">{{ $temuan->tgl_pengawasan }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        {{-- <h4 class="m-h-lg">Detail Temuan</h4> --}}
        <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-2">
                    <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                        <h4 class="panel-title">Uraian Temuan</h4>
                        <i class="fa acc-switch"></i>
                    </a>
                </div>
                <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        {!! $temuan->uraian_temuan !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-3">
                    <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                        <h4 class="panel-title">Uraian Rekomendasi</h4>
                        <i class="fa acc-switch"></i>
                    </a>
                </div>
                <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3" aria-expanded="false">
                    <div class="panel-body">
                        {!! $temuan->uraian_rekomendasi !!}
                    </div>
                </div>
            </div>
        </div><!-- panel-group -->
    </div>

    <div class="col-md-12">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Formulir Tindak Lanjut</span>
            </header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
                <form class="form-horizontal" action="{{ route('tindak-lanjut.update', $tindaklanjut->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="detail_id" value="{{ $temuan->id }}">
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Tindak Lanjut Temuan</label>
                        <div class="col-sm-10">
                            <textarea name="tindak_lanjut" id="ckeditor" cols="30" rows="10">{{ $tindaklanjut->tindak_lanjut }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Dokumen Pendukung</label>
                        <div class="col-sm-10">
                            <table class="table table-bordered" id="dokumen_pendukung">
                                <thead>
                                    <tr>
                                        <td style="width:15px;">#</td>
                                        <td>Nama Dokumen</td>
                                        <td>Uploaded File</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tindaklanjut->dokumen_tindak_lanjut as $dk)
                                        <tr id="trid{{ $dk->id }}">
                                            <td><i class="fa fa-arrow-right text-primary"></i></td>
                                            <td>{{ $dk->nama_dokumen }}</td>
                                            <td>
                                                <a href="{{ route('tindak-lanjut.download', $dk->path) }}" download>Download Dokumen</a>
                                                <a style="cursor:pointer;" data-value="{{ $dk->id }}" data-toggle="modal" data-target="#deletedokumen" class="pull-right delete-dokumen">
                                                    <i class="fa fa-close text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <a style="cursor:pointer;" id="tambah_dokumen">
                                            <i class="fa fa-plus text-success"></i> &nbsp;Tambah Baris
                                        </a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a style="cursor:pointer;" id="hapus_dokumen">
                                            <i class="fa fa-minus text-danger"></i> &nbsp;Hapus Baris
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <a href="{{ URL::previous() }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>

    
@endsection

@section('footscript')
    <script src="{{ url('/') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script>
        var APP_URL = "{{ url('/') }}"

        var options = {
            filebrowserImageBrowseUrl: APP_URL + '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: APP_URL + '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: APP_URL + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: APP_URL + '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>

    <script>
        CKEDITOR.replace( 'ckeditor', options);
        CKEDITOR.config.extraPlugins = 'justify';
    </script>

    <script>
        $('#tambah_dokumen').click(function(){
            var html =  '<tr>' +
                            '<td><input type="checkbox" class="form-control check"></td>' +
                            '<td><input type="text" class="form-control" name="nama_dokumen[]" required></td>' +
                            '<td><input type="file" class="form-control" name="path[]" required></td>' +
                        '</tr>'

            $('#dokumen_pendukung > tbody:last-child').append(html).fadeIn()
        })

        $('#hapus_dokumen').click(function(){
            $('input:checkbox:checked').parents("tr").remove().fadeIn()
        })
    </script>
@endsection