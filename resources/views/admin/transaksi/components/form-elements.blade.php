<div class="form-group row align-items-center" :class="{'has-danger': errors.has('kode_transaksi'), 'has-success': fields.kode_transaksi && fields.kode_transaksi.valid }">
    <label for="kode_transaksi" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.transaksi.columns.kode_transaksi') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.kode_transaksi" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('kode_transaksi'), 'form-control-success': fields.kode_transaksi && fields.kode_transaksi.valid}" id="kode_transaksi" name="kode_transaksi" placeholder="{{ trans('admin.transaksi.columns.kode_transaksi') }}">
        <div v-if="errors.has('kode_transaksi')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('kode_transaksi') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nis'), 'has-success': fields.nis && fields.nis.valid }">
    <label for="nis" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.transaksi.columns.nis') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nis" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nis'), 'form-control-success': fields.nis && fields.nis.valid}" id="nis" name="nis" placeholder="{{ trans('admin.transaksi.columns.nis') }}">
        <div v-if="errors.has('nis')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nis') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('jenis_tabungan'), 'has-success': fields.jenis_tabungan && fields.jenis_tabungan.valid }">
    <label for="jenis_tabungan" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.transaksi.columns.jenis_tabungan') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.jenis_tabungan" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('jenis_tabungan'), 'form-control-success': fields.jenis_tabungan && fields.jenis_tabungan.valid}" id="jenis_tabungan" name="jenis_tabungan" placeholder="{{ trans('admin.transaksi.columns.jenis_tabungan') }}">
        <div v-if="errors.has('jenis_tabungan')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('jenis_tabungan') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('jenis_transaksi'), 'has-success': fields.jenis_transaksi && fields.jenis_transaksi.valid }">
    <label for="jenis_transaksi" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.transaksi.columns.jenis_transaksi') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.jenis_transaksi" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('jenis_transaksi'), 'form-control-success': fields.jenis_transaksi && fields.jenis_transaksi.valid}" id="jenis_transaksi" name="jenis_transaksi" placeholder="{{ trans('admin.transaksi.columns.jenis_transaksi') }}">
        <div v-if="errors.has('jenis_transaksi')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('jenis_transaksi') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nominal'), 'has-success': fields.nominal && fields.nominal.valid }">
    <label for="nominal" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.transaksi.columns.nominal') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nominal" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nominal'), 'form-control-success': fields.nominal && fields.nominal.valid}" id="nominal" name="nominal" placeholder="{{ trans('admin.transaksi.columns.nominal') }}">
        <div v-if="errors.has('nominal')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nominal') }}</div>
    </div>
</div>


