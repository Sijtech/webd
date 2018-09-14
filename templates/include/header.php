<!DOCTYPE html>
<html lang="de">
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/scripts.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <header>
    	<input list="data" type="text" id="search" onkeyup="searchFunc(this.value)" oninput="getInput()"/>
      <datalist id="data">
      </datalist>
      <h1>CMS</h1>
    </header>
    <section>
      <nav>
      	<ul>
        	<li><a href="index.php">Homepage</a></li>
        	<li><a href="admin.php">Backend</a></li>
      	</ul>
      </nav>
      <article>