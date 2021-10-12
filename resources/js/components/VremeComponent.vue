<template>
    <div id="app" >
       <p v-for="(item,index) in items" :key="index" style="color: #FFF;font-size: 32px;text-shadow: 3px 6px rgba(0, 0, 0, 0.25);border-radius: 16px;">
           Vreme prijema maila je: {{ item.vreme }}
       </p>
        <form @submit.prevent="IzmeniVreme()" method="post">
        <div class="row">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <select name="timeSelect" v-model="selected" style="background: rgba(230, 235, 250, 0.7); border-radius:5px; border-width:0.5px;">
                                    <option :key='n' v-for="n in 24" > {{ n - 1 + ":00" }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                                <button type="submit" class="btn btn-success">Save</button>
                        </div>
        </div>
        </form>
    </div>
</template>


<script>
 export default {
    components: {
        // ExampleComponent,
        // GradoviComponent
    },
    data: function() {
        return {
            items: [],
            selected: ""
        }
    },
    methods: {
        getVreme() {
            axios.get('/getVreme')
            .then(response => {
                this.items = response.data.user;
            })
            .catch(error => {
                console.log(error);
            })
        },
        IzmeniVreme(){
                axios.post('/izmeniVreme',{
                    novoVreme: this.selected,    
                }).then(function(response){
                    console.log(response.data);
                }).catch(function(error){
                    console.log(error);
                });
                Vue.swal('Uspesno ste izmenili vreme!');
                this.getVreme();
                // this.$emit('reloadGradovi')
           }
    },
    created() {
        this.getVreme();
    }
}
</script>
