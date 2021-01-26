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
function openParsePublisjson(url, destination){
    $.getJSON( url, function( data ) {
        $.each( data, function( key, val ) {
            var newPubli = document.createElement("table");
            newPubli.classList.add("tablePublis");
            var tRow1 = document.createElement("tr");
            var title = document.createElement("td");
            title.classList.add("titlePubli");
            title.id = val.title;
            title.innerHTML = val.title;
            title.colSpan = 3;
            var listAuth = [];
            $.each(val.author, function(k,v){
                var reg=new RegExp("[ -]+", "g");
                var dropPar ="";
                var family ="";
                var given="";
                if(v.dropping_particle != undefined){
                    var dropPar = v.dropping_particle;
                }
                if(v.family != undefined){
                    var family = v.family;
                }  
                if(v.given != undefined){
                    if(v.given.indexOf("-") != -1){
                        given = v.given.split(reg);
                        var g = "";
                        for(let i=0; i<given.length;i+=1){
                            if(i<given.length-1){
                                g += given[i][0]+"-";
                            } else{
                                g += given[i][0]+".";
                            } 
                        }
                        given = g;
                    } else if(v.given.indexOf(" ") != -1){
                        given = v.given.split(reg);
                        var g = "";
                        for(let i=0; i<given.length;i+=1){
                            if(i<given.length-1){
                                g += given[i][0]+". ";
                            } else{
                                g += given[i][0]+".";
                            } 
                        }
                        given = g;
                    } else if(v.given[1]=="."){
                        given = v.given;
                    } else{
                        given = v.given[0]+".";
                    }
                }
                var name = dropPar+" "+family+" "+given;
                listAuth.push(name);
            });
            var tRow2 = document.createElement("tr");
            var authors = document.createElement("td");
            authors.classList.add("authorsPubli");
            authors.innerHTML = listAuth.join(", ");
            authors.colSpan = 3;
            var container_title = document.createElement("span");
            container_title.classList.add("container_titlePubli");
            if(val.container_title != undefined){
                container_title.innerHTML = val.container_title;
            } else if(val.page != undefined){
                container_title.innerHTML = "p "+val.page+". ";
                if(val.publisher != undefined){
                    container_title.innerHTML = container_title.innerHTML +"<span class='nonItalic'>"+val.publisher+"</span>";
                };
            };
            var tRow4 = document.createElement("tr");
            tRow4.classList.add("dontcolspan");
            var tRow4td = document.createElement("td");
            tRow4td.classList.add("tRow4td");
            var year = document.createElement("span");
            year.classList.add("yearPubli");
            try {
                year.innerHTML = "("+val.issued.date_parts[0][0]+")";
            } catch (error) {
                console.error(val);
                // expected output: ReferenceError: nonExistentFunction is not defined
                // Note - error messages will vary depending on browser
              }
            var doi = document.createElement("span");
            var volume = document.createElement("span");
            var page = document.createElement("span");
            if(val.DOI != undefined){
                var doiLink = document.createElement("a");
                doiLink.classList.add("linkPubli");
                doiLink.href = val.URL;
                doiLink.textContent = val.DOI;
                doi.appendChild(doiLink);
            } else if(val.volume != undefined){
                volume.classList.add("bold");
                volume.textContent = val.volume;
                if(val.page != undefined){
                    page.textContent = " p "+val.page+". ";
                };
            };
            tRow1.appendChild(title);
            newPubli.appendChild(tRow1);
            tRow2.appendChild(authors);
            newPubli.appendChild(tRow2);
            tRow4td.appendChild(year);
            tRow4td.appendChild(container_title);
            tRow4td.appendChild(volume);
            tRow4td.appendChild(page);
            tRow4td.appendChild(doi);
            tRow4.appendChild(tRow4td);
            newPubli.appendChild(tRow4);
            $("#"+destination).append(newPubli);
        }); 
        for(let elt of $(".tablePublis")){
            for(let e of elt.childNodes){
                while(e.innerHTML.indexOf("\\[")!= -1){
                    var rep1 = e.innerHTML.replace("\\[", "[");
                    var rep2 = rep1.replace("\\]", "]");
                    e.innerHTML = rep2;
                }
                while(e.innerHTML.indexOf("$^{")!= -1){
                    var rep1 = e.innerHTML.replace("$^{", "<sup>");
                    var rep2 = rep1.replace("}$", "</sup>");
                    e.innerHTML = rep2;
                }
                while(e.innerHTML.indexOf("$^")!= -1){
                    var rep1 = e.innerHTML.replace("$^", "<sup>");
                    var rep2 = rep1.replace("$", "</sup>");
                    e.innerHTML = rep2;
                }
                while(e.innerHTML.indexOf("$\\")!= -1){
                    if(e.innerHTML.indexOf("gamma") != -1){
                        var rep1 = e.innerHTML.replace("$\\","");
                        var rep2 = rep1.replace("$","");
                        var rep3 = rep2.replace("gamma","𝛄");
                        e.innerHTML = rep3;
                    }
                    if(e.innerHTML.indexOf("alpha") != -1){
                        var rep1 = e.innerHTML.replace("$\\","");
                        var rep2 = rep1.replace("$","");
                        var rep3 = rep2.replace("alpha","α");
                        e.innerHTML = rep3;
                    }
                }                
            }
        };
    });
};
