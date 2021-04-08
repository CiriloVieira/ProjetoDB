<template>
    <div class="text-center">
        <v-dialog max-width="700px">
            <template v-slot:activator="{ on }">
                <v-btn dark v-on="on" class="success">Novo Item</v-btn>

            </template>

            <v-card>
                <v-card-title>
                    <h4> Adicione novo Ncm </h4>

                </v-card-title>
                <v-spacer></v-spacer>
                <v-card-text>
                    <v-form
                        lazy-validation>
                        <!--    <v-form>-->
                        <v-text-field
                            :counter="10"
                            label="Codigo"
                            required
                        ></v-text-field>

                        <v-text-field

                            label="Description"
                            required
                        ></v-text-field>
                        <div class="row">

                            <v-btn
                                :disabled="!valid"
                                color="success"
                                class="mr-4"
                                @click="()=>{}"=
                            >
                                Validate
                            </v-btn>

                            <v-btn
                                color="error"
                                class="mr-4"
                                @click="()=>{}"
                            >
                                Reset Form
                            </v-btn>

                        </div>
                    </v-form>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    name: "AddConta"
}
</script>

<style scoped>

</style>
