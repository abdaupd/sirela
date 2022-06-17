<?php
namespace PHPMaker2019\project1;

/**
 * Page class
 */
class tb_kegiatan_sub3_edit extends tb_kegiatan_sub3
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{AEBA4D74-5D9D-43A3-BDE2-1E8D7036857C}";

	// Table name
	public $TableName = 'tb_kegiatan_sub3';

	// Page object name
	public $PageObjName = "tb_kegiatan_sub3_edit";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (tb_kegiatan_sub3)
		if (!isset($GLOBALS["tb_kegiatan_sub3"]) || get_class($GLOBALS["tb_kegiatan_sub3"]) == PROJECT_NAMESPACE . "tb_kegiatan_sub3") {
			$GLOBALS["tb_kegiatan_sub3"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tb_kegiatan_sub3"];
		}

		// Table object (tb_kegiatan_sub4)
		if (!isset($GLOBALS['tb_kegiatan_sub4']))
			$GLOBALS['tb_kegiatan_sub4'] = new tb_kegiatan_sub4();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tb_kegiatan_sub3');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $tb_kegiatan_sub3;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($tb_kegiatan_sub3);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "tb_kegiatan_sub3view.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['kode_kegiatan_sub3'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->kode_kegiatan_sub3->setVisibility();
		$this->nama_kegiatan_sub3->setVisibility();
		$this->kode_kegiatan_sub4->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->kode_kegiatan_sub3);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_kode_kegiatan_sub3")) {
				$this->kode_kegiatan_sub3->setFormValue($CurrentForm->getValue("x_kode_kegiatan_sub3"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("kode_kegiatan_sub3") !== NULL) {
				$this->kode_kegiatan_sub3->setQueryStringValue(Get("kode_kegiatan_sub3"));
				$loadByQuery = TRUE;
			} else {
				$this->kode_kegiatan_sub3->CurrentValue = NULL;
			}
		}

		// Set up master detail parameters
		$this->setupMasterParms();

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("tb_kegiatan_sub3list.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() <> "") // Master/detail edit
					$returnUrl = $this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "tb_kegiatan_sub3list.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed

					// Set up detail parameters
					$this->setupDetailParms();
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'kode_kegiatan_sub3' first before field var 'x_kode_kegiatan_sub3'
		$val = $CurrentForm->hasValue("kode_kegiatan_sub3") ? $CurrentForm->getValue("kode_kegiatan_sub3") : $CurrentForm->getValue("x_kode_kegiatan_sub3");
		if (!$this->kode_kegiatan_sub3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->kode_kegiatan_sub3->Visible = FALSE; // Disable update for API request
			else
				$this->kode_kegiatan_sub3->setFormValue($val);
		}

		// Check field name 'nama_kegiatan_sub3' first before field var 'x_nama_kegiatan_sub3'
		$val = $CurrentForm->hasValue("nama_kegiatan_sub3") ? $CurrentForm->getValue("nama_kegiatan_sub3") : $CurrentForm->getValue("x_nama_kegiatan_sub3");
		if (!$this->nama_kegiatan_sub3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nama_kegiatan_sub3->Visible = FALSE; // Disable update for API request
			else
				$this->nama_kegiatan_sub3->setFormValue($val);
		}

		// Check field name 'kode_kegiatan_sub4' first before field var 'x_kode_kegiatan_sub4'
		$val = $CurrentForm->hasValue("kode_kegiatan_sub4") ? $CurrentForm->getValue("kode_kegiatan_sub4") : $CurrentForm->getValue("x_kode_kegiatan_sub4");
		if (!$this->kode_kegiatan_sub4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->kode_kegiatan_sub4->Visible = FALSE; // Disable update for API request
			else
				$this->kode_kegiatan_sub4->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->kode_kegiatan_sub3->CurrentValue = $this->kode_kegiatan_sub3->FormValue;
		$this->nama_kegiatan_sub3->CurrentValue = $this->nama_kegiatan_sub3->FormValue;
		$this->kode_kegiatan_sub4->CurrentValue = $this->kode_kegiatan_sub4->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->kode_kegiatan_sub3->setDbValue($row['kode_kegiatan_sub3']);
		$this->nama_kegiatan_sub3->setDbValue($row['nama_kegiatan_sub3']);
		$this->kode_kegiatan_sub4->setDbValue($row['kode_kegiatan_sub4']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['kode_kegiatan_sub3'] = NULL;
		$row['nama_kegiatan_sub3'] = NULL;
		$row['kode_kegiatan_sub4'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("kode_kegiatan_sub3")) <> "")
			$this->kode_kegiatan_sub3->CurrentValue = $this->getKey("kode_kegiatan_sub3"); // kode_kegiatan_sub3
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// kode_kegiatan_sub3
		// nama_kegiatan_sub3
		// kode_kegiatan_sub4

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// kode_kegiatan_sub3
			$this->kode_kegiatan_sub3->ViewValue = $this->kode_kegiatan_sub3->CurrentValue;
			$curVal = strval($this->kode_kegiatan_sub3->CurrentValue);
			if ($curVal <> "") {
				$this->kode_kegiatan_sub3->ViewValue = $this->kode_kegiatan_sub3->lookupCacheOption($curVal);
				if ($this->kode_kegiatan_sub3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`kode_kegiatan_sub4`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->kode_kegiatan_sub3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->kode_kegiatan_sub3->ViewValue = $this->kode_kegiatan_sub3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->kode_kegiatan_sub3->ViewValue = $this->kode_kegiatan_sub3->CurrentValue;
					}
				}
			} else {
				$this->kode_kegiatan_sub3->ViewValue = NULL;
			}
			$this->kode_kegiatan_sub3->ViewCustomAttributes = "";

			// nama_kegiatan_sub3
			$this->nama_kegiatan_sub3->ViewValue = $this->nama_kegiatan_sub3->CurrentValue;
			$this->nama_kegiatan_sub3->ViewCustomAttributes = "";

			// kode_kegiatan_sub4
			$this->kode_kegiatan_sub4->ViewValue = $this->kode_kegiatan_sub4->CurrentValue;
			$this->kode_kegiatan_sub4->ViewCustomAttributes = "";

			// kode_kegiatan_sub3
			$this->kode_kegiatan_sub3->LinkCustomAttributes = "";
			$this->kode_kegiatan_sub3->HrefValue = "";
			$this->kode_kegiatan_sub3->TooltipValue = "";

			// nama_kegiatan_sub3
			$this->nama_kegiatan_sub3->LinkCustomAttributes = "";
			$this->nama_kegiatan_sub3->HrefValue = "";
			$this->nama_kegiatan_sub3->TooltipValue = "";

			// kode_kegiatan_sub4
			$this->kode_kegiatan_sub4->LinkCustomAttributes = "";
			$this->kode_kegiatan_sub4->HrefValue = "";
			$this->kode_kegiatan_sub4->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// kode_kegiatan_sub3
			$this->kode_kegiatan_sub3->EditAttrs["class"] = "form-control";
			$this->kode_kegiatan_sub3->EditCustomAttributes = "";
			$this->kode_kegiatan_sub3->EditValue = $this->kode_kegiatan_sub3->CurrentValue;
			$curVal = strval($this->kode_kegiatan_sub3->CurrentValue);
			if ($curVal <> "") {
				$this->kode_kegiatan_sub3->EditValue = $this->kode_kegiatan_sub3->lookupCacheOption($curVal);
				if ($this->kode_kegiatan_sub3->EditValue === NULL) { // Lookup from database
					$filterWrk = "`kode_kegiatan_sub4`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->kode_kegiatan_sub3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->kode_kegiatan_sub3->EditValue = $this->kode_kegiatan_sub3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->kode_kegiatan_sub3->EditValue = $this->kode_kegiatan_sub3->CurrentValue;
					}
				}
			} else {
				$this->kode_kegiatan_sub3->EditValue = NULL;
			}
			$this->kode_kegiatan_sub3->ViewCustomAttributes = "";

			// nama_kegiatan_sub3
			$this->nama_kegiatan_sub3->EditAttrs["class"] = "form-control";
			$this->nama_kegiatan_sub3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nama_kegiatan_sub3->CurrentValue = HtmlDecode($this->nama_kegiatan_sub3->CurrentValue);
			$this->nama_kegiatan_sub3->EditValue = HtmlEncode($this->nama_kegiatan_sub3->CurrentValue);
			$this->nama_kegiatan_sub3->PlaceHolder = RemoveHtml($this->nama_kegiatan_sub3->caption());

			// kode_kegiatan_sub4
			$this->kode_kegiatan_sub4->EditAttrs["class"] = "form-control";
			$this->kode_kegiatan_sub4->EditCustomAttributes = "";
			if ($this->kode_kegiatan_sub4->getSessionValue() <> "") {
				$this->kode_kegiatan_sub4->CurrentValue = $this->kode_kegiatan_sub4->getSessionValue();
			$this->kode_kegiatan_sub4->ViewValue = $this->kode_kegiatan_sub4->CurrentValue;
			$this->kode_kegiatan_sub4->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->kode_kegiatan_sub4->CurrentValue = HtmlDecode($this->kode_kegiatan_sub4->CurrentValue);
			$this->kode_kegiatan_sub4->EditValue = HtmlEncode($this->kode_kegiatan_sub4->CurrentValue);
			$this->kode_kegiatan_sub4->PlaceHolder = RemoveHtml($this->kode_kegiatan_sub4->caption());
			}

			// Edit refer script
			// kode_kegiatan_sub3

			$this->kode_kegiatan_sub3->LinkCustomAttributes = "";
			$this->kode_kegiatan_sub3->HrefValue = "";

			// nama_kegiatan_sub3
			$this->nama_kegiatan_sub3->LinkCustomAttributes = "";
			$this->nama_kegiatan_sub3->HrefValue = "";

			// kode_kegiatan_sub4
			$this->kode_kegiatan_sub4->LinkCustomAttributes = "";
			$this->kode_kegiatan_sub4->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->kode_kegiatan_sub3->Required) {
			if (!$this->kode_kegiatan_sub3->IsDetailKey && $this->kode_kegiatan_sub3->FormValue != NULL && $this->kode_kegiatan_sub3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kode_kegiatan_sub3->caption(), $this->kode_kegiatan_sub3->RequiredErrorMessage));
			}
		}
		if ($this->nama_kegiatan_sub3->Required) {
			if (!$this->nama_kegiatan_sub3->IsDetailKey && $this->nama_kegiatan_sub3->FormValue != NULL && $this->nama_kegiatan_sub3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nama_kegiatan_sub3->caption(), $this->nama_kegiatan_sub3->RequiredErrorMessage));
			}
		}
		if ($this->kode_kegiatan_sub4->Required) {
			if (!$this->kode_kegiatan_sub4->IsDetailKey && $this->kode_kegiatan_sub4->FormValue != NULL && $this->kode_kegiatan_sub4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kode_kegiatan_sub4->caption(), $this->kode_kegiatan_sub4->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("tb_kegiatan_sub2", $detailTblVar) && $GLOBALS["tb_kegiatan_sub2"]->DetailEdit) {
			if (!isset($GLOBALS["tb_kegiatan_sub2_grid"]))
				$GLOBALS["tb_kegiatan_sub2_grid"] = new tb_kegiatan_sub2_grid(); // Get detail page object
			$GLOBALS["tb_kegiatan_sub2_grid"]->validateGridForm();
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Begin transaction
			if ($this->getCurrentDetailTable() <> "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// kode_kegiatan_sub3
			// nama_kegiatan_sub3

			$this->nama_kegiatan_sub3->setDbValueDef($rsnew, $this->nama_kegiatan_sub3->CurrentValue, NULL, $this->nama_kegiatan_sub3->ReadOnly);

			// kode_kegiatan_sub4
			$this->kode_kegiatan_sub4->setDbValueDef($rsnew, $this->kode_kegiatan_sub4->CurrentValue, NULL, $this->kode_kegiatan_sub4->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("tb_kegiatan_sub2", $detailTblVar) && $GLOBALS["tb_kegiatan_sub2"]->DetailEdit) {
						if (!isset($GLOBALS["tb_kegiatan_sub2_grid"]))
							$GLOBALS["tb_kegiatan_sub2_grid"] = new tb_kegiatan_sub2_grid(); // Get detail page object
						$editRow = $GLOBALS["tb_kegiatan_sub2_grid"]->gridUpdate();
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() <> "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "tb_kegiatan_sub4") {
				$validMaster = TRUE;
				if (Get("fk_kode_kegiatan_sub4") !== NULL) {
					$GLOBALS["tb_kegiatan_sub4"]->kode_kegiatan_sub4->setQueryStringValue(Get("fk_kode_kegiatan_sub4"));
					$this->kode_kegiatan_sub4->setQueryStringValue($GLOBALS["tb_kegiatan_sub4"]->kode_kegiatan_sub4->QueryStringValue);
					$this->kode_kegiatan_sub4->setSessionValue($this->kode_kegiatan_sub4->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "tb_kegiatan_sub4") {
				$validMaster = TRUE;
				if (Post("fk_kode_kegiatan_sub4") !== NULL) {
					$GLOBALS["tb_kegiatan_sub4"]->kode_kegiatan_sub4->setFormValue(Post("fk_kode_kegiatan_sub4"));
					$this->kode_kegiatan_sub4->setFormValue($GLOBALS["tb_kegiatan_sub4"]->kode_kegiatan_sub4->FormValue);
					$this->kode_kegiatan_sub4->setSessionValue($this->kode_kegiatan_sub4->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "tb_kegiatan_sub4") {
				if ($this->kode_kegiatan_sub4->CurrentValue == "")
					$this->kode_kegiatan_sub4->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		if (Get(TABLE_SHOW_DETAIL) !== NULL) {
			$detailTblVar = Get(TABLE_SHOW_DETAIL);
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar <> "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("tb_kegiatan_sub2", $detailTblVar)) {
				if (!isset($GLOBALS["tb_kegiatan_sub2_grid"]))
					$GLOBALS["tb_kegiatan_sub2_grid"] = new tb_kegiatan_sub2_grid();
				if ($GLOBALS["tb_kegiatan_sub2_grid"]->DetailEdit) {
					$GLOBALS["tb_kegiatan_sub2_grid"]->CurrentMode = "edit";
					$GLOBALS["tb_kegiatan_sub2_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["tb_kegiatan_sub2_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["tb_kegiatan_sub2_grid"]->setStartRecordNumber(1);
					$GLOBALS["tb_kegiatan_sub2_grid"]->kode_kegiatan_sub3->IsDetailKey = TRUE;
					$GLOBALS["tb_kegiatan_sub2_grid"]->kode_kegiatan_sub3->CurrentValue = $this->kode_kegiatan_sub3->CurrentValue;
					$GLOBALS["tb_kegiatan_sub2_grid"]->kode_kegiatan_sub3->setSessionValue($GLOBALS["tb_kegiatan_sub2_grid"]->kode_kegiatan_sub3->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tb_kegiatan_sub3list.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_kode_kegiatan_sub3":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>