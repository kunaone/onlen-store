<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 style="margin-top: 40px;">Riwayat Transaksi</h1>
                <p class="text-muted">lorem ipsum dolor sit amet</p>
			</div>
		</div>

		<div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default" style="border-radius: 10px;">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php
                            $no=1;
                            $transactions = array(
                                                array(
                                                    'invoice' => 'INV-0021',
                                                    'date' => '14 Sep 2026 09:32',
                                                    'cashier' => 'Ady',
                                                    'total' => 'Rp 35.000',
                                                    'status' => 'PAID'
                                                ),
                                                array(
                                                    'invoice' => 'INV-0022',
                                                    'date' => '14 Sep 2026 10:15',
                                                    'cashier' => 'Ady',
                                                    'total' => 'Rp 125.000',
                                                    'status' => 'PENDING'
                                                ),
                                                array(
                                                    'invoice' => 'INV-0023',
                                                    'date' => '14 Sep 2026 11:47',
                                                    'cashier' => 'Ady',
                                                    'total' => 'Rp 78.500',
                                                    'status' => 'DECLINED'
                                                )
                                            );
                            
                            ?>
                            <table class="table">
                                <thead>
                                    <tr class="text-muted" style="font-size: 12px; letter-spacing: .8px;">
                                        <th>#NO</th>
                                        <th>INVOICE</th>
                                        <th>DATE</th>
                                        <th>CASHIER</th>
                                        <th>TOTAL</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($transactions as $data){?>
                                    <tr>
                                        <td><?=htmlspecialchars($no++)?></td>
                                        <td><?=htmlspecialchars($data['invoice'])?></td>
                                        <td><?=htmlspecialchars($data['date'])?></td>
                                        <td><?=htmlspecialchars($data['cashier'])?></td>
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