<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Data</div>

                    <div class="panel-body">
                        <form class="form-horizontal" v-on:submit.prevent="storeMahasiswa" id="myform">
                            <div class="form-group" v-bind:class="{ 'has-error': errors.nim }">
                                <label class="control-label col-sm-2" for="nim">NIM:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nim" placeholder="Enter NIM" nim="nim" v-model='items.nim'>
                                    <span class="help-block" v-if="errors.nim"><strong>{{ errors.nim.join(", ") }}</strong></span>
                                </div>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': errors.nama }">
                                <label class="control-label col-sm-2" for="nama">Nama:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" placeholder="Enter Nama" name="nama" v-model='items.nama'>
                                    <span class="help-block" v-if="errors.nama"><strong>{{ errors.nama.join(", ") }}</strong></span>
                                </div>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': errors.tempat_lahir }">
                                <label class="control-label col-sm-2" for="tempat_lahir">Tempat Lahir:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" v-model='items.tempat_lahir'>
                                    <span class="help-block" v-if="errors.tempat_lahir"><strong>{{ errors.tempat_lahir.join(", ") }}</strong></span>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="Submit" class="btn btn-sm btn-success">Submit</button>
                                    <router-link to="/" tag="button" class="btn btn-sm btn-danger">Batal</router-link>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                items:{},
                errors:{}
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            storeMahasiswa(){
                var vm = this
                axios.post("/data/mahasiswa/store", this.items)
                .then(function(response){
                	console.log(response.status);
                	vm.$router.push({ path : '/'})
                })
                .catch(function(error){
                	vm.errors = error.response.data;
                })
            }
        }
    }
</script>
