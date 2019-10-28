@extends('sitemanager._layout.default')

@section('content')
<div class="static-content">
    <div class="page-content">
        
        @include('sitemanager._layout.heading')

        <div class="page-heading">            
            <h1>User Account</h1>
            <div class="options">
                <div class="btn-toolbar">
                    <a href="{{ url($moduleUrl, 'create') }}" class="btn btn-primary">@fa('plus') Add {{ $moduleTitle }}</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
        	<div class="row">
				<div class="col-md-12">
                    
                    {!! session()->get('message') !!}
                    
                    <div class="panel">
                        <div class="panel-body panel-no-padding table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th class="text-center" width="140">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($user as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->display_level }}</td>
                                        <td class="text-center">
                                            <a href="{{ url($moduleUrl, ['edit', $item->id]) }}" class="btn btn-success btn-xs btn-label">@fa('pencil')Edit</a>
                                            <a href="javascript:void(0)" data-url="{{ url($moduleUrl, ['delete', $item->id]) }}"  class="btn btn-danger btn-xs btn-label btn-delete">@fa('trash-o')Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="alert alert-info">
                                            <center>No records found.</center>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-right">
                        {!! $user->links() !!}
                    </div>
				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection