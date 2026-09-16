<aside class="sidebar mysidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="visible-xs-block" style="height: 55px;"></li>
            <li class="hidden-xs" style="padding: 10px 15px;">
                <table>
                    <tr>
                        <td style="position: relative; width: 1px; padding: 0;">
                            <img src="./assets/img/placeholder.jpeg" class="img-circle" style="border: solid 3px #ddd; width: 80px; height: 80px;" alt="photo-profile">
                            <span style="background-color: #00b300; position: absolute; right: 2px; bottom: 2px; height: 18px; width: 18px; border-radius: 50%;"></span>
                        </td>
                        <td style="vertical-align: middle; padding-left: 12px;">
                            <p style="margin: 0;"><strong><?= isset($_SESSION['user_id']) ? htmlspecialchars($firstname) : 'Gunawan'; ?></strong></p>
                            <small class="text-capitalize text-muted"><?= isset($role) ? htmlspecialchars($role) : 'admin'; ?></small>
                        </td>
                    </tr>
                </table>
            </li>
            <li>
                <a class="btn btn-link text-muted disabled text-uppercase" style="background-color: rgb(19,16,32); font-size: 11px; letter-spacing: 1px; text-align: left !important;"><strong>Main</strong></a>
            </li>
            <li>
                <a href="?page=cashier" class="<?= isset($page) && empty($page) ? 'active' : '' ; ?>"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
            </li>
            <li>
                <a href="?page=transaksi-baru" class="<?= isset($page) && empty($page) ? 'active' : '' ; ?>"><i class="fa fa-plus fa-fw"></i>&nbsp;Transaksi Baru</a>
            </li>
            <li>
                <a href="?page=riwayat-transaksi" class="<?= isset($page) && empty($page) ? 'active' : '' ; ?>"><i class="fa fa-history fa-fw"></i>&nbsp;Riwayat Transaksi</a>
            </li>
        </ul>
    </div>
</aside>