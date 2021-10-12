<template>
<div id="app">
    
                    <div class="card bg-light border-0 h-100" style="width:100%; border-radius: 30px; opacity:0.8">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0" style="height:830px; background: #5a5d61; border:3px solid #5a5d61; border-radius:30px">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                            <h2 class="title">Izabrani gradovi</h2>
                            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Grad</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="items.length > 0" >
                                <tr v-for="(item,index) in items" :key="index">
                                    <td>{{ item.grad }}</td>
                                    <td>
                                        
                                        <button type="button" class="btn btn-danger" @click="obrisiGrad(item.id)" style="border-radius:30px">Delete</button>
                                        
                                        
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">Nema gradova</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                   
                


                            
                            
                        
                    </div>
    </div>
    
</div>
    
</template>

<script>
export default {
    props:['items'],
    methods: {
        obrisiGrad(id){
            axios.delete('/deleteGrad/' + id, {
                items: this.items
            })
            .then(response => {
                if(response.status == 200) {
                    this.$emit('reloadGradovi');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style>
.title {
padding: 10px 25px;
     color: #FFF;
  font-size: 32px;
  /* font-weight: 900; */
  text-shadow: 3px 6px rgba(0, 0, 0, 0.25);
  background-color:rgba(255, 255, 255, 0.25);
  border-radius: 16px;
  margin: 30px 0px;
}

.table {
    color: #FFF;
  /* font-size: 102px; */
  /* font-weight: 900; */
  /* text-shadow: 3px 6px rgba(0, 0, 0, 0.25); */
    /* background-color:rgba(255, 255, 255, 0.25); */
    
}



</style>


