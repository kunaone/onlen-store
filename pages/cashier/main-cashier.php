<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 style="margin-top: 40px;">Dashboard</h1>
                <!-- just some greetings  -->
                <?php
                date_default_timezone_set('Asia/Jakarta');

				$hour = date('H');

				if ($hour < 12) {
				    $greeting = 'Selamat Pagi';
				    $greetingIcon = "./assets/icon/sunrise.svg";

				} elseif ($hour < 14) {
				    $greeting = 'Selamat Siang';
				    $greetingIcon = "./assets/icon/sun.svg";

				} elseif ($hour < 18) {
				    $greeting = 'Selamat Sore';
				    $greetingIcon = "./assets/icon/sunset.svg";

				} else {
				    $greeting = 'Selamat Malam';
				    $greetingIcon = "./assets/icon/night.svg";
				}
				
                // var_dump($greetingIcon);
                // var_dump(file_exists($greetingIcon));

                ?>
                <table class="">
                    <tr>
                        <td style="width: 30px;"><?=file_get_contents($greetingIcon);?></td>
                        <td style="vertical-align: bottom;"><p class="text-muted greeting">&nbsp; <?= date('N') >= 6 ? 'Happy Weekend!' : $greeting?>, Gunawan</p></td>
                    </tr>
                </table>
                
            </div> <!-- /.col-lg-12 -->
        </div>

        <div class="row" style="margin-top: 12px;">
        	<div class="col-lg-4">
        		<div class="panel panel-default" style="border-radius: 10px;">
        			<div class="panel-body">
                        <small class="text-capitalize text-muted">total penjualan</small>
        				<h3 style="margin-top: 12px;"><strong>Rp. 1.250.000</strong></h3>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="panel panel-default" style="border-radius: 10px;">
        			<div class="panel-body">
                        <small class="text-capitalize text-muted">transaksi</small>
        				<h3 style="margin-top: 12px;"><strong>42</strong></h3>
        			</div>
        		</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="panel panel-default" style="border-radius: 10px;">
        			<div class="panel-body">
                        <small class="text-capitalize text-muted">barang terjual</small>
        				<h3 style="margin-top: 12px;"><strong>128</strong></h3>
        			</div>
        		</div>
        	</div>
        </div>

        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading clearfix" style="background-color: #fff;">
                        <p class="pull-left" style="margin-top: 8px;"><strong>Transaksi Terbaru</strong></p>
                        <button class="btn btn-default pull-right">View All</button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php

                            $transactions = array(
                                                array(
                                                    'no' => 1,
                                                    'invoice' => 'INV-0021',
                                                    'time' => '09:32',
                                                    'total' => 'Rp 35.000',
                                                    'status' => 'PAID'
                                                ),
                                                array(
                                                    'no' => 2,
                                                    'invoice' => 'INV-0022',
                                                    'time' => '10:15',
                                                    'total' => 'Rp 125.000',
                                                    'status' => 'PENDING'
                                                ),
                                                array(
                                                    'no' => 3,
                                                    'invoice' => 'INV-0023',
                                                    'time' => '11:47',
                                                    'total' => 'Rp 78.500',
                                                    'status' => 'DECLINED'
                                                )
                                            );
                            
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>INVOICE</th>
                                        <th>JAM</th>
                                        <th>TOTAL</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($transactions as $data){?>
                                    <tr>
                                        <td><?=htmlspecialchars($data['no'])?></td>
                                        <td><?=htmlspecialchars($data['invoice'])?></td>
                                        <td><?=htmlspecialchars($data['time'])?></td>
                                        <td><?=htmlspecialchars($data['total'])?></td>
                                        <td>
                                            <small style="font-size: 11px;padding: 7px; border-radius: 12px;"
                                                   class="<?php

                                                            if($data['status'] == 'PAID'){
                                                                echo 'status-paid';
                                                            } elseif($data['status'] == 'PENDING'){
                                                                echo 'status-pending';
                                                            } else {
                                                                echo 'status-declined';
                                                            }
                                                          ?> ">
                                                
                                                <strong><?=htmlspecialchars($data['status'])?></strong>
                                            </small>
                                        </td> 
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>