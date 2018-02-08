<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>
                    
                    <div class="panel-body">
                        <div class="pull-left">
                            <router-link to="/add" tag="button" class="btn btn-sm btn-success">Tambah Data</router-link>
                        </div>
                        <div class="pull-right">
                            <input type="text" class="form-control" placeholder="Cari Berdasarkan NIM">
                        </div>
                       <table class="table">
                           <thead>
                               <tr>
                                   <th>NIM</th>
                                   <th>Nama</th>
                                   <th>Tempat Lahir</th>
                                   <th>Created date</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr v-for="item in items">
                                   <td>{{ item.nim }}</td>
                                   <td>{{ item.nama }}</td>
                                   <td>{{ item.tempat_lahir }}</td>
                                   <td>{{ item.created_at }}</td>
                                   <td>
                                       <button class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i>Edit</button>
                                       <button class="btn btn-xs btn-info"><i class="glyphicon glyphicon-trash-o"></i>Hapus</button>
                                   </td>
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
        data(){
            return {
                items:{}    
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.getDataMahasiswa()
        },
        methods:{
            getDataMahasiswa(){
                var vm = this
                axios.get('/data/mahasiswa')
                .then(function(respon){
                    vm.items = respon.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            }
        }

    }
</script>
