document.observe("dom:loaded",
	function(eventHandler) {
        $("btnCalculate").observe("click", submitInputData);
        $("taInputData").focus();
	});

function submitInputData(eventHandler) {
    $("frmInput").action = getController() + "?action=calculate";
    $("frmInput").submit();
}