<div class="row">
    <div class="col-md-12">
        <h3 class="box-title" align="center">Gallery</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <img class="img-even" src="<?= $main_image['url'] ?>" alt="Third slide">
            <div class="box-body">
                <div align="center">
                    <h4 align="center"><?= $subpage ?></h4>
                    <small>
                    Dibuat pada tgl : <?= date('d M Y', strtotime($id['created_at'])) ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form role="form" action="<?= base_url('gallery/view/' . $id['id']) ?>" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Cari Gambar</label>
                <input type="text" name="title" class="form-control" <?php if ($_GET['title']) {
                                                                            echo 'value="' . $_GET['title'] . '"';
                                                                        } ?> id="filter-search">
            </div>
            <div class="form-group" align="center">
                <button type="submit" class="btn btn-block btn-primary">Cari</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div id="load_data">
    </div>
</div>
<div id="load_data_message"></div>

<script type="text/javascript">
    $(document).ready(function() {

        var limit = 3;
        var start = 0;
        var action = 'inactive';
        var search = 0;

        function load_data(limit, start) {
            lazzy_loader(limit);
            search = $('#filter-search').val();

            $.ajax({
                url: "<?= base_url(); ?>gallery/fetchview/<?= $id['id'] ?>?name=" + search,
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
                            'Semua Gambar telah Ditampilkan' +
                            '</div>' +
                            '</div>');
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html('<div class="row">' +
                            '<div class="col-xs-12" align="center">' +
                            'Semua Gambar telah Ditampilkan' +
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