    function displayDiv(id){
        var divVisibility = new String;
        var divDisplay = new String;
        divVisibility = document.getElementById(id).style.visibility;
        divDisplay = document.getElementById(id).style.display;

        console.log("visibility: " + divVisibility);
        console.log("display: " + divDisplay);

        if(divVisibility=="hidden"){
            document.getElementById(id).style.visibility = "visible";

            document.getElementById(id).style.display = "block";
        }else if(divVisibility=="visible"){
            document.getElementById(id).style.visibility = "hidden";

            document.getElementById(id).style.display = "none";
        }
    }