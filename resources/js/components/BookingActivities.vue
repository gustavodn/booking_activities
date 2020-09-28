<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-nav>
                <b-nav-form>
                    <label>Fecha:</label>
                    <b-form-input
                        v-model="date"
                        id="date"
                        type="date"
                        size="sm"
                        class="mr-sm-2">
                    </b-form-input>
                    <label>Nro de Personas:</label>
                    <b-form-input
                        v-model="n_persons"
                        type="number"
                        id="npersons"
                        size="sm"
                        class="mr-sm-2">
                    </b-form-input>
                    <b-button :disabled="!searchValidate" @click="searchActivity" size="sm" class="my-2 my-sm-0">Search</b-button>
                    <b-button @click="allActivities" size="sm" class="ml-2 my-2 my-sm-0">All Activities</b-button>
                </b-nav-form>
            </b-navbar-nav>
        </b-navbar>
        <div class="text-center m-3">
            <h3 v-text="title"></h3><br/>
        </div>
        <div>
            <b-table striped hover :items="filteredActivities" :fields="fields">
                <template v-if="customActivities" v-slot:cell(acciones)="row">
                    <b-button @click="bookActivity(row.item.id)" size="sm" variant="success" class="mr-1">
                        Comprar
                    </b-button>
                </template>
            </b-table>
        </div>
    </div>
</template>

<script>
import { BTable } from 'bootstrap-vue'
export default {
    name: 'bookingActivities',
    components:{
        BTable,
    },
    data() {
        return {
            customActivities: false,
            activities: [],
            fields: [
                {
                    key: 'id',
                    label: '#',
                },
                {
                    key: 'title',
                    label: 'Titulo',
                },
                {
                    key: 'price',
                    label: 'Precio por persona',
                },
                'Acciones',
            ],
            date: '',
            n_persons: 0,
            foundActivities: [],
            title: 'Buscador de Actividades',
        }
    },
    created() {
        this.title = 'Ingrese una fecha y la cantidad de personas para buscar una actividad'
    },
    methods: {
        updateShowingPrice() {
            this.activities.forEach((value, index) => {
                this.activities[index].price = this.activities[index].price * this.n_persons;
            })
        },
        showMessage(response) {
            if (response.status === 200) {
                this.$bvToast.toast('Su actividad fue reservada exitosamente', {
                    title: 'Registro Guardado!!',
                    variant: 'success',
                })
            }
        },
        updateInfo(data) {
            this.activities = data;
            this.updateShowingPrice();
            if (data.length >0){
                this.title = 'Actividades Encontradas!';
                this.fields[2].label = 'Precio de reserva ' +'('+ this.n_persons +')';
                this.customActivities = true;
            }else{
                this.title = 'No hay actividades para mostrar, porfavor intente otra fecha';
            }
        },
        allActivities(){
            this.axios
                .get('api/activities')
                .then(response => {
                    this.activities = response.data;
                    this.title = 'Todas las actividades.';
                    this.fields[2].label = 'Precio por persona';
                    this.n_persons = 0;
                    this.customActivities = false;
                });
        },
        bookActivity(activity_id) {
            let params = {n_persons: this.n_persons, activity_id: activity_id, date:this.date}
            this.axios
                .post('/api/activity/book',{params})
                .then(response => (
                    this.showMessage(response)
                ))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        },
        searchActivity() {
            let params = { n_persons: this.n_persons, date: this.date }
            this.axios
                .get('/api/activity/find/', {params})
                .then(response => (
                    this.updateInfo(response.data)
                ))
                .catch(error => console.log(error))
                .finally(() => console.log('OK'))
        }
    },
    computed: {
        filteredActivities() {
            return this.activities
        },
        searchValidate() {
            return this.date !== '' && this.n_persons > 0;
        }
    }
}
</script>
