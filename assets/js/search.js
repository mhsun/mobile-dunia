function showHint(brand) {
	var brn = document.getElementById("brn");
	var price = document.getElementById("price");
	var stat = document.getElementById("used");
	var ar = document.getElementById("area");
	
	if (brand == "brand") {
		price.style.display = "none";
		ar.style.display = "none";
		stat.style.display = "none";
		brn.style.display = "inline-block";
	} else if (brand == "price") {
		brn.style.display = "none";
		ar.style.display = "none";
		stat.style.display = "none";
		price.style.display = "inline-block";	
	} else if (brand == "type") {
		price.style.display = "none";
		ar.style.display = "none";
		brn.style.display = "none";
		stat.style.display = "inline-block";
	} else if (brand == "area") {
		price.style.display = "none";
		brn.style.display = "none";
		stat.style.display = "none";
		ar.style.display = "inline-block";
	}  else if (brand == "all" || brand == "0") {
		price.style.display = "none";
		brn.style.display = "none";
		stat.style.display = "none";
		ar.style.display = "none";
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			  document.getElementById("txtHint").innerHTML=this.responseText;
			}
		  }
		xmlhttp.open("GET","all.php",true);
		xmlhttp.send();
		}
}

function showDealerHint(brand) {
	var brn = document.getElementById("brn");
	var price = document.getElementById("price");
	var ar = document.getElementById("area");
	
	if (brand == "brand") {
		price.style.display = "none";
		ar.style.display = "none";
		brn.style.display = "inline-block";
	} else if (brand == "price") {
		brn.style.display = "none";
		ar.style.display = "none";
		price.style.display = "inline-block";	
	} else if (brand == "area") {
		price.style.display = "none";
		brn.style.display = "none";
		ar.style.display = "inline-block";
	}  else if (brand == "all" || brand == "0") {
		price.style.display = "none";
		brn.style.display = "none";
		ar.style.display = "none";
		 
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			  document.getElementById("txtHint").innerHTML=this.responseText;
			}
		  }
		xmlhttp.open("GET","deal_all.php",true);
		xmlhttp.send();
		}
}

function showBrand(str) {
  if (str=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
  } 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("txtHint").innerHTML=this.responseText;
	}
  }
  xmlhttp.open("GET","brand.php?brand="+str,true);
  xmlhttp.send();
}


function showPrice(str) {
  if (str=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
  } 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("txtHint").innerHTML=this.responseText;
	}
  }
  xmlhttp.open("GET","price.php?price="+str,true);
  xmlhttp.send();
}


function showType(str) {
  if (str=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
  } 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("txtHint").innerHTML=this.responseText;
	}
  }
  xmlhttp.open("GET","used.php?used="+str,true);
  xmlhttp.send();
}


function showArea(ar) {
  if (ar=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
  } 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("txtHint").innerHTML=this.responseText;
	}
  }
  xmlhttp.open("GET","area.php?area="+ar,true);
  xmlhttp.send();
}

function showDealerBrand(str) {
  if (str=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
  } 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("txtHint").innerHTML=this.responseText;
	}
  }
  xmlhttp.open("GET","d_brand.php?brand="+str,true);
  xmlhttp.send();
}


function showDealerPrice(str) {
  if (str=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
  } 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("txtHint").innerHTML=this.responseText;
	}
  }
  xmlhttp.open("GET","d_price.php?price="+str,true);
  xmlhttp.send();
}

function showDealerArea(ar) {
  if (ar=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
  } 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	  document.getElementById("txtHint").innerHTML=this.responseText;
	}
  }
  xmlhttp.open("GET","d_area.php?area="+ar,true);
  xmlhttp.send();
}