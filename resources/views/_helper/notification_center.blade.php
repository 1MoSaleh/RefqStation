<div class="dropdown">
    <a id="notificationDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fas fa-bell mainColor"></i>
    </a>

    <div class="notification-center dropdown-menu" aria-labelledby="notificationDropdown">
        @if($errors->any())
            <ul class="alert alert-warning list-group text-center">
                @foreach($errors->all() as $error)
                    <li>{{__("$error")}}</li>
                @endforeach
            </ul>
        @endif
        @if(Session::has('temp_message'))
            <div class="alert alert-info text-center">
                <h5>{{Session::pull('temp_message')}}</h5>
            </div>
        @endif
        @if(Session::has('message'))
            <div class="alert {{Session::pull('alert-class' ,  'alert-info') }} text-center">
                <h5>{{Session::pull('message')}}</h5>
            </div>
        @endif
    </div>
</div>
