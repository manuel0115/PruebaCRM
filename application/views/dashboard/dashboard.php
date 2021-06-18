<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
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
                        <span class="header-title text-md-left pt-3 pb-3">Data Table Primary</span>
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
                                        <th>Estado</th>
                                        <th>Opciones
                                            <th />

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
                    aTargets: [6],
                    mRender: function(data, type, full) {

                        
                       
                        return (
                            `<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" data-id_cliente="${full.ID}" class="btn btn-primary btn_editar_cliente" ><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0);" data-id="${full.ID}" class="btn btn-primary btn_eliminar_cliente" ><i class="fa fa-trash-o"></i></a>
                            <a href="javascript:void(0);" data-id="${full.ID}" class="btn btn-primary btn_direcciones_cliente" ><i class="fa fa-map-pin"></i></a>
                         </div>
                         `
                        );
                    },
                },


            ],
        });

        const btnCliente = $("#agregarCliente");
        const editarCliente = $("#btn_editar_cliente");
        const tblCliente = $("#tblClientes");
        const modal = $(".modal");


        btnCliente.on("click", llamarModal);

        modal.on("click", '#guardarCliente', validarFormulario);



        function llamarModal(e) {
            let urlModal = e.target.dataset.modal;


            let modalContent = modal.find('.modal-content').first();

            modalContent.load(`cliente/${urlModal}`, () => modal.modal("show"));



            /*console.log(modal);
            //$.post(`cliente/${urlModal}`,)*/

        };

        


        function validarFormulario() {
            let cliente = $("#frmGuardarCliente").serialize();

            enviarDatos(cliente);

        }

        function enviarDatos(cliente) {

            $.post(`cliente/guardarCliente`, cliente, (datos) => {
                console.log(datos)
            }, 'json');
        }

    })
</script>