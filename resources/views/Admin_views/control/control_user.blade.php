@extends('Admin_views.admin_app')
@section('content')
    <div class="text-center my-3">
        <form action="{{route('admin.user')}}" method="get">
            @csrf
            @method('get')
            <div class="col-6 d-inline-flex">
                <input type="text" name="id" class="form-control my-2 " placeholder="{{__("ادخل رقم المستخدم")}}">
            </div>
            <button type="submit" class="btn btn-outline-light d-inline">search!</button>

        </form>
    </div>
    <div class="row justify-content-center">
            @include('_helper.admin._table_of_user')
    </div>
@endsection
