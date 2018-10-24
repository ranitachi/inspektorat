@extends('backend.layouts.master')

@section('title')
    <title>Tambah Daftar Temuan</title>
@endsection
@section('content')
	<div class="col-md-12">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Tambah Daftar Temuan</span>
            </header>
			<hr class="widget-separator">
			<div class="widget-body">
                <form class="form-horizontal" action="{{url('list-temuan')}}" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleTextInput1" class="col-sm-4 control-label">Tahun Pemeriksaan</label>
                                <div class="col-sm-3">
                                    <select name="tahun" id="tahun" class="form-control text-left select2" data-plugin="select2" onchange="getdata()">
                                        @for ($i = (date('Y')-5); $i <= (date('Y')); $i++)
                                            <option value="{{$i}}" {{date('Y')==$i ? 'selected="selected"' : ''}}>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email2" class="col-sm-4 control-label">Obyek Pemeriksaan</label>
                                <div class="col-sm-8">
                                    <select name="dinas_id" id="dinas_id" class="form-control text-left" style="text-align:left !important" data-plugin="select2" onchange="getdata()">
                                        <option value="">-- Pilih Dinas --</option>
                                        @foreach ($dinas as $item)
                                            <option value="{{$item->id}}">{{$item->nama_dinas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textarea1" class="col-sm-4 control-label">Bidang Pengawasan</label>
                                <div class="col-sm-8">
                                    <select name="pengawasan_id" id="pengawasan_id" class="form-control text-left" style="text-align:left !important" data-plugin="select2" onchange="getdata()">  
                                        <option value="">-- Pilih Bidang Pengawasan --</option>
                                        @foreach ($bidang as $item)
                                            <option value="{{$item->id}}">{{$item->bidang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="textarea1" class="col-sm-4 control-label">Nomor Pengawasan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_pengawasan" class="form-control" id="no_pengawasan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textarea1" class="col-sm-4 control-label">Tanggal Pengawasan</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker2" data-plugin="datepicker" data-date-format="dd/mm/yyyy">
										<input type="text" name="tgl_pengawasan" class="form-control" id="tgl_pengawasan">
										<span class="input-group-addon bg-info text-white">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="widget-separator">
                    <br>
                    @for ($i = 0; $i < 5; $i++)
                    
                        <div class="row" style="">
                            <div class="col-md-4">
                                <div class="row" style="padding:0 15px;">
                                    <div class="col-md-10">
                                        <div class="form-group" style="margin-bottom:5px !important;">
                                            {!!$i==0 ? '<label for="exampleInputEmail1">Kode Temuan</label>' : ''!!}
                                            <select name="temuan[{{$i}}]" id="temuan" class="form-control text-left" style="text-align:left !important" data-plugin="select2" onchange="getdata()">  
                                                    <option value="">-- Kode Temuan --</option>
                                                    @foreach ($temuan as $item)
                                                        <option value="{{$item->id}}">{{$item->code}} - {{$item->temuan}}</option>
                                                    @endforeach
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-11">
                                        <div class="form-group" style="margin-top:0px !important;">
                                            <textarea class="form-control" name="uraian_temuan[{{$i}}]" style="margin-top:0px !important" placeholder="Uraian Singkat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="row" style="padding:0 15px;">
                                    <div class="col-md-10">
                                        <div class="form-group" style="margin-bottom:5px !important;">
                                            {!!$i==0 ? '<label for="exampleInputEmail1">Kode Penyebab</label>' : ''!!}
                                            <select name="sebab[{{$i}}]" id="sebab" class="form-control text-left" style="text-align:left !important" data-plugin="select2" onchange="getdata()">  
                                                    <option value="">-- Kode Penyebab--</option>
                                                    @foreach ($sebab as $item)
                                                        <option value="{{$item->id}}">{{$item->code}} - {{$item->sebab}}</option>
                                                    @endforeach
                                            </select>
                                        </div> 
                                    </div> 
                                    <div class="col-md-11">
                                        <div class="form-group" style="margin-top:0px !important;">
                                            <textarea class="form-control" name="uraian_sebab[{{$i}}]" style="margin-top:0px !important" placeholder="Uraian Singkat"></textarea>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="row" style="padding:0 15px;">
                                    <div class="col-md-10">
                                        <div class="form-group" style="margin-bottom:5px !important;">
                                            {!!$i==0 ? '<label for="exampleInputEmail1">Kode Rekomendasi</label>' : ''!!}
                                            <select name="rekomendasi[{{$i}}]" id="rekomendasi" class="form-control text-left" style="text-align:left !important" data-plugin="select2" onchange="getdata()">  
                                                    <option value="">-- Kode Rekomendasi --</option>
                                                    @foreach ($rekomendasi as $item)
                                                        <option value="{{$item->id}}">{{$item->code}} - {{$item->rekomendasi}}</option>
                                                    @endforeach
                                            </select>
                                        </div> 
                                    </div> 
                                    <div class="col-md-11">
                                        <div class="form-group" style="margin-top:0px !important;">
                                            <textarea class="form-control" name="uraian_rekomendasi[{{$i}}]" style="margin-top:0px !important" placeholder="Uraian Singkat"></textarea>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <hr class="widget-separator" style="margin:10px 0;">
                    @endfor
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-success pull-right">
                                <i class="fa fa-save"></i> Simpan Daftar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footscript')
<script>
    $(document).ready(function(){
        
    });
</script>
@endsection
<style>
form,.control-label,input,select,textarea,label
{
    font-size:11px !important;
}
</style>