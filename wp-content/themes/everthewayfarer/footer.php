  <footer class="page-closing">
    <div class="container">
      <ul class="closing-links">
        <li class="fairhead-creative" style="opacity:0;">Site lovingly crafted by <a href="http://fairheadcreative.com">Fairhead Creative</a>.</li>
      </ul>
    </div>
  </footer>

  <?php
    $locationLength = count($locationArray);
    for($x = 0; $x < $locationLength; $x++) {
      echo '<p>Title: ' . $locationArray[$x][0] . '<br />';
      echo 'Location: ' . $locationArray[$x][1] . '<br />';
      echo 'Permalink: ' . $locationArray[$x][2] . '</p>';
      // print_r(array_values($GLOBALS[locationArray]));
    }
  ?>

  <script>
    L.mapbox.accessToken = 'pk.eyJ1IjoiZXZlcnRoZXdheWZhcmVyIiwiYSI6IjNOYmsxd0UifQ.iRKOvhAJ3Omo2w9FVGJKUQ';
    <?php 
      $locationLength = count($GLOBALS[locationArray]);

      if ( is_single() && in_category( 'Journey' ) ) { 
        $normal = $GLOBALS[locationArray][$x][1];
        $revNormal = explode(', ', $normal);
        $revNormal = array_reverse($revNormal);
        $revNormalString = implode(', ', $revNormal);
        
        echo "var map = L.mapbox.map('map', 'everthewayfarer.la7ag2f4').setView([" . $revNormalString . "], 4);";
        
      } else {
 
        // Iterate between locations 
        $locationItems = array();
        $locationLengthBounds = count($GLOBALS[locationArray]);
          for($x = 0; $x < $locationLengthBounds; $x++) {

            $normal = $GLOBALS[locationArray][$x][1];
            $revNormal = explode(', ', $normal);
            $revNormal = array_reverse($revNormal);
            $revNormalString = implode(',', $revNormal);
            $revNormalFormat = explode(",", $revNormalString);
            $locationItems[] = $revNormalFormat; 
          }
        
        // Render the map with a default fixed position
        echo "var map = L.mapbox.map('map', 'everthewayfarer.la7ag2f4').setView([38.823, 21.885], 2);";
        // convert the locations array to JSON
        $json = json_encode([$locationItems]);
        // zoom the map to fit the bounds
        echo "map.fitBounds([" .  $json  . "]);";

      }
    ?>

    var journeyLayer = L.mapbox.featureLayer().addTo(map);

    // The GeoJSON representing the two point features
    var geojson = {
        type: 'FeatureCollection',
        features: [
        <?php
          for($x = 0; $x < $locationLength; $x++) {
            echo "{
              type: 'Feature',
              properties: { 
                title: '" . $GLOBALS[locationArray][$x][0] . "',
                'marker-color': '#f86767',
                'marker-size': 'large',
                'marker-symbol': '',
                url: '" . $GLOBALS[locationArray][$x][2] . "'
              },
              geometry: {
                type: 'Point',
                coordinates: [" . $GLOBALS[locationArray][$x][1] . "]
              }
            },";
          }
        ?>
        ]
    };

    // Pass features and a custom factory function to the map
    journeyLayer.setGeoJSON(geojson);
    journeyLayer.on('click', function(e) {
        e.layer.unbindPopup();
        window.open(e.layer.feature.properties.url,"_self");
    });
    
    journeyLayer.on('ready', function() {
      
    });
  </script>
  
  <?php wp_footer(); ?>
</body>
</html>
