<template>
    <div>
        <div class="row gx-lg-5" style="margin-bottom: 220px;">
            <div class="col-md-6 col-xxl-6 mb-5" style="height: 673px; width:450px;">
                <example-component v-on:reloadGradovi="getGradove()"></example-component>
            </div>
            <div class="col-md-6 col-xxl-6 mb-5" style="height: 673px; width:450px;">
                <gradovi-component :items="items" v-on:reloadGradovi="getGradove()"></gradovi-component>
            </div>
        </div>
    </div>
    
</template>


<script>
import ExampleComponent from "./ExampleComponent.vue"
import GradoviComponent from "./GradoviComponent.vue"

export default {
    components: {
        ExampleComponent,
        GradoviComponent
    },
    data: function() {
        return {
            items: [],
            vreme: ""
            // count: 0
        }
    },
    methods: {
        getGradove() {
            axios.get('/getGradovi')
            .then(response => {
                this.items = response.data.gradovi;
                // this.count = response.data.count;
                // console.log(this.items);
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getGradove();
    }
}
</script>
