@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Holiday type</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('holiday_types.create') }}"> Create New Holiday Type</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($holiday_types as $holiday_type)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $holiday_type-> holiday_type_name }}</td>

                <td>
                    <form action="{{ route('holiday_types.destroy',$holiday_type->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('holiday_types.show',$holiday_type->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('holiday_types.edit',$holiday_type->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $holiday_types->links() !!}

@endsection
