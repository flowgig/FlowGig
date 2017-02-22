<div>
    <i>
        <small>
            @if(isset($model->updater))
                Last updated {{ $model->updated_at }} by {{ $model->updater->name }}
            @else
                Created {{ $model->created_at }} by {{ $model->creator->name }}
            @endif
        </small>
    </i>
</div>
