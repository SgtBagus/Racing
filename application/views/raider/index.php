<div class="row">
    <div class="col-md-12">
        <h3 class="box-title">Cari Rider</h3>
        <form role="form" action="#" method="GET">
            <div class="form-group">
                <label>Nama Rider</label>
                <input type="text" name="name" class="form-control" id="filter-search" <?php
                                                                                        if ($_GET['name']) {
                                                                                            echo 'value="' . $_GET['name'] . '"';
                                                                                        } ?>>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-block btn-primary" id="btn-search">
                    <i class="fa fa-search"></i> Cari
                </button>
                <?php if ($_GET['name']) { ?>
                    <br>
                    <a href="<?= base_url('raider') ?>">
                        <button type="button" class="btn btn-lg btn-block btn-info">
                            <i class="fa fa-refresh"></i> Reset Pencarian
                        </button>
                    </a>
                <?php } ?>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div id="load_data">
    </div>
</div>
<div id="load_data_message"></div>
<a href="<?= base_url('raider/create') ?>" class="float" style="color:white">
    <i class="fa fa-plus my-float"></i>
</a>

<script type="text/javascript">
    function hapus(id) {
        $(".btnDelete_" + id).remove();
        $("#deleteForm_" + id).append('<div class="col-xs-12 btnDelete_' + id + '" align="center">Konfirmasi Penghapusan</div>' +
            '<div class="col-xs-6 btnDelete_' + id + '">' +
            '<button class="btn btn-sm btn-block btn-info" onclick="cancelDelete(' + id + ')">' +
            '<i class="fa fa-close"></i> Cancel </button>' +
            '</div>' +
            '<div class="col-xs-6 btnDelete_' + id + '">' +
            '<button class="btn btn-sm btn-block btn-danger" onclick="confirmDelete(' + id + ')">' +
            '<i class="fa fa-check"></i> Hapus </button>' +
            '</div>'
        );
    };

    function cancelDelete(id) {
        $(".btnDelete_" + id).remove();
        $("#deleteForm_" + id).append('<div class="col-xs-12 btnDelete_' + id + '">' +
            '<button class="btn btn-sm btn-block btn-danger" onclick="hapus(' + id + ')"> <i class="fa fa-trash"></i> Hapus Manager</button>' +
            '</div>'
        );
    }

    function confirmDelete(id) {
        location.href = "<?= base_url('raider/delete/') ?>" + id;
    }

    $(document).ready(function() {

        var limit = 2;
        var start = 0;
        var action = 'inactive';
        var search = 0;

        function load_data(limit, start) {
            lazzy_loader(limit);
            search = $('#filter-search').val();

            $.ajax({
                url: "<?= base_url(); ?>raider/fetch?name=" + search,
                method: "POST",
                data: {
                    limit: limit,
                    start: start
                },
                cache: false,
                success: function(data) {
                    if (data == '') {
                        $('#load_data_message').html('<div class="row">' +
                            '<div class="col-xs-12" align="center">' +
                            'Semua Raider telah Ditampilkan' +
                            '</div>' +
                            '</div>');
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html('<div class="row">' +
                            '<div class="col-xs-12" align="center">' +
                            'Semua Data telah Ditampilkan' +
                            '</div>' +
                            '</div>');
                        action = 'inactive';
                    }
                }
            })
        }

        if (action == 'inactive') {
            action = 'active';
            load_data(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
                lazzy_loader(limit);
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_data(limit, start);
                }, 1000);
            }
        });
    });
</script>