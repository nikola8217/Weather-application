<template>
<div id="app" >
    <div class="card bg-light border-0 h-100" style="border-radius: 30px; opacity:0.8">
        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0" style="height:830px; background: #5a5d61; border:3px solid #5a5d61; border-radius:30px; ">
            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
            <h2 class="title">Svi gradovi</h2>
                
                <form @submit.prevent="dodajGrad()" method="post">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="form-group">
                                <label class="label1">Izaberite grad</label>
                                <select multiple="true"  class="select" v-model="item.selected_insert" @change="loadTemp()" >
                                    <option :key='city.id' v-for="city in options"  > {{ city.grad }} </option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="col-12 mb-2">
                           <div class="form-group"> 
                                <label class="label1">Temperatura</label>
                                   <h1 class="temp" v-if="info.data">{{ info.data.main.temp }}</h1>
                                </div>
                            </div>        
                            <div class="col-12 mb-5">
                                <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 30px;">Save</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    
</template>

<script>
    export default {

        mounted() {
            this.getCity(),
            axios.get('/getGradovi')
            .then(response => {
                this.br = response.data.count;
            })
            .catch(error => {
                console.log(error);
            })  
        },
       data: function() {
           return {
                item: {
                    selected_insert: [],
                    temp: ""
                },
                grad: "",
                options: [],
                info: [],
                render: 0,
                br: 0
                
           }
       },
       methods: {
           forceRerender() {
                this.render += 1;
            },
           dodajGrad(){
                let ukupno = this.item.selected_insert.length + this.br;
                var value = this.item.selected_insert;
                if(ukupno > 10){
                    Vue.swal('Odabrali ste vise od 10 gradova!!!');
                }
                else{
                    axios.post('/addGrad',{
                        gradFront: this.item.selected_insert,
                        tempp: this.item.temp    
                    }).then(function(response){
                        console.log(response.data);
                    }).catch(function(error){
                        console.log(error);
                    });
                    this.$emit('reloadGradovi')
                 }

           },
            loadTemp: function () {
                axios.get('https://cors-anywhere.herokuapp.com/api.openweathermap.org/data/2.5/weather?q='+this.item.selected_insert+'&units=metric&appid=283ffcd4756f546f71f2e37f52c59bd9')
                    .then((response) => {
                        this.info = response;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            getCity() {
                axios.get('/getCity')
                    .then(response => {
                        this.options = response.data.gradovi1;
                    })
                .catch(error => {
                    console.log(error);
                    })
            },
       }
    }
    
</script>

<style>
.label1 {
    display: inline-block;
  padding: 10px 25px;
  color: #FFF;
  /* font-size: 102px; */
  /* font-weight: 900; */
  text-shadow: 3px 6px rgba(0, 0, 0, 0.25);
  /* background-color:rgba(255, 255, 255, 0.25); */
  border-radius: 16px;
  margin: 30px 0px;
}

.temp {
    /* display: inline-block; */
  padding: 10px 25px;
  color: #FFF;
  font-size: 52px;
  /* font-weight: 900; */
  text-shadow: 3px 6px rgba(0, 0, 0, 0.25);
  background-color:rgba(255, 255, 255, 0.25);
  border-radius: 16px;
  margin: 30px 0px;
}

.select {
    color: #FFF;
  /* font-size: 102px; */
  /* font-weight: 900; */
  /* text-shadow: 3px 6px rgba(0, 0, 0, 0.25); */
  background-color:rgba(255, 255, 255, 0.25);
  width: 100%;
  border: 1px solid rgba(255, 255, 255, 0.25);
  height: 150px;
}

.title {
    padding: 10px 25px;
     color: #FFF;
  font-size: 32px;
  /* font-weight: 900; */
  text-shadow: 3px 6px rgba(0, 0, 0, 0.25);
  /* background-color:rgba(255, 255, 255, 0.25); */
  border-radius: 16px;
  margin: 30px 0px;
}
</style>


