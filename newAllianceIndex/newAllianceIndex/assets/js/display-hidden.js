$( document ).ready(function() {
    document.getElementById("searchTypeObit").setAttribute("onClick", "displayObits()");
    console.log("Worked");
    document.getElementById("searchTypeMarriage").setAttribute("onClick", "displayMarriage()");
    document.getElementById("searchTypeNewspaper").setAttribute("onClick", "displayNewspaper()");
    document.getElementById("searchTypeScrapbook").setAttribute("onClick", "displayScrapbook()");
    document.getElementById("searchTypeCatholic").setAttribute("onClick", "displayCatholic()");
    document.getElementById("searchTypeDrop").setAttribute("style", "display: none");
    document.getElementById("form-search").setAttribute("style", "display: none");
    document.getElementById("form-search-date").setAttribute("style", "display: none");
    
    document.getElementByID("noPrintButton").setAttribute("onclick", "window.print();");
    
});
console.log("Worked");
function displayObits(){                           
    document.getElementById("searchTypeDrop").setAttribute("style", "display: block");
    document.getElementById("searchTypeDropItem1").innerHTML = "First Name";
    document.getElementById("searchTypeDropItem2").innerHTML = "Last Name";
    document.getElementById("searchTypeDropItem3").innerHTML = "Date";
    document.getElementById("searchTypeCatholic").setAttribute("onClick", "displayCatholic()");
    document.getElementById("searchTypeDropItem4").setAttribute("style", "display: none");
    
}
function displayMarriage(){                           
    document.getElementById("searchTypeDrop").setAttribute("style", "display: block");
    document.getElementById("searchTypeDropItem1").innerHTML = "Bride";
    document.getElementById("searchTypeDropItem2").innerHTML = "Groom";
    document.getElementById("searchTypeDropItem3").innerHTML = "Date";
    document.getElementById("searchTypeDropItem4").setAttribute("style", "display: none");
    
}
function displayNewspaper(){                           
    document.getElementById("searchTypeDrop").setAttribute("style", "display: block");
    document.getElementById("searchTypeDropItem1").innerHTML = "Title";
    document.getElementById("searchTypeDropItem2").innerHTML = "Subject";
    document.getElementById("searchTypeDropItem3").innerHTML = "Date";
    document.getElementById("searchTypeDropItem4").setAttribute("style", "display: block");
    document.getElementById("searchTypeDropItem4").innerHTML = "Summary";
    
}
function displayScrapbook(){                           
    document.getElementById("searchTypeDrop").setAttribute("style", "display: block");
    document.getElementById("searchTypeDropItem1").innerHTML = "Title";
    document.getElementById("searchTypeDropItem2").innerHTML = "Date";
    document.getElementById("searchTypeDropItem3").innerHTML = "Subject";
    document.getElementById("searchTypeDropItem4").setAttribute("style", "display: none");
    
}
function displayCatholic(){                           
    document.getElementById("searchTypeDrop").setAttribute("style", "display: block");
    document.getElementById("searchTypeDropItem1").innerHTML = "First Name";
    document.getElementById("searchTypeDropItem2").innerHTML = "Last Name";
    document.getElementById("searchTypeDropItem3").innerHTML = "Death Date";
    document.getElementById("searchTypeDropItem4").setAttribute("style", "display: none");
    
}
function yearOnly(){
    document.getElementByID("dateTime").setAttribute("minViewMode", "year");
}
function fullDate(){
    document.getElementByID("dateTime").removeAttribute("minViewMode");
}
