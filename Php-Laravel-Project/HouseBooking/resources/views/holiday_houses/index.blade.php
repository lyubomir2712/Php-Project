@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Holiday houses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('holiday_houses.create') }}"> Create New Holiday House</a>
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
            <th>№</th>
            <th>Name</th>
            <th>Location</th>
            <th>Rooms count</th>
            <th>Beds count</th>
            <th>House type</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($holiday_houses as $holiday_house)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $holiday_house->house_name }}</td>
                <td>{{ $holiday_house-> city -> city_name }}</td>
                <td>{{ $holiday_house->rooms_count }}</td>
                <td>{{ $holiday_house->beds_count }}</td>
                <td>{{ $holiday_house->holidayType -> holiday_type_name }}</td>
                <td><img src="/images/{{ $holiday_house->image }}" width="100px"></td>
                <td>
                    <form action="{{ route('holiday_houses.destroy',$holiday_house->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('holiday_houses.show',$holiday_house->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('holiday_houses.edit',$holiday_house->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $holiday_houses->links() !!}

@endsection
