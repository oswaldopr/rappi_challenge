<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    {load_css sheet="app"}
    {$scriptCSS}
    {$scriptJS}
    <title>{$appName} :: {$appProject}</title>
</head>

<body>
    <h1>{$appName}</h1>
    <h2>{$appProject}</h2>
    <iframe id="ifrController" src="{$require}"></iframe>
</body>
</html>