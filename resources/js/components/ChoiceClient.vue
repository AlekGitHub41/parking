<template>
    <label class="form-label" for="choice-client">Выберите клиента</label>
    <select class="form-select form-select-lg mb-5 mt-3" id="choice-client" aria-label=".form-select-lg example" @change="choice">
        <option selected>ФИО Клиента</option>
        <option v-for="client in data" :value="client.id">{{ client.FCS }}</option>
    </select>
    <input type="hidden" name="client_id" :value="client_id">
</template>

<script>
export default {
    props: ["get_data"],
    data() {
        return {
            client_id: "",
            data: this.get_data
        }
    },
    methods: {
        choice(event) {
            this.client_id = event.target.value;
        }
    }
}
</script>
