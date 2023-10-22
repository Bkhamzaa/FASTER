function NavigateTo(url)
{
    
    window.location.replace(url);
}

function DisplayError(elementid,msg)
{
    document.getElementById(elementid).innerText =msg;
    document.getElementById(elementid).style.color = "red";
}

function MakeRequest(url,methodType,callbackFunction,formdata="") {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        console.log(xhr.responseText);
        callbackFunction(xhr.responseText);
    };
    xhr.open(methodType, url, true);
    xhr.send(formdata);
  }