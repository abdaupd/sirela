<?php
namespace PHPMaker2019\project1;
?>
<?php if ($tb_kegiatan_sub1->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_tb_kegiatan_sub1master" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($tb_kegiatan_sub1->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<tr id="r_kode_kegiatan_sub1">
			<td class="<?php echo $tb_kegiatan_sub1->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub1_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub1->nama_kegiatan_sub1->Visible) { // nama_kegiatan_sub1 ?>
		<tr id="r_nama_kegiatan_sub1">
			<td class="<?php echo $tb_kegiatan_sub1->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub1_nama_kegiatan_sub1">
<span<?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub1->nama_kegiatan_sub1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub1->kode_kegiatan_sub2->Visible) { // kode_kegiatan_sub2 ?>
		<tr id="r_kode_kegiatan_sub2">
			<td class="<?php echo $tb_kegiatan_sub1->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub1_kode_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub1->kode_kegiatan_sub2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>