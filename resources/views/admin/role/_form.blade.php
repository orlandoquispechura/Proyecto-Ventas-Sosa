{{-- <h3>Permisos especiales</h3>
<div class="form-group">
    <label>{!! Form::radio('special', 'all-access') !!} Acceso total</label>
    <label>{!! Form::radio('special', 'no-access') !!} Ningún acceso</label>
</div> --}}

<h3>Lista de permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
            <li>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
               {{$permission->description}} <em>({{$permission->name}})</em>
            </label>
        </li>
        @endforeach
    </ul>
</div>
