<template>
    <label class="form-label" for="is_active">Стоянка</label>
    <div class="form-check">
        <label class="form-check-label" for="is_active">
            Находится/Отсутствует
        </label>
        <input class="form-check-input" type="checkbox" @click="change" :value="my_value" id="is_active"
               name="is_active" v-bind:checked="my_value">
    </div>
</template>

<script>
export default {
    props: {
        get_my_value: {
            type: Boolean,
            default: false,
        }
    },
    data() {
        return {
            my_value: this.check(this.get_my_value),
        }
    },
    methods: {
        change() {
            this.my_value = !this.my_value;
        },
        check(value) {
            return value === "1";
        }
    }
}
</script>
