<template>
    <VueMultiselect
        v-model="selected_client" :options="clients" :searchable="true" :close-on-select="true"
        :clear-on-select="false"
        :show-labels="false"
        placeholder="Все клиенты"
        @select="handleChange"
        class="mb-5"
    />
    <VueMultiselect
        v-model="selected_automobile" :options="automobiles" :searchable="true" :close-on-select="true"
        :clear-on-select="false"
        :show-labels="false"
        placeholder="Все клиенты"
        :custom-label="nameWithLang"
        class="mb-5"
    />
    <input type="hidden" name="selected_automobile" :value="selected_automobile.id">
    <center>
        <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px;">Найти</button>
    </center>
    <center>
        <button type="submit" class="btn btn-danger mt-4" style="width: 100%; height: 50px;">Все авто</button>
    </center>
</template>

<script>
import axios from 'axios';
import VueMultiselect from 'vue-multiselect'

export default {
    components: {VueMultiselect},
    data() {
        return {
            automobiles: [],
            clients: [],
            selected_automobile: {id: "", brand: "", model: ""}
        }
    },
    mounted() {
        axios.get('/api/client-all')
            .then(response => {
                let clients = response.data;
                for (const client of clients) {
                    this.clients.push(client.FCS)
                }
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        handleChange() {
            this.automobiles = []
            const encodedClient = encodeURIComponent(this.selected_client);
            axios.post('/api/clients-automobile/' + encodedClient)
                .then(response => {
                    let automobiles = response.data;
                    for (const automobile of automobiles) {
                        this.automobiles.push({id: automobile.id, brand: automobile.brand, model: automobile.model})
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        nameWithLang({brand, model}) {
            return `${brand} ${model}`
        }
    }
}
</script>
