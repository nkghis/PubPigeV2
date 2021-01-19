<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>

    <style>
        html, body
        {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        #map_canvas
        {

            margin-left: 400px;

            height: 100%;

        }


        /* The side navigation menu */
        .sidebar {
            margin: 0;
            padding: 0;
            width: 400px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: #4CAF50;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }



        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {float: left;}
            div.content {margin-left: 0;}
        }

        /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }


    </style>
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFFwXNKrYiQnaL-6kPhBxqn3SPsZE7mr0&callback=initMap" async defer></script>--}}
    <script src="https://code.jquery.com/jquery-1.6.2.min.js" integrity="sha256-0W0HoDU0BfzslffvxQomIbx0Jfml6IlQeDlvsNxGDE8=" crossorigin="anonymous"></script>







</head>
<body>
{{--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFFwXNKrYiQnaL-6kPhBxqn3SPsZE7mr0&callback=initMap" {{--async--}} defer></script>


<!-- The sidebar -->
<div id="side_bar" class="sidebar">
    <a class="active" href="#home">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
    <a href="#about">About</a>
</div>


<div id="map_canvas">
</div>



{{--<script>

</script>--}}

<script>
    var map;
    var slidePanelOpen; // flag set if panel is open or closed


    function initMap() {

        // set initial with of map to the size of the( window - panel width)
        $('#map_canvas').css('width', (window.innerWidth - 200 + 'px'));

        slidePanelOpen = true;


        var markers = @json($visuel);

        var map;
        var infowindows;


        //Initialise remake sidebar variable
        var side_bar_html = "";

        var mapDiv = document.getElementById('map_canvas');

        /*var myOptions = {
            zoom: 12.04,
            center: new google.maps.LatLng(5.3476678, -3.9822464),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }*/
        //map = new google.maps.Map(mapDiv, myOptions);

        var map = new google.maps.Map(mapDiv, {
            zoom: 12,
            center: new google.maps.LatLng(5.3476678, -3.9822464),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = [];
        var contentString =[];
        var infowindow = [];
        var url = '{{asset('storage/mesimages/')}}';

        for(var i =0; i < markers.length; i++ ){
            var location = new google.maps.LatLng(markers[i].latitude, markers[i].longitude);

            marker[i] = new google.maps.Marker({

                position : location,
                title : markers[i].emplacement,
                map:map,
                icon: {
                    /*url: "http://maps.google.com/mapfiles/ms/icons/"+markers[i].marqueur+"-dot.png"*/
                    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                }

            });
            contentString[i] = '<div id="content">' +
                '<div id ="bodycontent">'+
                '<div class="thumbnail">'+
                '<img width="350" src="'+ url +'/'+markers[i].image+'"/>'+
                '<div class="caption">'+
                '<table class="table table-sm table-bordered" >'+
                '  <thead class="thead-light">'+
                '    <tr>'+
                '      '+
                '      <th scope="col">Indicateur</th>'+
                '      <th scope="col">Performances</th>'+
                '      '+
                '    </tr>'+
                '  </thead>'+
                '  <tbody>'+
                '    '+
                '    <tr>'+
                '      <td><strong>Emplacement</strong></td>'+
                '      <td>'+ markers[i].emplacement +'</td>'+
                '    </tr>'+
                '    '+
                '    <tr>'+
                '      <td><strong>Annonceur</strong></td>'+
                '      <td>'+ markers[i].client +'</td>'+
                '    </tr>'+
                '    '+
                '    <tr>'+
                '      <td><strong>Campagne</strong></td>'+
                '      <td>'+ markers[i].campagne +'</td>'+
                '    </tr>'+
                '    '+
                '    <tr>'+
                '      <td><strong>Format</strong></td>'+
                '      <td>12m²</td>'+
                '    </tr>'+
                '    '+
                '    <tr>'+
                '      <td><strong>Part de voix</strong></td>'+
                '      <td>'+ markers[i].partdevoix +'%</td>'+
                '    </tr>'+
                '    '+
                '     <tr>'+
                '      <td><strong>GRP</strong></td>'+
                '      <td>15</td>'+
                '    </tr>'+
                '  </tbody>'+
                '</table>'+
                '</div>'+
                '</div>'+
                '</div>';
            infowindow[i] = new google.maps.InfoWindow({

                content : contentString[i],
                maxWidth: 350
            });

            var monevent = marker[i];
            google.maps.event.addListener(marker[i], 'click', (function (monevent, i) {

                return function (){
                    infowindow[i].open(map, marker[i]);
                }
            })(marker[i], i))

            //Create new sidebar with markers
            side_bar_html += '<a href="javascript:myclick(' + (markers.length-1) + ')">' + markers[i].campagne + '<\/a><br>';

            // put the assembled side_bar_html contents into the side_bar div
            document.getElementById("side_bar").innerHTML = side_bar_html;
        }




        var toggleButton = $('#toggleButton');

        toggleButton.click(function() {
            if (slidePanelOpen) {
                // hide panel
                $("#slidepanel").animate({
                    "marginLeft": "-=150px"
                }, 500);
                slidePanelOpen = false;
                toggleButton.attr('value', 'Open');
                //map.panBy(-150, 0);
                // change width of map to fill empty space left from collapse of sldide panel
                $('#map_canvas').animate({
                    "width": "+=150px"
                }, 500);
            }
            else {
                $("#slidepanel").animate({
                    "marginLeft": "+=150px"
                }, 500);
                slidePanelOpen = true;
                toggleButton.attr('value', 'Close');
                //map.panBy(150, 0);
                $('#map_canvas').animate({
                    "width": "-=150px"
                }, 500);

            };
        });
    }

    // when document ready
    $(function() {
        initMap();
    })
</script>
</body>
</html>