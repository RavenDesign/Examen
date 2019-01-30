<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- https://stackoverflow.com/questions/6771258/what-does-meta-http-equiv-x-ua-compatible-content-ie-edge-do
      This answer was posted several years ago and now the question really should be should you even consider using the X-UA-Compatible 
      tag on your site? with the changes Microsoft has made to its browsers (more on those below).
  
      Depending upon what Microsoft browsers you support you may not need to continue using the X-UA-Compatible tag. 
      If you need to support IE9 or IE8, then I would recommend using the tag. If you only support the latest 
      browsers (IE11 and/or Edge) then I would consider dropping this tag altogether. If you use Twitter Bootstrap and need to 
      eliminate validation warnings, this tag must appear in its specified order. Additional info below:
      
      The X-UA-Compatible meta tag allows web authors to choose what version of Internet Explorer the page
      should be rendered as. IE11 has made changes to these modes; see the IE11 note below. Microsoft Edge, 
      the browser that will be released after IE11, will only honor the X-UA-Compatible meta tag in certain 
      circumstances. See the Microsoft Edge note below.
      
      According to Microsoft, when using the X-UA-Compatible tag, it should be as high as possible in your document head:
    -->
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="../../css/app.css" type="text/css" />
   <link rel="stylesheet" href="../../css/iconfonts.css" type="text/css" />
    <title>Competition Admin Web App</title>
    
    <style>
body {background-color: powderblue;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  border: 1px solid #555;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li {
  text-align: center;
  border-bottom: 1px solid #555;
}

li:last-child {
  border-bottom: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>

    
</head>
<body>
    
<header>
<nav>
    <a class="icon-home" href="/public/index.php"><span class="screen-reader-text">Back to home page</span></a>
</nav>
<h1>Competitie</h1>
</header>