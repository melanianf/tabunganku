import AppForm from '../app-components/Form/AppForm';

Vue.component('transaksi-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                kode_transaksi:  '' ,
                nis:  '' ,
                jenis_tabungan:  '' ,
                jenis_transaksi:  '' ,
                nominal:  '' ,
                
            }
        }
    }

});