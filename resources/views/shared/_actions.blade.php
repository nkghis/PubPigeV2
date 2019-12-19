{{--@can('edit_users')--}}
    <a href="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class="btn btn-sm btn-info">
        <i class="material-icons">bubble_chart</i> Editer</a>
{{--@endcan--}}

{{--@can('delete_users')--}}
    {!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', [str_singular($entity) => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("êtes vous sure de supprimer?");']) !!}
    <button type="submit" class="btn-delete btn btn-sm btn-danger">
        <i class="material-icons">delete_forever</i> Supprimer
    </button>
    {!! Form::close() !!}
{{--@endcan--}}

