<template>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-teal">
                        <h3 class="card-title"><i class="fas fa-users"></i>  Entrenadores</h3>
                        <button type="button" @click="abrirModal('entrenador', 'registrar')" class="btn btn-default float-right p-1" style="width: 150px;"><i class="fas fa-plus"></i>  Agregar</button>

                        <div class="input-group input-group-sm float-right mr-4" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>                  
                            <tr>
                            
                                <th>Nombre</th>
                                <th>Foto</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                        
                                <tr v-for="entrenador in arrayEntrenador" :key="entrenador.id">
                                    <td v-text="entrenador.nombre"></td>
                                    <td v-text="entrenador.foto"></td>
                                
                                    <td>
                                        <button @click="abrirModal('entrenador', 'actualizar', entrenador)" class="btn btn-warning btn-xs" href="">Editar</button>
                                        <a class="btn btn-danger btn-xs" href="">Eliminar</a>
                                    </td>
                                </tr>
                        
                            </tbody>
                        </table>
                
                    </div>

                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                       </ul>
                    </div>
                    
                </div>
            </div>
            
        </div>
        </div>

        <!--Inicio del modal agregar/actualizar-->
           <div class="modal fade" id="modal-lg" :class="{'mostrar': modal}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-teal">
                        <h4 class="modal-title" v-text="tituloModal"></h4>
                        <button @click="cerrarModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <form class="form-group form-horizontal"  @submit.prevent="registrarEntrenador" enctype="multipart/form-data">
                                     
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                <input v-model="nombre" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label for="">Foto</label>
                                                <input v-model="foto" type="text" placeholder="Ingresa la url de una imagen" class="form-control">
                                            
                                            </div>
                                        </div>

                                        <!-- <div class="for-group">
                                            <figure>
                                                <img  width="180px" :src="imagen" height="180px" alt="Foto del entrenador">
                                            </figure>
                                        </div> -->

                                        <div class="modal-footer bg-default justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button v-if="tipoAccion == 1" @click="registrarEntrenador()" type="submit" class="btn btn-info">Guardar</button>
                                            <button v-if="tipoAccion == 2" type="submit" class="btn btn-info">Actualizar</button>
                                        </div>

                                    </form>
                                   
                                </div>

                            </div>
                        </div>
                        
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <!-- /.modal -->
    
    </section>
    
</template>

<script>
    
    export default {
        data (){
            return{
                
                nombre: "",
                foto: "",
                arrayEntrenador: [],
                modal: 0,
                tituloModal: "",
                tipoAccion: 0,
                imagenMiniatura: ""
               
            }
        },
        methods:{ 

            listarEntrenadores(){

               let me=this;
               let url = 'http://crudlaravel6.6.test:8080/admin/entrenadores/';
                axios.get(url).then(function (response){

                    me.arrayEntrenador = response.data;
                    
                })
                .catch(function(error){
                    console.log(error);

                });
            },
            // obtenerImagen(e){
            //     //asignamos la imagen a nuestra data
            //     let file = e.target.files[0];
            //     // console.log(file);
            //     this.foto = file;
            //     this.cargarImagen(file);

            // },
            // cargarImagen(file){
            //     let reader = new FileReader();
            //     reader.onload = (e) => {
            //         this.imagenMiniatura = e.target.result;
            //     }
            //     reader.readAsDataURL(file);
            // },
            // updateAvatar(){
            //     //creamos el formdata
            //     let data = new FormData();
            //     // añadimos la imagen seleccionada
            //     data.append('avatar', this.imagen);
            //     // añadimos el metodo PUT dentro del form data
            //     // como lo haciamos con un formulario simple(No ajax)
            //     data.append('_method', 'PUT');
            //     //Enviamos la Peticion
            //     axios.post('http://localhost:8080/admin/entrenadores/guardar', data)
            //     .then(response => {

            //     })

            // },
            registrarEntrenador(){
                let en=this;
                // let url='';
                
                // let formData = new FormData();
                // formData.append('nombre', me.nombre);
                // formData.append('foto', me.foto);


                axios.post('http://crudlaravel6.6.test:8080/admin/entrenadores/agregar', {

                    'nombre': this.nombre,
                    'foto': this.foto

                }).then(function(response){
                    en.listarEntrenadores();
                    en.clearFields();
                    // console.log(response.data);
                })
                .catch(function(error){
                    console.log(error)

                });
                
            },
            cerrarModal(){
                this.modal = 0;
                this.tituloModal = "";
                this.nombre = "";
                this.foto = "";

            },

            abrirModal(modelo, accion, data = []){

                if(modelo == "entrenador") {
                    if(accion == 'registrar') {
                        
                        this.modal = 1;
                        this.tituloModal = "Registrar Entrenador";
                        this.nombre = "";
                        this.foto = "";
                        this.tipoAccion = 1;
                        

                    }
                }
            },

            // actualizarEntrenadores(){
            //     let me = this;
            //     let url = 'http://localhost:8080/admin/entrenadores';
            //     axios.put(url, {
            //         'id': this.update,
            //         'nombre': this.foto
            //     }).then(function(response){

            //         me.listarEntrenadores();
            //         me.clearFields();

            //     })
            //     .catch(function(error){
            //         console.log(error)

            //     });
            // },
            loadFieldsUpdate(data){ ////Esta función rellena los campos y la variable update, con el entrenador que queremos modificar
                this.update = data.id
                let me = this;
                let url = 'http://localhost:8080/admin/entrenadores/buscar?id='+this.update;
                axios.get(url).then(function(response){
                    me.nombre = response.data.nombre;
                    me.foto = response.data.foto;

                })
                .catch(function(error){
                    console.log(error)
                })

            },

            eliminarEntrenador(data){
                let me=this;
                let entrenador_id = data.id;
                if(confirm('¿Seguro que desea eliminar este entrenador?')){
                    axios.delete('http://localhost:8080/admin/entrenadores/eliminar/'+entrenador_id)
                    .then(function(response){
                        me.listarEntrenadores();
                    })
                    .catch(function(error){
                        console.log(error)
                    })
                }

            },
            clearFields(){ //Limpia los campos e inicializa la variable update a 0*
                this.nombre = "";
                this.foto = "";
                this.update = 0;

            }

        },
        computed:{
            imagen(){
                return this.imagenMiniatura;
            }
        },
        mounted(){

            this.listarEntrenadores();

           
        }
        
    }
</script>

<style>

    .modal-content{
        width: 100% !important;
        margin-top:50px;
        position:absolute;
         
    }
    .mostrar{
        display: list-item !important;
        opacity:1 !important;
        background-color: #3c29297a !important;
       
        
    }
</style>