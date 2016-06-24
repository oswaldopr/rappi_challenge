<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    {load_css sheet="app"}
    {$scriptCSS}
    {load_js script="prototype"}
    {load_js script="app"}
    {$scriptJS}
    <title>&nbsp;</title>
</head>

<body>
    {$controller}
    {if $errorMessage neq ""}
    {$errorMessage}
    {elseif $input neq ""}
    <div>Input Data:</div>
    <div>{$input|nl2br}</div>
    <br />
    <div>Output Data:</div>
    <div>{$output|nl2br}</div>
    {else}
    <form id="frmInput" method="post">
        <div>Input Data:</div>
        <textarea name="taInputData" id="taInputData" rows="10"></textarea>
        <input type="button" id="btnCalculate" value="[ CALCULATE ]" />
    </form>
    {/if}
</body>
</html>