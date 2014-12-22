<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     Menu Themes
*/

echo "
<li class=\"nav-parent nav2\"><a><i class=\"fa fa-database\" aria-hidden=\"true\"></i><span>Pemesanan</span></a>
    <ul class=\"nav nav-children\">
        <li class=\"po\"><a href=\"".c_URL.$ModuleDir."dcms/po/front\">Purchase Order</a></li>
        <li class=\"bg\"><a href=\"".c_URL.$ModuleDir."dcms/bg/front\">Beli Grey</a></li>
        <li class=\"bj\"><a href=\"".c_URL.$ModuleDir."dcms/bj/front\">Beli Jadi</a></li>
        <li class=\"pp\"><a href=\"".c_URL.$ModuleDir."dcms/pp/front\">Permintaan Pencelupan</a></li>
    </ul>
</li>
<li class=\"nav-parent nav3\"><a href=\"#\"><i class=\"fa fa-cubes\" aria-hidden=\"true\"></i><span>Gudang</span></a>
    <ul class=\"nav nav-children\">                            
        <li class=\"sj\"><a href=\"".c_URL.$ModuleDir."dcms/sj/front\">Barang Masuk</a></li>
        <li class=\"nav-parent nav3-1\"><a>Stock Gudang</a>
            <ul class=\"nav nav-children\">
                <li class=\"gr\"><a href=\"".c_URL.$ModuleDir."dcms/gudang/grey\">Grey</a></li>
                <li class=\"wr\"><a href=\"".c_URL.$ModuleDir."dcms/gudang/warna\">Warna</a></li>
            </ul>
        </li>
        <li class=\"nav-parent nav3-2\"><a>Items Database</a>
            <ul class=\"nav nav-children\">
                <li class=\"ijk\"><a href=\"".c_URL.$ModuleDir."dcms/gudang/item-kain\">Jenis Kain</a></li>
                <li class=\"iwr\"><a href=\"".c_URL.$ModuleDir."dcms/gudang/item-warna\">Warna</a></li>
            </ul>
        </li>
    </ul>
</li>
<li class=\"nav-parent nav4\"><a href=\"#\"><i class=\"fa fa-copy\" aria-hidden=\"true\"></i><span>Faktur &amp; Retur</span></a>
    <ul class=\"nav nav-children\">
        <li class=\"sj\"><a href=\"".c_URL.$ModuleDir."dcms/sj/front\">Surat Jalan</a></li>
        <li class=\"fk\"><a href=\"#\">Faktur</a></li>
        <li class=\"rt\"><a href=\"#\">Retur</a></li>
    </ul>
</li>
<li class=\"rp\"><a href=\"#\"><i class=\"fa fa-bar-chart-o\" aria-hidden=\"true\"></i><span>Reports</span></a></li>
";
?>