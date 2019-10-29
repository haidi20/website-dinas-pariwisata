@extends('sitemanager._layout.default')

@section('script-top')
{!! Html::style('avenger/assets/plugins/sweet-alert/sweet-alert.css') !!}
@endsection

@section('script-bottom')
	<script>
        $(function(){
            //statement
            let select2 = $('#select2').val();
            let select2Text = $('#select2 option:selected').text();

            $('#btn-left').on('click', () => {
                let left = $('#select-left').val();
                let leftText = $('#select-left option:selected').text();
                let length = $('#select-right > option').length;
                if(left !== null && length < 5){
                    $("#select-left option:selected").remove();
                    $('#select-right').append(`<option value="${left}">${leftText}</option>`);
                }
            })

            $('#btn-right').on('click', () => {
                let right = $('#select-right').val();
                let rightText = $('#select-right option:selected').text();
                if(right !== null){
                    $("#select-right option:selected").remove();
                    $('#select-left').append(`<option value="${right}">${rightText}</option>`);
                }
            })
        });
    </script>
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
    
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>Breaking News</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        {{-- <a href="{{ url($moduleUrl, ['create']) }}" class="btn btn-primary">{!!fa('plus')!!} Tambah</a> --}}
			    </div>
			</div>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">

                    <h1>breaking news</h1>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2" style="text-align:center;">
                            <select class="form-control" id="select-left" multiple="">
                                <option value="left-1">Lorem ipsum dolor.</option>
                                <option value="left-2">Amet, impedit aperiam?</option>
                                <option value="left-3">Nemo, alias, quasi?</option>
                                <option value="left-4">Inventore, expedita.</option>
                            </select>
                            <button id="btn-left" class="fa fa-arrow-circle-o-right fa-3x" aria-hidden="true" style="margin-top:10px; border:none; background:none;"></button>
                        </div>
                        <div class="col-sm-4" style="text-align:center;">
                            <select class="form-control" id="select-right" multiple="">
                                <option value="right-1">Lorem ipsum dolor.</option>
                                <option value="right-2">Amet, impedit aperiam?</option>
                                <option value="right-3">Nemo, alias, quasi?</option>
                                <option value="right-4">Inventore, expedita.</option>
                            </select>
                            <button id="btn-right" class="fa fa-arrow-circle-o-left fa-3x" aria-hidden="true" style="margin-top:10px; border:none; background:none;"></button>
                        </div>
                    </div>

				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection