<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" id="setting">

    <div class="row">
        
        <div class="row">
            
            <h1 class="text-center title yellow">Setting</h1>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Config</th>
                        <th scope="col">Status Config</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    
                    foreach($config as $cnfg) :
                        ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $cnfg['nama_config']; ?></td>
                        <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="<?= $cnfg['idswitch_config']; ?>" <?= ($cnfg['value'] == true) ? 'checked' : ''?> value="1" title="<?= ($cnfg['value'] == true) ? 'Aktif' : 'Mati'; ?>">
                            
                        </div>
                        status : <?= ($cnfg['value'] == true) ? 'Aktif' : 'Mati'; ?>
                        </td>
                    </tr>
                <?php 
                    $no++;
                    endforeach;
                ?>
                </tbody>
            </table>

        </div>

        <div class="row">
            
            <h1 class="title yellow text-center">Data History Login</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id</th>
                        <th scope="col">Ip Adress</th>
                        <th scope="col">Email</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Date</th>
                        <th scope="col">Success</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    
                    foreach($historyLogin as $histlog) :
                        ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $histlog['id']; ?></td>
                        <td><?= $histlog['ip_address']; ?></td>
                        <td><?= $histlog['email']; ?></td>
                        <td><?= $histlog['user_id']; ?></td>
                        <td><?= $histlog['date']; ?></td>
                        <td><?= $histlog['success']; ?></td>
                    </tr>
                <?php 
                    $no++;
                    endforeach;
                ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>