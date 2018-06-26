@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body text-center" style="margin-top: 4em">

                    <h1>
                        <img src="data:image/jpeg;base64,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">
                    </h1>

                    <h3 class="modal-title">Welcome to Our Hospital!</h3>

                    @role('Admin')
                    <h4>Visit <a href="{{ route('roles.index') }}">roles</a> and give permissions for each roles.</h4>
                    @endrole

                    <p>&nbsp;<br>
                    <p>Assign different <code>roles</code> to users and login from different browsers <br>
                        to see <code>access control</code> and <code>authorization</code> at work.</p>
                </div>
            </div>
        </div>
    </div>
@endsection