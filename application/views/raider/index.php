<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cari Raider</h3>
                </div>
                <div class="box-body">
                    <form role="form" action="#" method="GET">
                        <div class="form-group">
                            <label>Nama Raider</label> 
                            <input type="text" name="name" class="form-control" id="filter-search" <?php 
                            if ($_GET['name']) {
                                echo 'value="' . $_GET['name'] . '"';
                            } ?> >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-block btn-primary" id="btn-search">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="load_data">
        </div>
    </div>
    <div id="load_data_message"></div>
</section>

<a href="<?= base_url('raider/create') ?>" class="float">
    <i class="fa fa-plus my-float"></i>
</a>

<script type="text/javascript">
    function hapus(id) {
        $(".btnDelete_"+id).remove();
        $("#deleteForm_"+id).append('<div class="col-xs-12 btnDelete_'+id+'" align="center">Konfirmasi Penghapusan</div>'+
            '<div class="col-xs-6 btnDelete_'+id+'">'+
            '<button class="btn btn-sm btn-block btn-info" onclick="cancelDelete('+id+')">' +
            '<i class="fa fa-close"></i> Cancel </button>' +
            '</div>'+
            '<div class="col-xs-6 btnDelete_'+id+'">'+
            '<button class="btn btn-sm btn-block btn-danger" onclick="confirmDelete('+id+')">' +
            '<i class="fa fa-check"></i> Hapus </button>' +
            '</div>'
            );
    };

    function cancelDelete(id){
        $(".btnDelete_"+id).remove();
        $("#deleteForm_"+id).append('<div class="col-xs-12 btnDelete_'+id+'">'+
            '<button class="btn btn-sm btn-block btn-danger" onclick="hapus('+id+')"> <i class="fa fa-trash"></i> Hapus Manager</button>'+
            '</div>'
            );
    }

    function confirmDelete(id){
        location.href = "<?= base_url('raider/delete/') ?>" + id;
    }


    $(document).ready(function(){

        var limit = 2;
        var start = 0;
        var action = 'inactive';
        var search = 0;

        function load_data(limit, start){
            lazzy_loader(limit);
            search = $('#filter-search').val();

            $.ajax({
                url:"<?= base_url(); ?>raider/fetch?name="+search,
                method:"POST",
                data:{limit:limit, start:start},
                cache: false,
                success:function(data)
                {
                    if(data == '')
                    {
                        $('#load_data_message').html("");
                        action = 'active';
                    }
                    else
                    {
                        $('#load_data').append(data);
                        $('#load_data_message').html("");
                        action = 'inactive';
                    }
                }
            })
        }

        if(action == 'inactive')
        {
            action = 'active';
            load_data(limit, start);
        }

        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
            {
                lazzy_loader(limit);
                action = 'active';
                start = start + limit;
                setTimeout(function(){
                    load_data(limit, start);
                }, 1000);
            }
        });
    });
</script>