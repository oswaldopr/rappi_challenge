<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    {load_css sheet="app"}
    {$templateCSS}
    {load_js script="prototype"}
    {load_js script="app"}
    {$templateJS}
    <title>&nbsp;</title>
</head>

<body>
    {$controller}
    {if $errorMessage neq ""}
    <div class="error">{$errorMessage}</div>
    <input type="button" id="btnBack" value="[ BACK ]" />
    {elseif $input neq ""}
    <div id="title">Input Data:</div>
    <div>{$input|upper|nl2br}</div>
    <br />
    <div id="title">Output Data:</div>
    <div>{$output|nl2br}</div>
    <input type="button" id="btnBack" value="[ BACK ]" />
    {else}
    <form id="frmInput" method="post">
        <div>Input Data:</div>
        <textarea name="taInputData" id="taInputData"></textarea>
    </form>
    <input type="button" id="btnCalculate" value="[ CALCULATE ]" />
    {/if}
</body>
</html>