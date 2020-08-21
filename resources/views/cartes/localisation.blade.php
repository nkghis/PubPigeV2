

<!DOCTYPE html>
<html>
<head><meta name="viewport" content="initial-scale=1.0"><meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PIGE-PUB - Position visuel | {{$visuel[0]->emplacement}}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="http://localhost:8000/argon/img/brand/favicon.png" rel="icon" type="image/png">

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
        .label {
            margin-left: 5px;
        }
    </style>
</head>

<body>
<br>
<div class="container">
    <div class="row">

        <div class="col-md-8">
        </div>


        <div class="col-md-3">

        </div>

        <div class="col-md-1 page-action text-right">
            <a href="{{ route('visuels.index') }}" class="btn btn-default btn-sm"> <i class="material-icons">backspace</i> Retour</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">

        <div class="col-md-6">

            <div id="map" class="container" style="height: 800px"></div>
        </div>

        <div class="col-md-6">

            <div class="thumbnail" style="width: 24.5rem;">
                <img class="card-img-top" src="{{URL::to('/')}}/storage/mesimages/{{$visuel[0]->image}}" style="width: auto; height: 550px;" alt="Card image cap">
                <div class="caption">
                    <table class="table table-sm table-bordered" >
                        <thead class="thead-light">
                        <tr>

                            <th scope="col">Indicateur</th>
                            <th scope="col">Performances</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td><strong>Emplacement</strong></td>
                            <td> {{$visuel[0]->emplacement}} </td>
                        </tr>

                        <tr>
                            <td><strong>Annonceur</strong></td>
                            <td> {{$visuel[0]->client}} </td>
                        </tr>

                        <tr>
                            <td><strong>Campagne</strong></td>
                            <td> {{$visuel[0]->campagne}} </td>
                        </tr>

                        <tr>
                            <td><strong>Format</strong></td>
                            <td>12m²</td>
                        </tr>

                        {{--<tr>
                            <td><strong>Part de voix</strong></td>
                            <td>{{$visuel[0]->partdevoix}}</td>
                        </tr>

                        <tr>
                            <td><strong>GRP</strong></td>
                            <td>15</td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>

           {{-- <div class="row">
                <img src="{{URL::to('/')}}/storage/mesimages/{{$visuel->image}}" style="width: auto; height: 600px;">
            </div>

            <div class="row">--}}
              {{--  <img src="{{URL::to('/')}}/storage/mesimages/{{$visuel->image}}" style="width: auto; height: 195px;">--}}

              {{--  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>--}}


            </div>

        </div>

    </div>
</div>




<script src="{{ asset('js/app.js') }}"></script>

<script>
    var markers = @json($visuel);

    var map;
    var infowindows;
   /* var e = document.getElementById('com');
    var id = e.options[e.selectedIndex].value;*/

    var init = @json($cs);

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

        }

    }


    //google.maps.event.addDomListener(window, 'load', initialize);
</script>
{{--<script>


    $(document).ready(function () {

        $('#com').change(function () {

            /*$.get('maps/bycommune', function (data) {
                console.log(data);
            })*/



          /*  var id = $(this).val();
            $.get('maps/bycommune', [id])*/





           /* var idcommune = $(this).val();
            $.ajax({
                url: 'maps/bycommune',
                type: 'GET',
                data: { id: idcommune }
            });
            console.log(idcommune)*/
        })

    })
</script>--}}


{{--<script src="https://maps.googleapis.com/maps/api/js?key=appkey&callback=initMap" async defer></script>--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFFwXNKrYiQnaL-6kPhBxqn3SPsZE7mr0&callback=initMap" async defer></script>


<script>



    //console.log(visuels);
</script>


</body>
</html>
