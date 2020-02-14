@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.transaksi.actions.edit', ['name' => $transaksi->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <transaksi-form
                :action="'{{ $transaksi->resource_url }}'"
                :data="{{ $transaksi->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.transaksi.actions.edit', ['name' => $transaksi->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.transaksi.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </transaksi-form>

        </div>
    
</div>

@endsection