<div>
    <i>
        <small>
            @if(isset($model->updater))
                Updated by {{ $model->updater->name }} {{ $model->updated_at->diffForHumans() }}
            @elseif(isset($model->creator))
                Created by {{ $model->creator->name }} {{ $model->created_at->diffForHumans() }}
            @endif
        </small>
    </i>
</div>
