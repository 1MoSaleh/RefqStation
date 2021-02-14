@extends('Admin_views.admin_app')
@section('content')

    @if($layout == 'User')
        <div>
        <form action="{{route('admin.user')}}" method="get">
            @csrf
            @method('get')

            <input type="text" name="id" class="form-control my-2" placeholder="{{__("ادخل رقم المستخدم")}}">
            <button type="submit" class="btn btn-outline-light btn-block">search!</button>
        </form>
        </div>
    @endif
    <div class="row justify-content-center">
        @if(isset($records))
        @include('_helper.admin._table_of_records')
        @else
            @include('_helper.admin._table_of_user')
        @endif
    </div>
@endsection
