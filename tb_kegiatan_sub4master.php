<?php
namespace PHPMaker2019\project1;
?>
<?php if ($tb_kegiatan_sub4->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_tb_kegiatan_sub4master" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub4->Visible) { // kode_kegiatan_sub4 ?>
		<tr id="r_kode_kegiatan_sub4">
			<td class="<?php echo $tb_kegiatan_sub4->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub4_kode_kegiatan_sub4">
<span<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub4->nama_kegiatan_sub4->Visible) { // nama_kegiatan_sub4 ?>
		<tr id="r_nama_kegiatan_sub4">
			<td class="<?php echo $tb_kegiatan_sub4->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub4_nama_kegiatan_sub4">
<span<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub5->Visible) { // kode_kegiatan_sub5 ?>
		<tr id="r_kode_kegiatan_sub5">
			<td class="<?php echo $tb_kegiatan_sub4->TableLeftColumnClass ?>"><?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->caption() ?></td>
			<td<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub4_kode_kegiatan_sub5">
<span<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>