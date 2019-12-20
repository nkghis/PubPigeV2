<!DOCTYPE html>
<html>
<head><meta name="viewport" content="initial-scale=1.0"><meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PIGE-PUB - Gestion des positions des visuels</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link href="http://localhost:8000/argon/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Select 2 -->
    <link href="{{ asset('vendor') }}/select2/css/select2.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- My own Styles -->
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

    <style>

        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
<br>
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <form method="GET" action="{{ route('maps.bycommune') }}">
                <div class="form-group row mx-sm-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Commune</label>
                    <div class="col-sm-3">
                        <select id="com" name="commune" class="form-control">

                            @if($commune->count())

                                <option value="0">All communes</option>

                                @foreach ($commune as $communes)
                                    <option value="{{$communes->id}}" {{ $communes->id == $cs->id ? 'selected' : '' }}  >{{$communes->name}}</option>
                                @endforeach

                            @endif


                        </select>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Campagne</label>
                    <div class="col-sm-3">
                        <select id="cam" name="campagne" class="form-control">

                            @if($campagne->count())

                                <option value="0">All campagnes</option>

                                @foreach ($campagne as $campagnes)
                                    <option value="{{$campagnes->code}}" {{ $campagnes->code == $cm->code ? 'selected' : '' }}  >{{$campagnes->libelle}}</option>
                                @endforeach

                            @endif


                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-md btn-primary btn-block" type="submit">Filtrer</button>
                    </div>


                </div>
            </form>
        </div>

        {{--<div class="col-md-4">

        </div>--}}

        <div class="col-md-3 page-action ">
            <div class="row">
                <h2><span class="badge badge-success">Total Visuel</span></h2>
                <h2><span class="badge badge-primary">{{$visuel->count()}}</span></h2>
            </div>
        </div>

        <div class="col-md-1 page-action text-right">
            <a href="{{ route('home') }}" class="btn btn-default btn-sm"> <i class="material-icons">backspace</i> Retour</a>
        </div>
    </div>
</div>

<div id="map" class="container"></div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor') }}/select2/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#com").select2({

        });

        $("#cam").select2({

        });

    });
</script>
<script>
    var markers = @json($visuel);

    var map;
    var infowindows;
    var e = document.getElementById('com');
    var id = e.options[e.selectedIndex].value;
    console.log(id);


    var init = @json($cs);

    if (id != 0)
    {

        function initMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: init.lat, lng: init.lng},

                zoom: init.zoom

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
                        url: "http://maps.google.com/mapfiles/ms/icons/"+markers[i].marqueur+"-dot.png"
                    }

                });
                contentString[i] = '<div id="content">' +
                    '<div id = "site"' +
                    '</div>'+
                    '<h1 id = "firsthead" class="firstHeading">'+ markers[i].emplacement +'</h1>'+
                    '<div id ="bodycontent">'+
                    '<p><b>Commune : </b>'  + markers[i].commune +
                    '<br>'+
                    '<br>'+
                    '<img width="200" src="'+ url +'/'+markers[i].image+'"/>'+
                    '</div>'+
                    '</div>';
                infowindow[i] = new google.maps.InfoWindow({

                    content : contentString[i]
                });

                var monevent = marker[i];
                google.maps.event.addListener(marker[i], 'click', (function (monevent, i) {

                    return function (){
                        infowindow[i].open(map, marker[i]);
                    }
                })(marker[i], i))

            }

        }

    }
    else
    {
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {

                center: { lat: 5.3819324, lng: -3.9192513},
                zoom: 11
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
                        url: "http://maps.google.com/mapfiles/ms/icons/"+markers[i].marqueur+"-dot.png"
                    }

                });
                contentString[i] = '<div id="content">' +
                    '<div id = "site"' +
                    '</div>'+
                    '<h1 id = "firsthead" class="firstHeading">'+ markers[i].emplacement +'</h1>'+
                    '<div id ="bodycontent">'+
                    '<p><b>Commune : </b>'  + markers[i].commune +
                    '<br>'+
                    '<br>'+
                    '<img width="500" src="'+ url +'/'+markers[i].image+'"/>'+
                    '</div>'+
                    '</div>';
                infowindow[i] = new google.maps.InfoWindow({

                    content : contentString[i]
                });

                var monevent = marker[i];
                google.maps.event.addListener(marker[i], 'click', (function (monevent, i) {

                    return function (){
                        infowindow[i].open(map, marker[i]);
                    }
                })(marker[i], i))

            }
        }

    }


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFFwXNKrYiQnaL-6kPhBxqn3SPsZE7mr0&callback=initMap" async defer></script>

<script>



    //console.log(visuels);
</script>


</body>
</html>
