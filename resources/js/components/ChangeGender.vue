<template>
    <label class="form-label" for="Gender">Пол</label>
    <div class="dropdown">
        <span class="btn btn-secondary dropdown-toggle" role="button" id="Gender"
              data-bs-toggle="dropdown" aria-expanded="false">
            {{ value_main }}
        </span>
        <ul class="dropdown-menu" aria-labelledby="Gender">
            <li><span @click="change" class="dropdown-item" style="cursor: pointer;">{{ value_drop }}</span></li>
        </ul>
        <input type="hidden" id="genderInput" name="gender" :value="value_main">
    </div>
</template>

<script>
export default {
    props: {
        get_value_main: {
            default: 'Мужчина'
        }
    },
    data() {
        return {
            value_main: this.get_value_main,
            value_drop: this.check(this.get_value_main),
        }
    },
    methods: {
        change() {
            let intermediate_variable = this.value_main;
            this.value_main = this.value_drop;
            this.value_drop = intermediate_variable;
        },
        check(value) {
            if (value == "Мужчина") {
                return "Женщина"
            }
            return "Мужчина"
        }
    }
}
</script>
