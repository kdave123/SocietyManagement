<html>

<head>

<link rel="stylesheet" type="text/css" href="kdstylesheet.css">

<title>K TheWay Housing Society Management</title>
    
    
    
</head>

<body>
<?php

require("header.php");

?>
  <marquee style="font-family:calibri;font-size: 25px">NOTICE : FIRST AGM ON 3rd September ,2019. Agenda, How to Build Next Unicorn. </marquee>

                                     <div class="slider" style="background-color:;position:relative;">

                                         <img class="photo photo1"  src="slider/1.jpg"/>
                                         <img class="photo photo2"  src="slider/2.jpg"/>
                                         <img class="photo photo3"  src="slider/3.jpg"  style="width"  />
                                         <img class="photo photo4"  src="slider/4.jpg"  style="width"  />
                                         <img class="photo photo5"  src="slider/5.jpg"/>
                                         <p class="bigtext" style=" position: absolute;font-weight:bold;color:white;font-size:400%;
                                                                   bottom: 10%;
                                                                   left: 10%;">
                                               K. The Way<br>Society.
                                         </p>
                                    </div>        
                  
      
         

    
<div class="midcontent" style="width:90%; margin-left:5%;">

            
        <div class="features"  >Features
                       
 

 
 
                                                            <ul style="font-size:20px;">
                                                                <li>Maintain Society Members table</li>
                                                                <li>Maintainence Bills for every members </li>
                                                                <li>Parking Allotment details</li>
                                                                
                                                                <li>Insert, Update, Read & Delete Records from GUI. (DBMS operations)</li>
                                                                <li>Quick and Convinient User Interface</li>
                                                            </ul>
              
        
                </div>
    
    <div style="width:100%;">
<div class="event">
    <div class="eventdetails" style="width:40%;">
        <p class="bigtext" style="color:orange;font-weight:bold;">Welcome.</p>
        <p class="para">
             To The Society management system.<br>Simplify your daily tasks and increase efficiency. Some random text, Full Stack Development ! ,What are Neural Networks??? Artificial neural networks or connectionist systems are computing systems that are inspired by, but not identical to, biological neural networks that constitute animal brains. Such systems "learn" to perform tasks by considering examples, generally without programmed with task-specific rules. Artificial neural networks or connectionist systems are computing systems that are inspired by, but not identical to, biological neural networks that constitute animal brains. Such systems "learn" to perform tasks by considering examples, generally without programmed with task-specific rules. Artificial neural networks or connectionist systems are computing systems that are inspired by, but not identical to, biological neural networks that constitute animal brains. Such systems "learn" to perform tasks by considering examples, generally without programmed with task-specific rules. 
        </p>
    </div>
    <div id="map" style="width:40%;height:350px;"></div>
                
<script>
function myMap() {
  var myCenter = new google.maps.LatLng(19.079508,72.8963144);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 16};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);

  var infowindow = new google.maps.InfoWindow({
    content: "(Map API)The Way Housing Management System!"
  });
  infowindow.open(map,marker);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YourKeyHere&callback=myMap"></script>

</div>
</div>
    </div>
    
<?php

require("footer.html");

?>
</body>

</html>