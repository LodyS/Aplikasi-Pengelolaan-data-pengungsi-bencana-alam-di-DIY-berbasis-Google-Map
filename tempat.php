<div class="page-header">
    <h1>Posko Pengungsi</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="tempat" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />            
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>            
                <a class="btn btn-primary" href="?m=tempat_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw">
                <th>No</th>
         
                <th>Nama Pengungsi</th>
                <th>Id Posko</th>
                <th>Tanggal masuk posko</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
                
        $sql = "SELECT * 
            FROM pengungsi p
            WHERE nama LIKE '%$q%' 
            ORDER BY id_pengungsi";
        $rows = $db->get_results($sql);
        
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no?></td>
            <!--<td><img class="thumbnail" height="60" src="assets/images/tempat/small_<?=$row->gambar?>" /></td>-->
            <td><?=$row->nama?></td>
            <td><?=$row->id_posko?></td>
            <td><?=$row->tanggal_masuk_posko?></td>
        
            <td class="nw">
                <a class="btn btn-xs btn-warning" href="?m=tempat_ubah&ID=<?=$row->id_pengungsi?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="aksi.php?act=tempat_hapus&ID=<?=$row->id_pengungsi?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;    ?>
        </table>
    </div>
</div>