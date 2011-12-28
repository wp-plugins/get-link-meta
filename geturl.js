function getURL (blogurl)
{
var adress = blogurl + "?linkurl=";
var link =  document.getElementById('link_url').value
var getUrlLink = adress + link
   ifrm = document.createElement("IFRAME"); 
   ifrm.setAttribute("src", getUrlLink); 
   ifrm.style.width = 95+"%"; 
   ifrm.style.height = 200+"px"; 
document.getElementById('descriptionframe').replaceChild(ifrm, document.getElementById('descriptionframe').firstChild)
//document.getElementById('descriptionframe').replaceChild(ifrm);
}


