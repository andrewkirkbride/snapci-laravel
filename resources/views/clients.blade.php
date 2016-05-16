<!-- resources/views/clients.blade.php -->

@extends('layouts.app')

@section('content')

        <!-- Bootstrap Boilerplate... -->

<div class="panel-body">

    <!-- Display Vali   dation Errors -->
    @include('common.errors')

            <!-- New Task Form -->
    <form action="{{ url('client') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

                <!-- Task Name -->
        <div class="form-group">

            <div class="row">

                <label form="client" class="col-sm-3 control-label">First Name</label>

                <div class="col-xs-6">
                    <input type="text" name="first_name" id="name" class="form-control">
                </div>

            </div>

            <div class="row">

                <label form="client" class="col-sm-3 control-label">Last Name</label>

                <div class="col-xs-6">
                    <input type="text" name="last_name" id="name" class="form-control">
                </div>

            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Client
                </button>
            </div>
        </div>
    </form>

    <!-- Current Clients -->
    @if (count($clients) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Clients
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Client</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <!-- Client Name -->
                            <td class="table-text">
                                <div>{{ $client->first_name }} {{ $client->last_name }}</div>
                            </td>

                            <td>
                                <form action="{{ url('client/'.$client->id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>

<!-- TODO: Current Tasks -->
@endsection