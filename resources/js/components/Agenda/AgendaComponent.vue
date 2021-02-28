<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- <spinner v-show="loading"></spinner> -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-teal">
                            <h3 class="card-title"><i class="fas fa-users"></i>  Agenda</h3>
                            <button type="button" @click="abrirModal('agenda', 'registrar')" class="btn btn-default float-right p-1" style="width: 150px;"><i class="fas fa-plus"></i>  Agregar</button>

                            <div class="input-group input-group-sm float-right mr-4" style="width: auto;">
                                <input type="text" v-model="buscar" @keyup.enter="listarRegistros(1,buscar,criterio)" class="form-control float-right" placeholder="Buscar">

                                <div class="input-group-append">
                                    <button @click="listarRegistros(1,buscar,criterio)" type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <select class="mb-0 input-group-sm float-right mr-0 custom-select" style="width: auto;" v-model="criterio">
                                <option value="nombres"> Nombre </option>
                                <option value="email"> Correo </option>
                            </select>

                        </div>
                    
                        <div class="card-body">
                            <table class="table table-bordered table-responsive table-condensed">
                                <thead>                  
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Sexo</th>
                                        <th>Correo</th>
                                        <th>Posicion</th>
                                        <th>Departamento</th>
                                        <th>Salario</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr v-for="agenda in arrayAgenda" :key="agenda.id">
                                        <td v-text="agenda.nombres"></td>
                                        <td v-text="agenda.apellidos"></td>
                                        <td v-text="agenda.telefono"></td>
                                        <td v-text="agenda.sexo"></td>
                                        <td v-text="agenda.email"></td>
                                        <td v-text="agenda.posicion"></td>
                                        <td v-text="agenda.departamento"></td>
                                        <td v-text="agenda.salario"></td>
                                        <td v-text="agenda.fechadenacimiento"></td>
                                        <td>
                                            <div v-if="agenda.condicion">
                                                <span class="badge badge-success">Activado</span>
                                            </div>
                                            <div v-else>
                                                <span class="badge badge-danger">Desactivado</span>
                                            </div>
                                        </td>
                                        <td>
                                            <button @click="abrirModal('agenda', 'actualizar', agenda)" class="btn btn-warning btn-xs" >Editar</button>

                                            <template class="float-right" v-if="agenda.condicion">
                                                <button>
                                                     <button class="btn btn-info btn-xs" @click="desactivarAgenda(agenda.id)" ><i class="fas fa-check"></i></button>
                                                </button>
                                            </template>
                                            <template v-else>
                                                <button>
                                                    <button class="btn btn-danger btn-xs" @click="activarAgenda(agenda.id)"><i class="fas fa-trash-alt"></i></button>
                                                </button>
                                            </template>


                                        </td>
                                    </tr>
                            
                                </tbody>
                            </table>
                    
                        </div>

                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"  v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1)">Ant &laquo;</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '' ]">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page)" v-text="page"></a>
                                </li>
                                
                                
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1)">Sig &raquo;</a>
                                </li>
                        </ul>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>

        <!--Inicio del modal agregar/actualizar agenda-->
           <div class="modal fade"  :class="{'mostrar': modal}">
                <div class="modal-dialog modal-lg">
                    <form action="" method="POST">
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
                                    
                                        
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="text-muted " for="">Nombres</label>
                                            <input v-model="nombres" type="text" class="form-control" placeholder="ingrese sus nombres">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="text-muted " for="">Apellidos</label>
                                            <input v-model="apellidos" type="text" class="form-control" placeholder="ingrese sus apellidos">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="text-muted " for="">Telefono</label>
                                            <input v-model="telefono" type="text" class="form-control" placeholder="ingrese el telefono">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="text-muted " for="">Sexo</label>
                                            <input v-model="sexo" type="text" class="form-control" placeholder="ingrese genero">
                                        </div>
                                    </div>

                                
                                    <div class="col-xl-6">
                                        <div class="form-group ">
                                            <label class="text-muted col-md-3" for="">Correo</label>
                                            <input v-model="email" type="email" class="form-control" placeholder="ingrese su Correo">
                                        </div>
                                    </div>

                                
                                    <div class="col-xl-6">
                                        <div class="form-group ">
                                            <label class="text-muted " for="">Posicion</label>
                                            <input v-model="posicion" type="text" class="form-control" placeholder="ingrese su posicion">
                                        </div>
                                    </div>

                                
                                    <div class="col-xl-6">
                                        <div class="form-group ">
                                            <label class="text-muted " for="">Departamento</label>
                                            <input v-model="departamento" type="text" class="form-control" placeholder="ingrese el departamento">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="text-muted " for="">Salario</label>
                                            <input v-model="salario" type="text" class="form-control" placeholder="ingrese el salario">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group ">
                                            <label class="text-muted" for="">Fecha Nacimiento.</label>
                                            <input  v-model="fechadenacimiento" type="date" class="form-control"> 
                                           
                                        </div>
                                    </div>

                                    <div class="form-group row div-error">
                                        <div class="text-center text-error">
                                            <div v-for="error in errorMostrarMsjAgenda" :key="error" v-text="error" >

                                            </div>
                                        </div>

                                    </div>

                                    
                                </div>

                            </div>
                            </div>
                            <div class="modal-footer bg-default justify-content-between">
                                <button @click="cerrarModal()" type="button" class="btn btn-default">Cancelar</button>
                                <button v-if="tipoAccion==1" @click="agregarRegistro()" type="button" class="btn btn-info">Guardar</button>
                                <button v-if="tipoAccion==2" @click="actualizarRegistro()" type="button" class="btn btn-info">Actualizar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
        <!-- /.modal -->
    
    </section>
</template>

<script>
export default {

    data(){
        return {
            agenda_id: 0,
            nombres: '',
            apellidos: '',
            telefono: '',
            sexo: '',
            email: '',
            posicion: '',
            departamento: '',
            salario: '',
            fechadenacimiento: '',
            arrayAgenda: [],
            loading: true,
            modal: 0,
            tituloModal: '',
            tipoAccion: 0,
            errorAgenda: 0,
            errorMostrarMsjAgenda: [],
            pagination: {
                'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
            },
            offset: 3,
            criterio: 'nombres',
            buscar: ''

        }
    },
    computed:{
        isActived: function(){
            return this.pagination.current_page;
        },
        //calcula los elementos de la paginacion
        pagesNumber: function(){
            if(!this.pagination.to){
                return [];
            }

            let  from = this.pagination.current_page - this.offset;
            if(from < 1){
                from = 1;
            }

            let to = from + (this.offset * 2);
            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }

            let pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;

        }

    },
    methods:{

    
        listarRegistros(page,buscar,criterio){
            let age = this;
            let url = 'http://crudlaravel6.6.test:8080/admin/agenda?page=' + page + '&buscar=' + buscar + '&criterio=' + criterio;
            axios.get(url).then(function( response) {
                let respuesta = response.data;
                age.arrayAgenda = respuesta.agenda.data;
                age.pagination = respuesta.pagination;

                // age.arrayAgenda = response.data;
                age.loading = false;

            })
            .catch(function(error){
                console.log(error)
            });


        },
        cambiarPagina(page,buscar,criterio){
            let age = this;
            //actualiza la pagina actual
            age.pagination.current_page = page;
            //envia la peticion para visualizar la data de esa pagina
            age.listarRegistros(page,buscar,criterio);
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.nombres = '';
            this.apellidos = '';
            this.telefono = '';
            this.sexo= '';
            this.email= '',
            this.posicion = '';
            this.departamento = '';
            this.salario = '';
            this.fechadenacimiento = '';
        },
        validarAgenda(){
            this.errorAgenda = 0;
            this.errorMostrarMsjAgenda = [];

            if(!this.nombres) this.errorMostrarMsjAgenda.push("El campo Nombres no puede estar vacio");
            if(!this.apellidos) this.errorMostrarMsjAgenda.push("El campo Apellidos no puede estar vacio");
            if(!this.telefono) this.errorMostrarMsjAgenda.push("El campo Telefono no puede estar vacio");
           
            if(!this.sexo) this.errorMostrarMsjAgenda.push("El campo Sexo no puede estar vacio");
            if(!this.email) this.errorMostrarMsjAgenda.push("El campo Email no puede estar vacio");
            if(!this.posicion) this.errorMostrarMsjAgenda.push("El campo Posicion no puede estar vacio");
            if(!this.departamento) this.errorMostrarMsjAgenda.push("El campo Departamento no puede estar vacio");
            if(!this.salario) this.errorMostrarMsjAgenda.push("El campo Salario no puede estar vacio");
            if(!this.fechadenacimiento) this.errorMostrarMsjAgenda.push("El campo Fechadenacimiento no puede estar vacio");

            if(this.errorMostrarMsjAgenda.length) this.errorAgenda = 1;
            return this.errorAgenda;

            

        },

        abrirModal(modelo, accion, data = []){
            if (modelo === "agenda") {
                if(accion == 'registrar') {
                    
                    this.modal = 1;
                    this.tituloModal = 'Agendar Registro';
                    this.nombres = '';
                    this.apellidos = '';
                    this.telefono = '';
                    this.sexo = '';
                    this.email = '';
                    this.posicion = '';
                    this.departamento = '';
                    this.salario = '';
                    this.fechadenacimiento = '';
                    this.tipoAccion = 1;
                        
                }
                if(accion == 'actualizar'){
                    // console.log(data)
                    this.modal = 1;
                    this.tituloModal = 'Actualizar Registro';
                    this.tipoAccion = 2;
                    this.agenda_id = data['id'];
                    this.nombres = data['nombres'];
                    this.apellidos = data['apellidos'];
                    this.telefono = data['telefono'];
                    this.sexo = data['sexo'];
                    this.email = data['email'];
                    this.posicion = data['posicion'];
                    this.departamento = data['departamento'];
                    this.salario = data['salario'];
                    this.fechadenacimiento = data['fechadenacimiento'];


                }
            }

        },
        agregarRegistro(){

            if(this.validarAgenda()){
                return;
            }

            let age=this;
            axios.post('http://crudlaravel6.6.test:8080/admin/agenda/agregar', {

                'nombres': this.nombres,
                'apellidos': this.apellidos,
                'telefono': this.telefono,
                'sexo': this.sexo,
                'email': this.email,
                'posicion': this.posicion,
                'departamento': this.departamento,
                'salario': this.salario,
                'fechadenacimiento': this.fechadenacimiento
            

            }).then(function(response){

                age.cerrarModal();
                age.listarRegistros(1, '', 'nombres');
                toastr.success('Registro Creado Correctamente');

            })
            .catch(function(error){
                console.log(error);
            });
        },
        actualizarRegistro(){
            if(this.validarAgenda()){
                return;
            }

            let age = this;
            axios.put('http://crudlaravel6.6.test:8080/admin/agenda/editar', {
                'nombres': this.nombres,
                'apellidos': this.apellidos,
                'telefono': this.telefono,
                'sexo': this.sexo,
                'email': this.email,
                'posicion': this.posicion,
                'departamento': this.departamento,
                'salario': this.salario,
                'fechadenacimiento': this.fechadenacimiento,
                'id': this.agenda_id

            }).then(function (response){
                age.cerrarModal();
                age.listarRegistros(1, '', 'nombres');
                toastr.success('Registro Actualizado Correctamente');

            })
            .catch(function(error){
                console.log('error')
            });

        },
        desactivarAgenda(id){

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {

                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar',
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({

                title: '¿Esta seguro de desactivar este Registro?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {

                if(result.value){
                    let age =this;

                    axios.put('http://crudlaravel6.6.test:8080/admin/agenda/desactivar',{

                        'id': id
                    }).then(function(response){
                        age.listarRegistros(1, '', 'nombres');

                        swalWithBootstrapButtons.fire(

                            'Desactivado!',
                            'El registro ha sido desactivado con éxito.',
                            'success'
                        )

                    }).catch(function(error){
                        console.log(error)
                    })
                    
                } else if(

                    result.dismiss === swal.DismissReason.cancel

                ){
                    // swalhWithBootstrapButtons.fire(
                    //     'canceled',
                    //     'asdasdsdad',
                    //     'error'
                    // )
                }
            })
            
        },
        activarAgenda(id){

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'Aceptar!',
                    cancelButton: 'Cancelar'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({

                title: '¿Esta seguro de activar este Registro?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {

                if(result.value){

                    let age =this;

                    axios.put('http://crudlaravel6.6.test:8080/admin/agenda/activar', {

                        'id': id
                    }).then(function(response){
                        age.listarRegistros(1, '', 'nombres');

                        swalWithBootstrapButtons.fire(

                            'Desactivado!',
                            'El registro ha sido activado con éxito.',
                            'success'
                        )

                    }).catch(function(error){
                        console.log(error)
                    })
                }else if (

                    result.dismiss === swal.DismissReason.cancel

                ){
                    // swalhWithBootstrapButtons.fire(
                    //     'canceled',
                    //     'asdasdsdad',
                    //     'error'
                    // )
                }

            })
           
        }

    },
    mounted() {

        this.listarRegistros(1,this.buscar,this.criterio);

    }

    
    
}
</script>

<style>

    .modal-content{
        width: 100% !important;
        margin-top:45px;
        position:absolute;
         
    }
    .mostrar{
        display: list-item !important;
        opacity:1 !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display:flex;
        justify-content: center;
    }
    .text-error{
        color:red !important;
        font-weight: bold;
    }
</style>