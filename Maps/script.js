      (function(window, google) {


        var options = {
          center: {
            lat: -15.764114,
            lng: -47.870709
          },
          zoom: 17,
          scrollwheel: false,
          disableDefaultUI: true,
          maxZoom: 17,
          minZoom: 17
        };
        
        element = document.getElementById('map-canvas'),

          map = new google.maps.Map(element, options);
          

function addMarker(location, map) {
  var marker = createEditableMarker({
    position: location,
    map: map,
    animation: google.maps.Animation.DROP,
    draggable: true
  });
}
      

      google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng, map);
  });
      
    google.maps.event.addListener(marker, "html_changed", function(){
      console.log(this.html);
    });
    
function createEditableMarker(options) {

    var marker = new google.maps.Marker(options);
    
    marker.set("editing", false);
    
    var htmlBox = document.createElement("div");
    htmlBox.innerHTML = options.html || "";
    htmlBox.style.width = "300px";
    htmlBox.style.height = "100px";
    
    var textBox = document.createElement("textarea");
    textBox.innerText = options.html || "";
    textBox.style.width = "300px";
    textBox.style.height = "100px";
    textBox.style.display = "none";
    
    var container = document.createElement("div");
    container.style.position = "relative";
    container.appendChild(htmlBox);
    container.appendChild(textBox);
    
    
    var editBtn = document.createElement("button");
    editBtn.innerText = "Reclame";
    container.appendChild(editBtn);
    
  
    var infoWnd = new google.maps.InfoWindow({
      content : container
    });
    
    google.maps.event.addListener(marker, "click", function() {
      infoWnd.open(marker.getMap(), marker);
    });
    
    google.maps.event.addDomListener(editBtn, "click", function() {
      marker.set("editing", !marker.editing);
    });
    

    google.maps.event.addListener(marker, "editing_changed", function(){
      textBox.style.display = this.editing ? "block" : "none";
      htmlBox.style.display = this.editing ? "none" : "block";
    });
    

    google.maps.event.addDomListener(textBox, "change", function(){
      htmlBox.innerHTML = textBox.value;
      marker.set("html", textBox.value);
    });
    return marker;
  }
google.maps.event.addDomListener(window, "load", initialize);
       
       
         
         
       }(window, google));
      
 