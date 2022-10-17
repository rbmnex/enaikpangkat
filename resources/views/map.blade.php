<html>
    <head>
    </head>
    <body>
        <textarea id="vertices" style="width:100%">
        </textarea>
        <button id="removePolygon">Remove Polygon</button>
        <div id="map" style="height: 500px;width: 500px;background-color: red"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            var map; // Global declaration of the map
            var lat_longs = new Array();
            var markers = new Array();
            var drawingManager;
            var selectedShape;

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: { lat: 24.886, lng: -70.268 },
                    zoom: 5
                });

                drawingManager = new google.maps.drawing.DrawingManager({
                    drawingMode: google.maps.drawing.OverlayType.POLYGON,
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                    },
                    polygonOptions: {
                        editable: true
                    }
                });
                drawingManager.setMap(map);

                google.maps.event.addListener(drawingManager, "overlaycomplete", function(e) {
                        drawingManager.setDrawingMode(null);
                        var newShape = e.overlay;
                        newShape.type = e.type;
                        google.maps.event.addListener(newShape, 'click', function() {
                            setSelection(newShape);
                        });
                        setSelection(newShape);

                    google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
                    google.maps.event.addListener(map, 'click', clearSelection);
                });

                google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                    overlayClickListener(event.overlay);
                    $('#vertices').val(event.overlay.getPath().getArray());
                });
            }

            function overlayClickListener(overlay) {
                google.maps.event.addListener(overlay, "mouseup", function(event) {
                    $('#vertices').val(overlay.getPath().getArray());
                });
            }

            $(document).on('click', '#removePolygon', function(){
                if (selectedShape) {
                    selectedShape.setMap(null);
                }
            });

            function clearSelection() {
                if (selectedShape) {
                    selectedShape.setEditable(false);
                    selectedShape = null;
                }
            }

            function setSelection(shape) {

                clearSelection();
                selectedShape = shape;
                shape.setEditable(true);
            }
        </script>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=&libraries=drawing&callback=initMap">
        </script>
    </body>
</html>

