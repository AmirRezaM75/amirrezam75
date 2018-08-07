@if(session()->has('message'))
    <div class="alert alert-{{Session::get('message_level')}} RTL_direction">
        {{session()->get('message')}}
    </div>
@endif