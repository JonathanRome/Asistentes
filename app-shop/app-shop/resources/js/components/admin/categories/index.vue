<template>

<div>

    <div class=" text-center"><p class="h1  title">Categorias</p></div><hr>
    <div class="mb-2 row justify-content-between">
        <div class=" col-md-4 col-sm-12 ">
            <button type="button" @click="abrirModal('categoria','registrar')" class="btn btn-warning w-100 ">
                <i class="icon-plus"></i> Nuevo
            </button>
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="input-group">
                <select  v-model="criterio" class="form-control col-md-3">
                    <option value="name">Nombre</option>
                    <option value="description">Descripción</option>
                </select>
                <input type="text" id="texto" name="texto" class="form-control " v-model="buscar" @keyup.enter="listarCategoria(1,buscar,criterio)">
                <button type="submit" class=" btn-primary button" @click="listarCategoria(1,buscar,criterio)"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="table-responsive ">
        <table  class="table table-bordered table-hover " id="">
            <thead>
                <tr class=" shadow-md p-3 mb-5   rounded">

                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="" style="padding-left: 80px; padding-right: 80px;"><center>Ajustes</center></th>
                </tr>
            </thead>
            <tbody>                    
                <tr class="odd gradeX" v-for="categoria in arrayCategoria" :key="categoria.id">
                    <td v-text="categoria.name"></td>
                    <td v-text="categoria.description"></td>
                    <td v-if="categoria.id==1" class="text-center">
                        <button type="button"  title = "Editar" @click="abrirModal('categoria','actualizar',categoria)" class = "btn btn-success  btn-sm " ><i class = "fa fa-edit" ></i></button>
                    </td>
                    <td class="text-center" v-else>
                        <button type="button"  title = "Editar" @click="abrirModal('categoria','actualizar',categoria)" class = "btn btn-success  btn-sm " ><i class = "fa fa-edit" ></i></button>
                        <button type="button" class="btn btn-danger btn-sm"  @click="alert(categoria.id)" title = "Eliminar" ><i class = "fa fa-times" ></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-center"><strong v-if="arrayCategoria==0" class=" pt-5 text-danger">No se encuetran categorias</strong></p>
    </div>
    <!-- paginacion-->
    <ul class="pagination">
        <li class="page-item" v-if="pagination.current_page>1">
            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page-1,buscar,criterio)">Ant</a>
        </li>
        <li class="page-item " v-for="page in pagesNumber" :key="page" :class="[page==isActived ?'active':'']">
            <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
        </li>
        <li class="page-item" v-if="pagination.current_page<pagination.last_page">
            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page+1,buscar,criterio)">Sig</a>
        </li>
    </ul>

    <!-- Modal Regitrar y editar categoria-->
    <div class="modal fade " :class="{'mostrar' : modal}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize"  v-text="tituloModal"></h5>
                    <button type="button" class="close"  @click="cerrarModal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label >Nombre de categoria</label>
                            <input type="text" class="form-control " autofocus placeholder="Nombre de categoria" v-model="name">
                            <span v-if="errors.name"  class=" text-danger " >
                                {{errors.name[0]}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCity">Descripcion</label>
                        <textarea type="text" class="form-control"   rows="5" v-model="description"  placeholder="Descripcion"></textarea>
                        <span v-if="errors.description"  class=" text-danger " >
                            {{errors.description[0]}}
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()" >Cerrar</button>
                    <button type="button" class="btn btn-primary" @click="registrarCategoria()" data-dismiss="modal" v-if="titoAccion==1">Guardar</button>
                    <button type="button" class="btn btn-primary" @click="actualizarCategoria()" data-dismiss="modal" v-if="titoAccion==2">Actualizar</button>
                </div>
            </div>
        </div>
    </div>   
 
 </div> 
</template>


<script>
    export default {
        data()
        {
            return {
                categoria_id:0,
                name:'',
                description:'',
                arrayCategoria:[],
                modal:0,
                tituloModal:'',
                titoAccion:0,
                errors:[],
                pagination: 
                {
                    'total':0,
                    'current_page':0,
                    'per_page':0,
                    'last_page':0,
                    'from':0,
                    'to':0,
                },
                offset:3,
                criterio:'name',
                buscar:''
            }
        },
        computed:
        {
            isActived:function()
            {
                return this.pagination.current_page;
            },
            //calcular elemento de la paginacion
            pagesNumber:function()
            {
                if (!this.pagination.to)
                {
                    return [];
                }

                var from=this.pagination.current_page-this.offset;
                if(from<1)
                {
                    from=1;
                }

                var to=from + (this.offset*2);
                if(to >= this.pagination.last_page)
                {
                    to=this.pagination.last_page;
                }

                var pagesArrary = [];
                while (from <= to)
                {
                    pagesArrary.push(from);
                    from++;
                }

                return pagesArrary;
            
            }

        },
        methods:
        {
            listarCategoria(page,buscar,criterio)
            {
                let me=this;
                var url='/admin/categories?page='+page+'&buscar='+buscar+'&criterio='+criterio;
                axios.get(url).then(function (response) {
                        var respuesta=response.data
                        me.arrayCategoria=respuesta.categorias.data;
                        me.pagination=respuesta.pagination;
                        // console.log(me.arrayCategoria.data);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .finally(function () {
                        // always executed
                    });
            },
            registrarCategoria()
            {
                let me =this;
                axios.post('/admin/categories',{
                    'name':this.name,
                    'description':this.description
                }).then(function(response){
                    // console.log(response);
                    me.cerrarModal();
                    me.listarCategoria(1,'','name');

                    }).catch(function(error){
                        // handle error
                        if (error.response.status==422) {
                            // console.log(error.response.data.errors);
                            me.errors=error.response.data.errors;
                        }
                        
                        
                    });

            },
            actualizarCategoria()
            {
                let me =this;
                axios.put('/admin/categories/edit',{
                    'name':this.name,
                    'description':this.description,
                    'id':this.categoria_id
                }).then(function(response){
                    // console.log(response);
                    me.cerrarModal();
                    me.listarCategoria(1,'','name');

                    }).catch(function(error){
                        // handle error
                         if (error.response.status==422) {
                            // console.log(error.response.data.errors);
                            me.errors=error.response.data.errors;
                        }
                        
                    });

            },
            eliminarCategoria(id)
            {
                let me =this;
                axios.post('/admin/categories/delete',{
                    'id':id
                }).then(function(response){
                    // console.log(response);
                    me.listarCategoria(1,'','name');

                    }).catch(function(error){
                        // handle error
                        console.log(error);
                        
                    });

            },
            alert(id)
            {
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
                })
                swalWithBootstrapButtons.fire({
                title: 'Esta seguro de eliminar esta categoria?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    this.eliminarCategoria(id);
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Eliminado!',
                        showConfirmButton: false,
                        timer: 1100
                        })
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    
                }
                })

            },
            abrirModal(modelo,accion,data = [])
            {
                switch(modelo){
                    case "categoria":
                    {
                        switch(accion){
                            case "registrar":
                            {
                                this.modal=1;
                                this.tituloModal='Registrar Categoria'
                                this.name='';
                                this.description='';
                                this.titoAccion=1;
                                break;
                            }
                            case "actualizar":
                            {   
                                this.modal=1;
                                this.tituloModal='Actualizar Categoria'
                                this.titoAccion=2;
                                this.name=data.name;
                                this.categoria_id=data.id
                                this.description=data.description;

                                break;
                            }
                        }
                        break;
                    }
                    
                }

            },
            cerrarModal()
            {
                this.modal=0;
                this.tituloModal='';
                this.name='';
                this.description='';
                this.errors='';
            },
            cambiarPagina(page,buscar,criterio)
            {
                let me=this;
                //actualiza la pagina actual
                me.pagination.current_page=page;
                //Envia la peticion para visualizar la data de esa pagina
                me.listarCategoria(page,buscar,criterio);


            }
        },
        mounted()
        {
            this.listarCategoria(1,this.buscar,this.criterio);
        }
    }

  

    
</script>


<style>
    th{
        color: white;
        background: rgb(216, 141, 13);
    }
    .modal-content{
        width: 100%;
        position: fixed !important;
      
    }
    .mostrar{
      display: list-item !important;
      opacity: 1 !important;
      position: fixed !important;
      background-color: #3c29297a !important;
      
    } 
    /* cortar caractere y colocar tres putos 
    .text{
        overflow:hidden; 
        white-space:nowrap;              
        text-overflow: ellipsis;
    } */
    .button{
        border: none;
    }
</style>
