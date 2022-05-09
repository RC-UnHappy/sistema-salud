<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Lista Registros</h3>
                </div>
                <div class="d-inline-block float-right">
                    <?php if ($this->rbac->check_operation_permission('add')) : ?>
                        <a href="<?= base_url('admin/salud/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Agregar Nuevo Registro</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                <table id="na_datatable" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Ocupación</th>
                            <th>Tipo Vivienda</th>
                            <th>Opciones</th>
                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
    //---------------------------------------------------
    var table = $('#na_datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?= base_url('admin/salud/list') ?>",
        "order": [
            [1, 'asc']
        ],
        "columnDefs": [{
                "targets": 0,
                "name": "",
                'searchable': false,
                'orderable': true
            },
            {
                "targets": 1,
                "name": "cedula",
                'searchable': true,
                'orderable': true
            },
            {
                "targets": 2,
                "name": "nombres",
                'searchable': true,
                'orderable': true
            },
            {
                "targets": 3,
                "name": "apellidos",
                'searchable': true,
                'orderable': true
            },
            {
                "targets": 4,
                "name": "telefono",
                'searchable': false,
                'orderable': false,
                'width': '100px'
            },
            {
                "targets": 5,
                "name": "ocupacion",
                'searchable': false,
                'orderable': false,
                'width': '100px'
            },
            {
                "targets": 6,
                "name": "tipo_vivienda",
                'searchable': false,
                'orderable': false,
                'width': '100px'
            },
            {
                "targets": 7,
                "name": "",
                'searchable': false,
                'orderable': false,
                'width': '100px'
            },
        ]
    });
</script>


<script type="text/javascript">
    $("body").on("change", ".tgl_checkbox", function() {
        console.log('checked');
        $.post('<?= base_url("admin/users/change_status") ?>', {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                id: $(this).data('id'),
                status: $(this).is(':checked') == true ? 1 : 0
            },
            function(data) {
                $.notify("Status Changed Successfully", "success");
            });
    });
</script>