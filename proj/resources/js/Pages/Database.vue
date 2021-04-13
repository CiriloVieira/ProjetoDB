<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Databases
            </h2>
        </template>

        <div class="m-5 w-5/6 flow-root">
            <button id="show-modal" @click="addDialog = !addDialog; clearForm()" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full float-right">Inserir +</button>
        </div>

        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Caminho DB</th>
                <th class="px-4 py-3">Nome do Database</th>
                <th class="px-4 py-3">Usuario do Database</th>
                <th class="px-4 py-3">Ultima Revisão</th>

                <th class="px-4 py-3">Ações</th>

            </tr>

            <tr class="bg-gray-100 border-b border-gray-200" v-for="row in data">
                <td class="px-4 py-3">{{ row['path_name'] }}</td>
                <td class="px-4 py-3">{{ row['db_name']}}</td>
                <td class="px-4 py-3">{{ row['pass_db']}}</td>
                <td class="px-4 py-3">{{ row['user_db']}}</td>

                <div class="">
                <button @click="openRow(row)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full">Edit</button>
                <span> / </span>
                <button @click="deleteRow(row)" class="bg-red-500 hover:bg-red-700 text-white font-bold rounded-full">Delete</button>
                </div>
            </tr>

            <!--            DIALOG DE ADICIONAR -->
            <div v-if="addDialog || editDialog" id="form" class="fixed overflow-x-hidden auto overflow-y-auto inset-0 flex justify-center items-center z-50">

                <div class="relative mx-auto w-auto max-w-2xl">
                    <div id="form-body" class="bg-white w-auto pa-10">
                        <h5 v-show="addDialog"><b>Adicionar um novo:</b></h5>
                        <h5 v-show="editDialog"><b>Editar um item:</b></h5>

                        <div class="form-field">
                            <label>Caminho do DB: </label>
                            <input type="text" v-model="form.path_name">
                        </div>

                        <div class="form-field">
                            <label>Nome do DB: </label>
                            <input type="text" v-model="form.db_name">
                        </div>

                        <div class="form-field">
                            <label>Usuário DB: </label>
                            <input type="text" class="form-control" v-model="form.user_db">
                        </div>

                        <div class="form-field">
                            <label>Senha DB: </label>
                            <input type="text" class="form-control" v-model="form.pass_db">
                        </div>

                        <div class="form-field">
                        <label >Conta Pertecente: </label>
                        <select v-model="form.client_id">
                            <option disabled>Escolha um Cliente</option>
                            <option v-for="client in clients" class="form-control" v-bind:value="client.id">
                                {{client['razao_social']}}
                            </option>
                        </select>
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
    name: "Database",
    props: ['data', 'clients'],

    data: function() {
        return {
            addDialog: false,
            editDialog: false,
            idRow: null,
            form: {
                id: null,
                path_name: null,
                db_name: null,
                pass_db: null,
                user_db: null,
                client_id: null

            },
        }
    },
    methods:{
        save(data){
            this.$inertia.post('/database', data)
            this.addDialog = false
        },

        deleteRow (data){
            if (!confirm("Deletar o registro Nº " + data.id + "?")) return;
            data._method = 'DELETE';
            this.$inertia.post('/database/' + data.id, data)
        },
        openRow(row){
            this.editDialog= true
            this.idRow = row['id']
            this.form.path_name = row['path_name'];
            this.form.db_name = row['db_name'];
            this.form.pass_db = row['pass_db'];
            this.form.user_db = row['user_db'];
            this.form.client_id = row['client_id'];

        },
        editRow(data){
            data['id'] = this.idRow
            data._method = "PATCH"
            this.$inertia.patch('/database/'+ this.idRow, data);
            this.editDialog = false
        },

        clearForm(){
                this.form.path_name = null,
                this.form.db_name = null,
                this.form.pass_db = null,
                this.form.user_db = null,
                this.form.client_id = null
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


