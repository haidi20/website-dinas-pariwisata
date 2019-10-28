<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title">Kategori post</h2>
			</div>
			<div class="modal-body">
				<p class="text-center modal-loading">
                    @fa('spin fa-spinner fa-2x')
                </p>
				<table class="table table-striped" id="table-category">
					<thead>
						<tr>
							<th>#id</th>
							<th>Nama Kategori</th>
							<th width="100">Jumlah Post</th>
							<th width="150" style="text-align: right;">
								<!-- <a href="javascript:void(0)" onclick="addCategory()" class="btn btn-info btn-xs btn-label"><i class="fa fa-plus"></i>Tambah Kategori</a> -->
								<button onclick="addCategory()" class="btn btn-info btn-xs">@fa('plus') Tambah Kategori</button>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td class="text-center"></td>
							<td style="text-align: right;">
								<!-- <a href="#" class="btn btn-success btn-xs btn-label"><i class="fa fa-pencil"></i>Edit</a>
								<a href="#" class="btn btn-danger btn-xs btn-label"><i class="fa fa-trash-o"></i>Trash</a> -->
							</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="form-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title">Edit Kategori Post</h2>
			</div>
			<div class="modal-body">
				<p class="text-center modal-loading">
                    @fa('spin fa-refresh fa-2x')
                </p>

				{!! Form::open(['url' => url($moduleUrl, ['category', 'save'])]) !!}
                    {!! Form::hidden('id') !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nama Kategori', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control form-control']) !!}
                    </div>
                {!! Form::close() !!}

			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-save"><i class="fa fa-spinner fa-spin" style="display:none;"></i> Save changes</button>
            </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->