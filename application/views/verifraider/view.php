<section class="content">
<div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <img src="<?= $file_event['url'] ?>" width="100%" height="230px">
                    <h3>
                        <?= $tbl_event['title'] ?><br>
                        <small>
                            <i class="fa fa-globe"></i> <?= $tbl_event['kota'] ?> - <?= $tbl_event['alamat'] ?>
                        </small> 
                        <br>
                        <a href="https://maps.google.com/?q=<?= $tbl_event['alamat'] ?>">
                            <button class="btn btn-sm btn-info"> <i></i> Lihat Peta Di Google Maps</button>
                        </a>
                    </h3>
                    <hr style="margin-top:5px; margin-bottom: 5px">
                    <div class="row"> 
                        <div class="col-xs-6">
                            Event Dimulai : <?= date('d-m-Y', strtotime($tbl_event['tglevent'])) ?><br>
                            <?php if ($tbl_event['status'] == 'ENABLE') {
                                echo '<small class="label bg-green">Dibuka</small>';
                            } else {
                                echo '<small class="label bg-red">Ditutup</small>';
                            }
                            ?>
                        </div>
                        <div class="col-xs-6" align="right">
                            <small>Event Dibuat : <?= date('d-m-Y', strtotime($tbl_event['created_at'])) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#>">
                <button class="btn btn-sm btn-block btn-success"> <i class="fa fa-whatsapp"></i>Hubungi Petanggung Jawab</button>
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12" align="center">
            Raider Pendaftar <b> <?= $rowraider[0]['rowraider'] ?></b>:
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cari Raider</h3>
                </div>
                <div class="box-body">
                    <form role="form" action="<?= base_url('verifraider/view/'.$tbl_event['id']) ?>" method="GET">
                        <div class="form-group">
                            <label>Nama Raider</label>
                            <input type="text" name="name" class="form-control" <?php if ($_GET['name']) {
                                                                                        echo 'value="' . $_GET['name'] . '"';
                                                                                    } ?> id="filter-search">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-block btn-primary">
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

<script type="text/javascript">
    $(document).ready(function(){

        var limit = 2;
        var start = 0;
        var action = 'inactive'; 
        var search = 0;

        function load_data(limit, start){
            lazzy_loader(limit);
            search = $('#filter-search').val();

            $.ajax({
                url:"<?= base_url('verifraider/fetchraider/'.$tbl_event['id']); ?>?name="+search,
                method:"POST",
                data:{limit:limit, start:start},
                cache: false,
                success:function(data)
                {
                    if(data == '') {
                        $('#load_data_message').html('<div class="row">'+
                            '<div class="col-xs-12" align="center">'+
                            'Semua Raider Pendaftar telah Ditampilkan'+
                            '</div>'+
                            '</div>');
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html('<div class="row">'+
                            '<div class="col-xs-12" align="center">'+
                            'Tampilkan Lebih Banyak <br> <i class="fa fa-angle-down"></i>'+
                            '</div>'+
                            '</div>');
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