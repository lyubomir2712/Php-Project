@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Holiday house</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('holiday_houses.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('holiday_houses.update',$holiday_house->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="house_name" value="{{ $holiday_house->house_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    <select name="location" class="info-input">
                        <option disabled selected>House Type</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ $holiday_house->id == $city->id ? 'selected' : '' }}>
                                {{ $city->city_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rooms count:</strong>
                    <input type="number" name="rooms_count" value="{{ $holiday_house->rooms_count }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Beds count:</strong>
                    <input type="number" name="beds_count" value="{{ $holiday_house->beds_count }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Holiday house type:</strong>
                    <select name="holiday_house_type" class="info-input">
                        <option disabled selected>House Type</option>
                        @foreach ($holiday_types as $holiday_type)
                            <option value="{{ $holiday_type->id }}" {{ $holiday_house->id == $holiday_type->id ? 'selected' : '' }}>
                                {{ $holiday_type->holiday_type_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control">
                    <img src="/images/{{ $holiday_house->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
