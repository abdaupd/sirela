<?php
namespace PHPMaker2019\project1;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($tb_kegiatan_sub2_grid))
	$tb_kegiatan_sub2_grid = new tb_kegiatan_sub2_grid();

// Run the page
$tb_kegiatan_sub2_grid->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub2_grid->Page_Render();
?>
<?php if (!$tb_kegiatan_sub2->isExport()) { ?>
<script>

// Form object
var ftb_kegiatan_sub2grid = new ew.Form("ftb_kegiatan_sub2grid", "grid");
ftb_kegiatan_sub2grid.formKeyCountName = '<?php echo $tb_kegiatan_sub2_grid->FormKeyCountName ?>';

// Validate form
ftb_kegiatan_sub2grid.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($tb_kegiatan_sub2_grid->kode_kegiatan_sub2->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub2->kode_kegiatan_sub2->caption(), $tb_kegiatan_sub2->kode_kegiatan_sub2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_sub2_grid->nama_kegiatan_sub2->Required) { ?>
			elm = this.getElements("x" + infix + "_nama_kegiatan_sub2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub2->nama_kegiatan_sub2->caption(), $tb_kegiatan_sub2->nama_kegiatan_sub2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_sub2_grid->kode_kegiatan_sub3->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub2->kode_kegiatan_sub3->caption(), $tb_kegiatan_sub2->kode_kegiatan_sub3->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ftb_kegiatan_sub2grid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "kode_kegiatan_sub2", false)) return false;
	if (ew.valueChanged(fobj, infix, "nama_kegiatan_sub2", false)) return false;
	if (ew.valueChanged(fobj, infix, "kode_kegiatan_sub3", false)) return false;
	return true;
}

// Form_CustomValidate event
ftb_kegiatan_sub2grid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub2grid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatan_sub2grid.lists["x_kode_kegiatan_sub3"] = <?php echo $tb_kegiatan_sub2_grid->kode_kegiatan_sub3->Lookup->toClientList() ?>;
ftb_kegiatan_sub2grid.lists["x_kode_kegiatan_sub3"].options = <?php echo JsonEncode($tb_kegiatan_sub2_grid->kode_kegiatan_sub3->lookupOptions()) ?>;
ftb_kegiatan_sub2grid.autoSuggests["x_kode_kegiatan_sub3"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$tb_kegiatan_sub2_grid->renderOtherOptions();
?>
<?php $tb_kegiatan_sub2_grid->showPageHeader(); ?>
<?php
$tb_kegiatan_sub2_grid->showMessage();
?>
<?php if ($tb_kegiatan_sub2_grid->TotalRecs > 0 || $tb_kegiatan_sub2->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($tb_kegiatan_sub2_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_kegiatan_sub2">
<div id="ftb_kegiatan_sub2grid" class="ew-form ew-list-form form-inline">
<div id="gmp_tb_kegiatan_sub2" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_tb_kegiatan_sub2grid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$tb_kegiatan_sub2_grid->RowType = ROWTYPE_HEADER;

// Render list options
$tb_kegiatan_sub2_grid->renderListOptions();

// Render list options (header, left)
$tb_kegiatan_sub2_grid->ListOptions->render("header", "left");
?>
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub2->Visible) { // kode_kegiatan_sub2 ?>
	<?php if ($tb_kegiatan_sub2->sortUrl($tb_kegiatan_sub2->kode_kegiatan_sub2) == "") { ?>
		<th data-name="kode_kegiatan_sub2" class="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->headerCellClass() ?>"><div id="elh_tb_kegiatan_sub2_kode_kegiatan_sub2" class="tb_kegiatan_sub2_kode_kegiatan_sub2"><div class="ew-table-header-caption"><?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_kegiatan_sub2" class="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->headerCellClass() ?>"><div><div id="elh_tb_kegiatan_sub2_kode_kegiatan_sub2" class="tb_kegiatan_sub2_kode_kegiatan_sub2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan_sub2->kode_kegiatan_sub2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan_sub2->kode_kegiatan_sub2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan_sub2->nama_kegiatan_sub2->Visible) { // nama_kegiatan_sub2 ?>
	<?php if ($tb_kegiatan_sub2->sortUrl($tb_kegiatan_sub2->nama_kegiatan_sub2) == "") { ?>
		<th data-name="nama_kegiatan_sub2" class="<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->headerCellClass() ?>"><div id="elh_tb_kegiatan_sub2_nama_kegiatan_sub2" class="tb_kegiatan_sub2_nama_kegiatan_sub2"><div class="ew-table-header-caption"><?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama_kegiatan_sub2" class="<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->headerCellClass() ?>"><div><div id="elh_tb_kegiatan_sub2_nama_kegiatan_sub2" class="tb_kegiatan_sub2_nama_kegiatan_sub2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan_sub2->nama_kegiatan_sub2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan_sub2->nama_kegiatan_sub2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->Visible) { // kode_kegiatan_sub3 ?>
	<?php if ($tb_kegiatan_sub2->sortUrl($tb_kegiatan_sub2->kode_kegiatan_sub3) == "") { ?>
		<th data-name="kode_kegiatan_sub3" class="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->headerCellClass() ?>"><div id="elh_tb_kegiatan_sub2_kode_kegiatan_sub3" class="tb_kegiatan_sub2_kode_kegiatan_sub3"><div class="ew-table-header-caption"><?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode_kegiatan_sub3" class="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->headerCellClass() ?>"><div><div id="elh_tb_kegiatan_sub2_kode_kegiatan_sub3" class="tb_kegiatan_sub2_kode_kegiatan_sub3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->caption() ?></span><span class="ew-table-header-sort"><?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($tb_kegiatan_sub2->kode_kegiatan_sub3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$tb_kegiatan_sub2_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$tb_kegiatan_sub2_grid->StartRec = 1;
$tb_kegiatan_sub2_grid->StopRec = $tb_kegiatan_sub2_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $tb_kegiatan_sub2_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($tb_kegiatan_sub2_grid->FormKeyCountName) && ($tb_kegiatan_sub2->isGridAdd() || $tb_kegiatan_sub2->isGridEdit() || $tb_kegiatan_sub2->isConfirm())) {
		$tb_kegiatan_sub2_grid->KeyCount = $CurrentForm->getValue($tb_kegiatan_sub2_grid->FormKeyCountName);
		$tb_kegiatan_sub2_grid->StopRec = $tb_kegiatan_sub2_grid->StartRec + $tb_kegiatan_sub2_grid->KeyCount - 1;
	}
}
$tb_kegiatan_sub2_grid->RecCnt = $tb_kegiatan_sub2_grid->StartRec - 1;
if ($tb_kegiatan_sub2_grid->Recordset && !$tb_kegiatan_sub2_grid->Recordset->EOF) {
	$tb_kegiatan_sub2_grid->Recordset->moveFirst();
	$selectLimit = $tb_kegiatan_sub2_grid->UseSelectLimit;
	if (!$selectLimit && $tb_kegiatan_sub2_grid->StartRec > 1)
		$tb_kegiatan_sub2_grid->Recordset->move($tb_kegiatan_sub2_grid->StartRec - 1);
} elseif (!$tb_kegiatan_sub2->AllowAddDeleteRow && $tb_kegiatan_sub2_grid->StopRec == 0) {
	$tb_kegiatan_sub2_grid->StopRec = $tb_kegiatan_sub2->GridAddRowCount;
}

// Initialize aggregate
$tb_kegiatan_sub2->RowType = ROWTYPE_AGGREGATEINIT;
$tb_kegiatan_sub2->resetAttributes();
$tb_kegiatan_sub2_grid->renderRow();
if ($tb_kegiatan_sub2->isGridAdd())
	$tb_kegiatan_sub2_grid->RowIndex = 0;
if ($tb_kegiatan_sub2->isGridEdit())
	$tb_kegiatan_sub2_grid->RowIndex = 0;
while ($tb_kegiatan_sub2_grid->RecCnt < $tb_kegiatan_sub2_grid->StopRec) {
	$tb_kegiatan_sub2_grid->RecCnt++;
	if ($tb_kegiatan_sub2_grid->RecCnt >= $tb_kegiatan_sub2_grid->StartRec) {
		$tb_kegiatan_sub2_grid->RowCnt++;
		if ($tb_kegiatan_sub2->isGridAdd() || $tb_kegiatan_sub2->isGridEdit() || $tb_kegiatan_sub2->isConfirm()) {
			$tb_kegiatan_sub2_grid->RowIndex++;
			$CurrentForm->Index = $tb_kegiatan_sub2_grid->RowIndex;
			if ($CurrentForm->hasValue($tb_kegiatan_sub2_grid->FormActionName) && $tb_kegiatan_sub2_grid->EventCancelled)
				$tb_kegiatan_sub2_grid->RowAction = strval($CurrentForm->getValue($tb_kegiatan_sub2_grid->FormActionName));
			elseif ($tb_kegiatan_sub2->isGridAdd())
				$tb_kegiatan_sub2_grid->RowAction = "insert";
			else
				$tb_kegiatan_sub2_grid->RowAction = "";
		}

		// Set up key count
		$tb_kegiatan_sub2_grid->KeyCount = $tb_kegiatan_sub2_grid->RowIndex;

		// Init row class and style
		$tb_kegiatan_sub2->resetAttributes();
		$tb_kegiatan_sub2->CssClass = "";
		if ($tb_kegiatan_sub2->isGridAdd()) {
			if ($tb_kegiatan_sub2->CurrentMode == "copy") {
				$tb_kegiatan_sub2_grid->loadRowValues($tb_kegiatan_sub2_grid->Recordset); // Load row values
				$tb_kegiatan_sub2_grid->setRecordKey($tb_kegiatan_sub2_grid->RowOldKey, $tb_kegiatan_sub2_grid->Recordset); // Set old record key
			} else {
				$tb_kegiatan_sub2_grid->loadRowValues(); // Load default values
				$tb_kegiatan_sub2_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$tb_kegiatan_sub2_grid->loadRowValues($tb_kegiatan_sub2_grid->Recordset); // Load row values
		}
		$tb_kegiatan_sub2->RowType = ROWTYPE_VIEW; // Render view
		if ($tb_kegiatan_sub2->isGridAdd()) // Grid add
			$tb_kegiatan_sub2->RowType = ROWTYPE_ADD; // Render add
		if ($tb_kegiatan_sub2->isGridAdd() && $tb_kegiatan_sub2->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$tb_kegiatan_sub2_grid->restoreCurrentRowFormValues($tb_kegiatan_sub2_grid->RowIndex); // Restore form values
		if ($tb_kegiatan_sub2->isGridEdit()) { // Grid edit
			if ($tb_kegiatan_sub2->EventCancelled)
				$tb_kegiatan_sub2_grid->restoreCurrentRowFormValues($tb_kegiatan_sub2_grid->RowIndex); // Restore form values
			if ($tb_kegiatan_sub2_grid->RowAction == "insert")
				$tb_kegiatan_sub2->RowType = ROWTYPE_ADD; // Render add
			else
				$tb_kegiatan_sub2->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($tb_kegiatan_sub2->isGridEdit() && ($tb_kegiatan_sub2->RowType == ROWTYPE_EDIT || $tb_kegiatan_sub2->RowType == ROWTYPE_ADD) && $tb_kegiatan_sub2->EventCancelled) // Update failed
			$tb_kegiatan_sub2_grid->restoreCurrentRowFormValues($tb_kegiatan_sub2_grid->RowIndex); // Restore form values
		if ($tb_kegiatan_sub2->RowType == ROWTYPE_EDIT) // Edit row
			$tb_kegiatan_sub2_grid->EditRowCnt++;
		if ($tb_kegiatan_sub2->isConfirm()) // Confirm row
			$tb_kegiatan_sub2_grid->restoreCurrentRowFormValues($tb_kegiatan_sub2_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$tb_kegiatan_sub2->RowAttrs = array_merge($tb_kegiatan_sub2->RowAttrs, array('data-rowindex'=>$tb_kegiatan_sub2_grid->RowCnt, 'id'=>'r' . $tb_kegiatan_sub2_grid->RowCnt . '_tb_kegiatan_sub2', 'data-rowtype'=>$tb_kegiatan_sub2->RowType));

		// Render row
		$tb_kegiatan_sub2_grid->renderRow();

		// Render list options
		$tb_kegiatan_sub2_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tb_kegiatan_sub2_grid->RowAction <> "delete" && $tb_kegiatan_sub2_grid->RowAction <> "insertdelete" && !($tb_kegiatan_sub2_grid->RowAction == "insert" && $tb_kegiatan_sub2->isConfirm() && $tb_kegiatan_sub2_grid->emptyRow())) {
?>
	<tr<?php echo $tb_kegiatan_sub2->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_kegiatan_sub2_grid->ListOptions->render("body", "left", $tb_kegiatan_sub2_grid->RowCnt);
?>
	<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub2->Visible) { // kode_kegiatan_sub2 ?>
		<td data-name="kode_kegiatan_sub2"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->cellAttributes() ?>>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub2" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub2">
<input type="text" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->EditValue ?>"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->OldValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub2" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub2->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->CurrentValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub2" class="tb_kegiatan_sub2_kode_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->getViewValue() ?></span>
</span>
<?php if (!$tb_kegiatan_sub2->isConfirm()) { ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="ftb_kegiatan_sub2grid$x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="ftb_kegiatan_sub2grid$x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="ftb_kegiatan_sub2grid$o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="ftb_kegiatan_sub2grid$o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tb_kegiatan_sub2->nama_kegiatan_sub2->Visible) { // nama_kegiatan_sub2 ?>
		<td data-name="nama_kegiatan_sub2"<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->cellAttributes() ?>>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_nama_kegiatan_sub2" class="form-group tb_kegiatan_sub2_nama_kegiatan_sub2">
<input type="text" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->EditValue ?>"<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->OldValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_nama_kegiatan_sub2" class="form-group tb_kegiatan_sub2_nama_kegiatan_sub2">
<input type="text" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->EditValue ?>"<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_nama_kegiatan_sub2" class="tb_kegiatan_sub2_nama_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->getViewValue() ?></span>
</span>
<?php if (!$tb_kegiatan_sub2->isConfirm()) { ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="ftb_kegiatan_sub2grid$x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="ftb_kegiatan_sub2grid$x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="ftb_kegiatan_sub2grid$o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="ftb_kegiatan_sub2grid$o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->Visible) { // kode_kegiatan_sub3 ?>
		<td data-name="kode_kegiatan_sub3"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->cellAttributes() ?>>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->getSessionValue() <> "") { ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub3" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub3" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub3">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" class="text-nowrap" style="z-index: <?php echo (9000 - $tb_kegiatan_sub2_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="sv_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" data-value-separator="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->displayValueSeparatorAttribute() ?>" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatan_sub2grid.createAutoSuggest({"id":"x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3","forceSelect":false});
</script>
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->Lookup->getParamTag("p_x" . $tb_kegiatan_sub2_grid->RowIndex . "_kode_kegiatan_sub3") ?>
</span>
<?php } ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->OldValue) ?>">
<?php } ?>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->getSessionValue() <> "") { ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub3" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub3" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub3">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" class="text-nowrap" style="z-index: <?php echo (9000 - $tb_kegiatan_sub2_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="sv_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" data-value-separator="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->displayValueSeparatorAttribute() ?>" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatan_sub2grid.createAutoSuggest({"id":"x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3","forceSelect":false});
</script>
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->Lookup->getParamTag("p_x" . $tb_kegiatan_sub2_grid->RowIndex . "_kode_kegiatan_sub3") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $tb_kegiatan_sub2_grid->RowCnt ?>_tb_kegiatan_sub2_kode_kegiatan_sub3" class="tb_kegiatan_sub2_kode_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->viewAttributes() ?>>
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->getViewValue() ?></span>
</span>
<?php if (!$tb_kegiatan_sub2->isConfirm()) { ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" name="ftb_kegiatan_sub2grid$x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="ftb_kegiatan_sub2grid$x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->FormValue) ?>">
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" name="ftb_kegiatan_sub2grid$o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="ftb_kegiatan_sub2grid$o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_kegiatan_sub2_grid->ListOptions->render("body", "right", $tb_kegiatan_sub2_grid->RowCnt);
?>
	</tr>
<?php if ($tb_kegiatan_sub2->RowType == ROWTYPE_ADD || $tb_kegiatan_sub2->RowType == ROWTYPE_EDIT) { ?>
<script>
ftb_kegiatan_sub2grid.updateLists(<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$tb_kegiatan_sub2->isGridAdd() || $tb_kegiatan_sub2->CurrentMode == "copy")
		if (!$tb_kegiatan_sub2_grid->Recordset->EOF)
			$tb_kegiatan_sub2_grid->Recordset->moveNext();
}
?>
<?php
	if ($tb_kegiatan_sub2->CurrentMode == "add" || $tb_kegiatan_sub2->CurrentMode == "copy" || $tb_kegiatan_sub2->CurrentMode == "edit") {
		$tb_kegiatan_sub2_grid->RowIndex = '$rowindex$';
		$tb_kegiatan_sub2_grid->loadRowValues();

		// Set row properties
		$tb_kegiatan_sub2->resetAttributes();
		$tb_kegiatan_sub2->RowAttrs = array_merge($tb_kegiatan_sub2->RowAttrs, array('data-rowindex'=>$tb_kegiatan_sub2_grid->RowIndex, 'id'=>'r0_tb_kegiatan_sub2', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($tb_kegiatan_sub2->RowAttrs["class"], "ew-template");
		$tb_kegiatan_sub2->RowType = ROWTYPE_ADD;

		// Render row
		$tb_kegiatan_sub2_grid->renderRow();

		// Render list options
		$tb_kegiatan_sub2_grid->renderListOptions();
		$tb_kegiatan_sub2_grid->StartRowCnt = 0;
?>
	<tr<?php echo $tb_kegiatan_sub2->rowAttributes() ?>>
<?php

// Render list options (body, left)
$tb_kegiatan_sub2_grid->ListOptions->render("body", "left", $tb_kegiatan_sub2_grid->RowIndex);
?>
	<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub2->Visible) { // kode_kegiatan_sub2 ?>
		<td data-name="kode_kegiatan_sub2">
<?php if (!$tb_kegiatan_sub2->isConfirm()) { ?>
<span id="el$rowindex$_tb_kegiatan_sub2_kode_kegiatan_sub2" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub2">
<input type="text" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->EditValue ?>"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_sub2_kode_kegiatan_sub2" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tb_kegiatan_sub2->nama_kegiatan_sub2->Visible) { // nama_kegiatan_sub2 ?>
		<td data-name="nama_kegiatan_sub2">
<?php if (!$tb_kegiatan_sub2->isConfirm()) { ?>
<span id="el$rowindex$_tb_kegiatan_sub2_nama_kegiatan_sub2" class="form-group tb_kegiatan_sub2_nama_kegiatan_sub2">
<input type="text" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->EditValue ?>"<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_sub2_nama_kegiatan_sub2" class="form-group tb_kegiatan_sub2_nama_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->nama_kegiatan_sub2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_nama_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->Visible) { // kode_kegiatan_sub3 ?>
		<td data-name="kode_kegiatan_sub3">
<?php if (!$tb_kegiatan_sub2->isConfirm()) { ?>
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->getSessionValue() <> "") { ?>
<span id="el$rowindex$_tb_kegiatan_sub2_kode_kegiatan_sub3" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_sub2_kode_kegiatan_sub3" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub3">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" class="text-nowrap" style="z-index: <?php echo (9000 - $tb_kegiatan_sub2_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="sv_x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" data-value-separator="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->displayValueSeparatorAttribute() ?>" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatan_sub2grid.createAutoSuggest({"id":"x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3","forceSelect":false});
</script>
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->Lookup->getParamTag("p_x" . $tb_kegiatan_sub2_grid->RowIndex . "_kode_kegiatan_sub3") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_tb_kegiatan_sub2_kode_kegiatan_sub3" class="form-group tb_kegiatan_sub2_kode_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" name="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="x<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" name="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" id="o<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tb_kegiatan_sub2_grid->ListOptions->render("body", "right", $tb_kegiatan_sub2_grid->RowIndex);
?>
<script>
ftb_kegiatan_sub2grid.updateLists(<?php echo $tb_kegiatan_sub2_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($tb_kegiatan_sub2->CurrentMode == "add" || $tb_kegiatan_sub2->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $tb_kegiatan_sub2_grid->FormKeyCountName ?>" id="<?php echo $tb_kegiatan_sub2_grid->FormKeyCountName ?>" value="<?php echo $tb_kegiatan_sub2_grid->KeyCount ?>">
<?php echo $tb_kegiatan_sub2_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tb_kegiatan_sub2->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $tb_kegiatan_sub2_grid->FormKeyCountName ?>" id="<?php echo $tb_kegiatan_sub2_grid->FormKeyCountName ?>" value="<?php echo $tb_kegiatan_sub2_grid->KeyCount ?>">
<?php echo $tb_kegiatan_sub2_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tb_kegiatan_sub2->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ftb_kegiatan_sub2grid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($tb_kegiatan_sub2_grid->Recordset)
	$tb_kegiatan_sub2_grid->Recordset->Close();
?>
</div>
<?php if ($tb_kegiatan_sub2_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $tb_kegiatan_sub2_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($tb_kegiatan_sub2_grid->TotalRecs == 0 && !$tb_kegiatan_sub2->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $tb_kegiatan_sub2_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$tb_kegiatan_sub2_grid->terminate();
?>