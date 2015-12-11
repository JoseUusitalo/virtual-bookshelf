"use strict";

var console, document, i, prodlist_productdivrow1, prodlist_productnamespan, prodlist_productidspan, prodlist_productdivrow2, prodlist_productdiv , sectionHead, sectionBody, prodlist_productname, prodlist_productid, prodlist_publisher, prodlist_year, prodlist_productbrief, prodean;

for(var product in json){
	
	
	prodlist_productdiv = document.createElement("a");
	prodlist_productdiv.className = "list-group-item";
	
	prodlist_productdiv.href="./bookview/"+ json[product].ProductID;
	
	
	
	prodlist_productdivrow1 = document.createElement("div");
	prodlist_productdivrow1.className = "row";
	
	
	
	
	prodlist_productname = document.createElement("div");
	prodlist_productnamespan = document.createElement("span");
	prodlist_productnamespan.id="product-name";
	prodlist_productnamespan.innerHTML = json[product].Name;
	prodlist_productname.appendChild(prodlist_productnamespan);
	
	prodlist_productidspan = document.createElement("span");
	prodlist_productidspan.id="productid";
	prodlist_productidspan.innerHTML = " [" + json[product].ProductID + "]";
	prodlist_productname.appendChild(prodlist_productidspan);
	
	prodlist_productname.className = "col-md-3";
	prodlist_productdivrow1.appendChild(prodlist_productname);
	
	
	prodlist_productid = document.createElement("div");
	
	prodlist_productid.className = "col-md-1";
	prodlist_productdivrow1.appendChild(prodlist_productid);
	
	
	prodlist_year = document.createElement("div");
	prodlist_year.innerHTML = json[product].ReleaseDate;
	prodlist_year.className = "col-md-2";
	prodlist_productdivrow1.appendChild(prodlist_year);
	
	
	prodlist_publisher = document.createElement("div");
	prodlist_publisher.innerHTML = json[product].PublisherName;
	prodlist_publisher.className = "col-md-2";
	prodlist_productdivrow1.appendChild(prodlist_publisher);
	
	
	prodean = document.createElement("div");
	prodean.innerHTML = json[0].EAN13;
	prodean.className = "col-md-1";
	prodlist_productdivrow1.appendChild(prodean);

	
	
	prodlist_productdivrow2 = document.createElement("div");
	prodlist_productdivrow2.className = "row";
	
	
	prodlist_productbrief = document.createElement("div");
	prodlist_productbrief.innerHTML = json[product].Brief;
	prodlist_productbrief.className = "col-md-12";
	prodlist_productdivrow2.appendChild(prodlist_productbrief);
	
	
	prodlist_productdiv.appendChild(prodlist_productdivrow1);
	prodlist_productdiv.appendChild(prodlist_productdivrow2);
	
	
	document.getElementById("productlist").appendChild(prodlist_productdiv);
}