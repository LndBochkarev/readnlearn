<?php ?>



<div id='content'>
    <div id="center">
        

        <div id='translate_window'>


            <a href='http://translate.yandex.com/' style='text-decoration: none'>Powered by Yandex.Translate</a>
        </div>

        
        <button type="button" onclick="loadDoc()">Change Content</button>
        
    </div>   
    
</div>

<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                        this.responseText;
            }
        };
        xhttp.open("GET", "ajax_info.txt", true);
        xhttp.send();
    }
</script>
