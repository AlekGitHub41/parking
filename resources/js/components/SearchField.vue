<template>
    <div class="container">
        <div class="row" style="padding-left: 18%;">
            <div class="col-8">
                <VueMultiselect
                    v-model="value" :options="options" :searchable="true" :close-on-select="true"
                    :clear-on-select="false"
                    :show-labels="false"
                    placeholder="Все клиенты"
                />
                <input type="hidden" name="choices_client" :value="value">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary" style="width: 100px; height: 42px">Найти</button>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-danger" style="width: 130px; height: 42px">Все клиенты</button>
            </div>
        </div>
    </div>
</template>

<script>
import VueMultiselect from 'vue-multiselect'

export default {
    props: ['get_clients'],
    components: {VueMultiselect},
    mounted() {
        for (const argument of this.get_clients) {
            this.options.push(argument.FCS)
        }
    },
    data() {
        return {
            value: '',
            options: []
        }
    },
    methods:{
        change(){
            console.log("work")
        }
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css">
</style>
