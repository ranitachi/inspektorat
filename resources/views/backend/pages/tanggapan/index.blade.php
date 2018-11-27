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
                            <h4 class="m-0 m-t-xs">Audit Kinerja</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 promo-tab">
                    <div class="text-center">
                        <small>Nomor Temuan</small>
                        <h4 class="m-0 m-t-xs">700.138/08-Insp/I/2017</h4>
                    </div>
                </div>
                <div class="col-sm-4 promo-tab">
                    <div class="text-left" style="margin-left:30px;">
                        <small>Nomor Kontrak Pekerjaan</small>
                        <h4 class="m-0 m-t-xs">29 Mei 2017</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="margin-top:20px;">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Formulir Tindak Lanjut</span>
            </header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="exampleTextInput1" class="col-sm-2 control-label">Tindak Lanjut Temuan</label>
                        <div class="col-sm-10">
                            <textarea name="tanggapan" id="ckeditor" cols="30" rows="10"></textarea>
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
                                        <td>Upload File</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" class="form-control check"></td>
                                        <td><input type="text" class="form-control" name="nama_dokumen[]" required></td>
                                        <td><input type="file" class="form-control" name="path[]" required></td>
                                    </tr>
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
                            <button type="submit" class="btn btn-success">Simpan</button>
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