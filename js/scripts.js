/**
 * Inhalt des Suchfeldes wird in der Datenbank gesucht. Der Suchwert wird in allen Artikeln gesucht.
 * @param str
 * @returns
 */
function searchFunc(str) {
	//Wenn kein Zeichen im Suchfeld
	if (str.length == 0) {
	    document.getElementById('data').innerHTML = "";
	} 
	else 
	{
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.responseType = 'json';
	    xmlhttp.onreadystatechange = function() 
	    {
	    	//Wenn XML Aufruf erfolgreich war
		    if (xmlhttp.readyState === 4) 
		    {
		    	//Resultat des Ajax Aufruf in resut speichern
		        var result = xmlhttp.response;
		        var options = "";
		        for (suggest in result) {
		          options += '<option id='+result[suggest].id+' value="'+result[suggest].titel+'" />';
		        }
		        if (options != null) {
		          document.getElementById('data').innerHTML = options;
		        }
		    }
	    }
	    //Ajax Aufruf ausführen
	    xmlhttp.open("GET", "ajax.php?search=" + str, true);
	    xmlhttp.send();
	 }
}
/**
 * Diese Funktion wird ausgelöst, wenn aus der Datalist eine Option selektiert wird.
 * Und damit wird erkannt, was ausgewählt wurde.
 * 
 * @returns
 */
function getInput() {
	var val = document.getElementById("search").value;
    var opts = document.getElementById('data').childNodes;
    for (var i = 0; i < opts.length; i++) {
      if (opts[i].value === val) {
        //Ein Item aus der Liste wurde selektiert
        //Link öffnen
        window.open("http://owncms/index.php?action=showArticle&id="+opts[i].id,"_self")
        break;
      }
    }
}