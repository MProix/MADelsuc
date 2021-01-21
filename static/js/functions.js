//---------------client height and width----------------------------------
var clientH = window.innerHeight;
var clientW = window.innerWidth;

//----convert units to set adaptables widths and heights----------------------
function toVh(value){
    return (100*value)/clientH;
};
function toVw(value){
    return (100*value)/clientW;
};
function vwToPx(value){
    return (clientW*value)/100;
};
function vhToPx(value){
    return (clientH*value)/100;
};

//--------------Define and actualize age----------------------------------
function getAge(date) { 
    var diff = Date.now() - date.getTime();
    var age = new Date(diff); 
    return Math.abs(age.getUTCFullYear() - 1970);
};
//--------------Open and parse json file in a programs table-----------------------
function openParseJson(listPrg, destination){
    for (let elt of listPrg){
        var newTable = document.createElement("table");
        newTable.id = elt.Name;
        newTable.classList.add("programTable");            
        for(var cle of (Object.keys(elt))){
            var newLine = document.createElement("tr");
            newLine.classList.add(cle);
            var newLineTitle = document.createElement("td");
            newLineTitle.classList.add("title");
            newLineTitle.innerHTML = cle;
            var newLineContent = document.createElement("td");
            newLineContent.classList.add("content");
            newLineContent.innerHTML = elt[cle];
            newLine.appendChild(newLineTitle);
            newLine.appendChild(newLineContent);
            newTable.appendChild(newLine);
            // console.log(cle+"-->"+elt[cle]);
        };
        $("#"+destination).append(newTable);
    }
};

//----------------Functions to sort the programs list------------------
function sortTable(data, param, sens){
    if (sens == "as"){
        data.sort(function compare(a,b){ 
            if (a[param] < b[param]) return -1; 
            if (a[param] > b[param]) return 1; 
            return 0;
        });
    } else if(sens == "de") {
        data.sort(function compare(a,b){ 
            if (a[param] > b[param]) return -1; 
            if (a[param] < b[param]) return 1; 
            return 0;
        });
    } else{
        console.log("problem");
    }
    return data;
};
//----------------Parse current url to get the current name page-----------
function parseURL(url, end){
    var begin = url.indexOf("MADelsuc")+9;
    var name = url.substring(begin, url.indexOf(end));
    if(name.indexOf("/")!=-1){
        name = "home";
    } else if(name.indexOf("index")!=-1){
        name = "home";
    } else if(name.indexOf("cv")!=-1){
        name = "CV";
    }
    return (name+'').charAt(0).toUpperCase()+name.substr(1);
};
//--------------Open and parse json file in a conferences table-----------------------
function openParseJsonConf(listConf, destination){
    var listYears = [];
    for (let elt of listConf){
        if(listYears.includes(elt.year) == false && elt.year != ""){
            listYears.push(elt.year);
        };
    listYears.sort().reverse();
    };
    for (elt of listYears){
        var newYear = document.createElement("div");
        newYear.id = "year_"+elt;
        newYear.classList.add("year");
        var newTitleYear = document.createElement("h1");
        newTitleYear.textContent = elt;
        newTitleYear.classList.add("titleYear");
        newYear.appendChild(newTitleYear);
        $("#"+destination).append(newYear);
    };
    for (let elt of listConf){
        var newConf = document.createElement("div");
        newConf.id = elt.title;
        $("#year_"+elt.year).append(newConf);
        if (elt.title != undefined && elt.title != ""){
            var newConfName = document.createElement("p");
            newConfName.id = elt.title+"_title";
            newConfName.classList.add("confName");
            newConfName.textContent =" \""+elt.title+"\" ";
            newConf.appendChild(newConfName);
        };
        if (elt.occasion != undefined && elt.occasion != ""){
            var newConfOccasion = document.createElement("p");
            newConfOccasion.classList.add("confOccasion");
            newConfOccasion.textContent = elt.occasion;
            newConf.appendChild(newConfOccasion);
        };
        if (elt.location != undefined && elt.location != ""){
            var newConfLocation = document.createElement("p");
            newConfLocation.classList.add("confLocation");
            newConfLocation.textContent = elt.location;
            newConf.appendChild(newConfLocation);
        };
        if (elt.file != undefined && elt.file != ""){
            var newConfFile = document.createElement("a");
            newConfFile.classList.add("confFile");
            newConfFile.href = "static/docs/pdf/"+elt.file;
            newConfFile.innerHTML = "<img class='left' src='./static/img/pdf.png' alt='pdf'></img>";
            newConf.appendChild(newConfFile);
        };
        if (elt.conf_type != undefined && elt.conf_type != ""){
            var newConfType = document.createElement("p");
            newConfType.classList.add("confType");
            newConfType.textContent = "("+elt.conf_type+")";
            newConf.appendChild(newConfType);
        }
    }
};
function openParseCVjson(cv, destination){
    for (const [key, value] of Object.entries(cv[0])) {
        var section = document.createElement("h1");
        section.classList.add("section");
        section.id = key;
        section.textContent = key;
        var newPartCV = document.createElement("table");
        newPartCV.classList.add("partCV");
        for(const [k, v] of Object.entries(value)){
            var tRow = document.createElement("tr");
            var year = document.createElement("td");
            year.classList.add("yearCV");
            year.innerHTML = k;
            var event = document.createElement("td");
            event.classList.add("CVEvent");
            event.innerHTML = v;
            tRow.appendChild(year);
            tRow.appendChild(event);
            newPartCV.appendChild(tRow);
        }
        $("#cv").append(section);
        $("#cv").append(newPartCV);
      }    
};
