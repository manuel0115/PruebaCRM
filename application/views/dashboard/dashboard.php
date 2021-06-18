<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            
            <!-- profile info & task notification -->
            <div class="col-md-12 col-sm-12 clearfix">
                <div class="user-profile pull-right">

                    <h6 class="user-name dropdown-toggle" data-toggle="dropdown">Nombre Usuario<i class="fa fa-angle-down"></i></h6>
                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="#">Cerrar Sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header area end -->
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix pt-3 pb-3">
                    <h4 class="page-title pull-left">Inicio</h4>

                </div>
            </div>

        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <!-- sales report area start -->

        <!-- sales report area end -->
        <!-- overview area start -->

        <!-- overview area end -->
        <!-- market value area start -->
        <div class="row mt-5 mb-5">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <span class="header-title text-md-left pt-5 pb-5">Clientes</span>
                        <a href="javascript:;" id="agregarCliente" data-modal="modalAgrgarModificarCliente" class="btn btn-primary float-right">Agregar Cliente <i class="fa fa-plus"></i></a>
                        <div class="data-tables datatable-primary">
                            <table id="tblClientes" class="text-center" style="width: 100%;">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Correo</th>
                                        <th>Empresa</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- market value area end -->
        <!-- row area start -->

        <!-- row area end -->

        <!-- row area start-->
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="assets/js/parsley.js"></script>
<script src="assets/js/notify.js"></script>



<script>
    $(document).ready(() => {


        const dtblCliente = $("#tblClientes").DataTable({
            "ajax": 'cliente/datosTablaClientes',
            columns: [{
                    data: "ID",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: "NOMBRE",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: "TIPO_USUARIO",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: "CORREO",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: "EMPRESA",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: "TELEFONO",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: "DIRECCION",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: "ESTADO",
                    className: "text-center",
                    orderable: false
                },
                {
                    data: null,
                    className: "text-center",
                    orderable: false
                }
            ],
            aoColumnDefs: [

                {
                    aTargets: [8],
                    mRender: function(data, type, full) {



                        return (
                            `<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" data-modal="modalAgrgarModificarCliente" data-id="${full.ID}" class="btn btn-primary btn_editar_cliente" ><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" data-id="${full.ID}" class="btn btn-primary btn_eliminar_cliente" ><i  class="fa fa-trash-o"></i></a>
                         </div>
                         `
                        );
                    },
                },


            ],
        });

        // varaianles y constantes;
        const btnCliente = $("#agregarCliente");
        const tblCliente = $("#tblClientes");
        const modal = $(".modal");


        //eventos
        btnCliente.on("click", function() {
            let urlModal = $(this).attr('data-modal');
            let option = {
                "urlModal": $(this).attr('data-modal')
            }
            llamarModal(option);
        });

        

        modal.on("click", '#guardarCliente', validarFormulario);

        tblCliente.on("click", ".btn_editar_cliente", function() {
            let idCliente = $(this).attr('data-id');
            let urlModal = $(this).attr('data-modal');

            let option = {
                "urlModal": urlModal,
                "id": idCliente

            }
            llamarModal(option);
        });

        tblCliente.on("click", ".btn_eliminar_cliente", function() {
            let idCliente = $(this).attr('data-id');
           
           

            let option = {
                "id": idCliente
            }
            eliminarCliente(option);
        });






        //funciones

        function llamarModal(option) {
            let {
                urlModal,
                id
            } = option;
            id = id || '';


            let modalContent = modal.find('.modal-content').first();

            modalContent.load(`cliente/${urlModal}/${id}`, () => modal.modal("show"));





        };




        function validarFormulario() {
            let cliente = $("#frmGuardarCliente").serialize();

            enviarDatos(cliente);

        }

        function enviarDatos(cliente) {

            $.post(`cliente/guardarCliente`, cliente, (datos) => {
                actalizarTabla(datos);
            }, 'json');
        }

        function actalizarTabla(datos) {
            if (datos['codigo'] == 0) {

                $.notify(datos['mensaje'], "success");

                dtblCliente.ajax.reload();
                modal.modal("hide");


            } else {
                console.log(datos['mensaje'])
                for (errores in datos['mensaje']) {
                    $.notify(`${datos['mensaje'][errores]}`, "danger");
                }
            }
        }

        function eliminarCliente(idCliente){
            let {
                id
            } = idCliente;

            $.post(`cliente/eliminarCliente/${id}`,(datos) => {
                //actalizarTabla(datos);
                actalizarTabla(datos);
            }, 'json');
        }

        

    })
</script>