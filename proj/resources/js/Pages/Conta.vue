<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Contas
            </h2>
        </template>

        <div class="m-5 w-5/6 flow-root">
            <button id="show-modal" @click="addDialog = !addDialog; clearForm()" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full float-right">Inserir +</button>
        </div>

        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-800">
            <tr class="text-left border-b-2 border-gray-300 text-gray-200">
                <th class="px-4 py-3">Razão Social</th>
                <th class="px-4 py-3">Data Pagemento</th>
                <th class="px-4 py-3">Valor Recorrente</th>
                <th class="px-4 py-3">Expire Date</th>

                <th class="px-4 py-3">Ações</th>

            </tr>

            <tr class="bg-gray-100 border-b border-gray-200 hover:bg-gray-300 text-gray-800" id="tablerow" v-for="row in data" @dblclick="openRow(row)">
                <td class="px-4 py-3">{{ row['razao_social'] }}</td>
                <td class="px-4 py-3">{{ row['dt_pagamento']}}</td>
                <td class="px-4 py-3">{{ row['vlr_recorrente']}}</td>
                <td class="px-4 py-3">{{ row['expire_date']}}</td>


                <button @click="openRow(row)">
                    <img src="../../../public/img/edit2.png" height="30" width="30"/></button>
                <span> / </span>
                <button @click="deleteRow(row)">
                 <img src="../../../public/img/delete.png" height="30" width="30"/>
                </button>

            </tr>

            <!--            DIALOG DE ADICIONAR -->
            <div v-if="addDialog || editDialog" id="form" class="fixed overflow-x-hidden auto overflow-y-auto inset-0 flex justify-center items-center z-50">

                <div class="relative mx-auto w-auto max-w-2xl">
                    <div id="form-body" class="bg-white w-auto pa-10">
                        <h5 v-show="addDialog"><b>Adicionar um novo:</b></h5>
                        <h5 v-show="editDialog"><b>Editar um item:</b></h5>

                    <div class="form-field">
                        <label>Razão Social: </label>
                        <input type="text" v-model="form.razao_social">
                    </div>

                    <div class="form-field">
                        <label>Data Pagamento: </label>
                        <input type="text" v-model="form.dt_pagamento">
                    </div>

                    <div class="form-field">
                        <label>Valor Recorrente: </label>
                        <input type="text" class="form-control" v-model="form.vlr_recorrente">
                    </div>

                    <div class="form-field">
                        <label>Expire Date: </label>
                        <input type="date" class="form-control" v-model="form.expire_date">
                    </div>

                    <div class="form-field">
                        <label>Limite de Logins: </label>
                        <input type="text" class="form-control" v-model="form.limit_logins">
                    </div>

                        <div class="form-footer">

                            <button v-show="addDialog" @click="save(form)" class="bg-green-500 text-white font-bond rounded-full">Adicionar</button>
                            <button v-show="addDialog" @click="addDialog =!addDialog" class="bg-red-500 text-white font-bold rounded-full">Fechar</button>

                            <button v-show="editDialog" @click="editRow(form)" class="bg-green-500 text-white font-bond rounded-full">Editar</button>
                            <button v-show="editDialog" @click="editDialog =!editDialog" class="bg-red-500 text-white font-bold rounded-full">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>
            <div  v-if="addDialog || editDialog" class="absolute z-40 inset-0 opacity-25 bg-black"></div>
            <!--        FIM DO ADD DIALOG-->

        </table>
    </app-layout>

    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center
        item-center">
        <div bg-gray-200>
            Adicionar item

        </div>
    </div>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    name: "Conta",
    props: ['data'],

    data: function() {
        return {
            addDialog: false,
            editDialog: false,
            idRow: null,
            form: {
                id: null,
                razao_social: null,
                dt_pagamento: null,
                vlr_recorrente: null,
                expire_date: null,
                limit_logins: null
            }
        }
    },
    methods:{
        save(data){
            this.$inertia.post('/conta', data)
            this.addDialog = false
        },
        deleteRow (data){
            if (!confirm("Deletar o registro Nº " + data.id + "?")) return;
            data._method = 'DELETE';
            this.$inertia.post('/conta/' + data.id, data)
        },
        openRow(row){
            this.editDialog= true
            this.idRow = row['id']
            this.form.razao_social = row['razao_social'];
            this.form.dt_pagamento = row['dt_pagamento'];
            this.form.vlr_recorrente = row['vlr_recorrente'];
            this.form.expire_date = row['expire_date'];
            this.form.limit_logins = row['limit_logins'];

        },
        editRow(data){
            data['id'] = this.idRow
            data._method = "PATCH"
            this.$inertia.patch('/conta/'+ this.idRow, data);
            this.editDialog = false
        },

        clearForm(){
            this.form.razao_social = null,
            this.form.dt_pagamento = null,
            this.form.vlr_recorrente = null,
            this.form.expire_date = null,
            this.form.limit_logins = null
        }

    },

    components: {
        AppLayout,


    },


}
</script>

<style scoped>
.container{
    padding: 50px;
}
#form-body{
   border: solid 2.5px;
}
#form input {
    /*display: block;*/
    width: 260px;
    height: 30px;
    padding-left: 10px;
    padding-top: 3px;
    padding-bottom: 3px;
    margin: 7px;
    font-size: 17px;
    border-radius: 20px;
    background: rgba(0, 0, 0, 0.05);
    border-style: solid;
}
#form button {
    float: right;
}
.form-footer{
    display: flow-root;
}

button {
    padding: 5px;
}
.form-field{
    padding: 20px;

}



</style>

