$( document ).ready(function() {
    document.getElementById("searchTypeObit").setAttribute("onClick", "displayObits()");
    console.log("Worked");
    document.getElementById("searchTypeMarriage").setAttribute("onClick", "displayMarriage()");
    document.getElementById("searchTypeNewspaper").setAttribute("onClick", "displayNewspaper()");
    document.getElementById("searchTypeScrapbook").setAttribute("onClick", "displayScrapbook()");
    document.getElementById("searchTypeCatholic").setAttribute("onClick", "displayCatholic()");
    document.getElementById("searchTypeDrop").setAttribute("style", "display: none");
    
});
console.log("Worked");
function displayObits(){                           
    document.getElementById("searchTypeDrop").setAttribute("style", "display: block");
    document.getElementById("searchTypeDropItem1").innerHTML = "First Name";
    document.getElementById("searchTypeDropItem2").innerHTML = "Last Name";
    document.getElementById("searchTypeDropItem3").innerHTML = "Date";
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
    document.getElementById("searchTypeDropItem2").innerHTML = "Date";
    document.getElementById("searchTypeDropItem3").innerHTML = "Subject";
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
function URL_add_parameter(url, param, value){
    var hash       = {};
    var parser     = document.createElement('a');

    parser.href    = url;

    var parameters = parser.search.split(/\?|&/);

    for(var i=0; i < parameters.length; i++) {
        if(!parameters[i])
            continue;

        var ary      = parameters[i].split('=');
        hash[ary[0]] = ary[1];
    }

    hash[param] = value;

    var list = [];  
    Object.keys(hash).forEach(function (key) {
        list.push(key + '=' + hash[key]);
    });

    parser.search = '?' + list.join('&');
    return parser.href;
}
