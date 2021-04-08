<template>
    <head>
        <script type="text/x-template" id="modal-template">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-container">

                            <div class="modal-header">
                                <slot name="header">
                                    default header
                                </slot>
                            </div>

                            <div class="modal-body">
                                <slot name="body">
                                    default body
                                </slot>
                            </div>

                            <div class="modal-footer">
                                <slot name="footer">
                                    default footer
                                    <button class="modal-default-button" @click="$emit('close')">
                                        OK
                                    </button>
                                </slot>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </script>
    </head>

    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Contas

            </h2>
        </template>


        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
           <div class="m-5 w-5/6">
                <button id="show-modal" @click="showModal = true" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full">Inserir</button>
           </div>

            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Razão Social</th>
                <th class="px-4 py-3">Data Pagemento</th>
                <th class="px-4 py-3">Valor Recorrente</th>
                <th class="px-4 py-3">Expire Date</th>

                <th class="px-4 py-3">Ações</th>

            </tr>

            <tr class="bg-gray-100 border-b border-gray-200" v-for="row in data">
                <td class="px-4 py-3">{{ row['razao_social'] }}</td>
                <td class="px-4 py-3">{{ row['dt_pagamento']}}</td>
                <td class="px-4 py-3">{{ row['vlr_recorrente']}}</td>
                <td class="px-4 py-3">{{ row['expire_date']}}</td>

                <button @click="openEditDialog" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full">Edit</button>
                <span> / </span>
                <button @click="()=>{}" class="bg-red-500 hover:bg-red-700 text-white font-bold rounded-full">Delete</button>

            </tr>

        </table>

<!--        <div class="modal fade" id="modal">-->
<!--            <div class="modal-dialog">-->
<!--                <div class="modal-header">-->
<!--                    <h4>Nova Conta</h4>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label>Name</label>-->
<!--                    <input class="form-control">-->

<!--                    <label>WTV</label>-->
<!--                    <input class="form-control">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


    </app-layout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import AddConta from "@/Pages/Dialogs/AddConta";

export default {
    name: "Conta",
    props: ['data'],

    data: () =>({
        addDialog: false,
        editDialog: false,
        deleteDialog: false

    }),
    methods:{
        openAddDialog(){
            this.addDialog = true
        },
        openEditDialog() {
            this.editDialog = true
        },
        openDeleteDialog() {
            this.deleteDialog = true
        }
    },

    components: {
        AppLayout,
        AddConta

    },


}
</script>

<style scoped>
.container{
    padding: 50px;
}
button {
    padding: 5px;
}


</style>

