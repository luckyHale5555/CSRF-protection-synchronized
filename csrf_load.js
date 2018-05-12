
function onLoad()
{
    var xhttp = new XMLHttpRequest(); 
    xhttp.onreadystatechange = function()
    {
        if(this.readyState==4 && this.status==200)
        {
            console.log("CSRF token scuessfully fetched : "+this.responseText);
            document.getElementById("csrfToken").value = this.responseText;
            //return response
            
            
        }
    };

    xhttp.open("POST","server.php",true);
    xhttp.send();
}

