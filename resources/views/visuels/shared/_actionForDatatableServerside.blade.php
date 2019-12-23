<div class="dropdown">
    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        @can('edit_visuels')
        <a class="dropdown-item" href="{{ route('visuels.edit', [str_singular('visuels') => $id])  }}"><strong><i class="material-icons" style="color: blue">bubble_chart</i> Editer</strong></a>
        @endcan
        @can('delete_visuels')
            {!! Form::open( ['method' => 'delete', 'url' => route('visuels.destroy', [str_singular('visuels') => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("êtes vous sure de supprimer?");']) !!}
            <button type="submit" class="dropdown-item">
                <strong><i class="material-icons" style="color: red">delete_forever</i> Supprimer</strong>
            </button>
            {!! Form::close() !!}
        @endcan
        @can('view_visuels')
            <a class="dropdown-item" href="{{ route('maps.localisation', [str_singular('visuels') => $id])  }}"><strong><i class="material-icons" style="color: green">my_location</i> Localiser</strong></a>
        @endcan
    </div>
</div>