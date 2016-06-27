/*
 * JS script for controller
 */
document.observe("dom:loaded",
    function(eventHandler) {
        if($("btnCalculate") != null) {
            $("btnCalculate").observe("click", submitInputData);
            $("taInputData").focus();
        }
        else
            $("btnBack").observe("click", 
                function(eventHandler) {
                    document.location = getController();
                });
    });

function submitInputData(eventHandler) {
    $("frmInput").action = getController() + "?action=calculate";
    $("frmInput").submit();
}