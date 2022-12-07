<?php 
/**
 * Template Name: Properties
 */
get_header();
echo '<div id="map" style="height:750px;width:100%;"></div>';

?>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-9mJ2kxdvM88fIAE9IGbOn1Y9X-p2yVA&callback=initMap">
</script>

<script>
    function initMap() {
        // Map option
        var options = {
            center: {lat: 40.14775040259533, lng:-105.03824784895373}, 
            zoom:5
        }

        // New Map
        map = new google.maps.Map(document.getElementById("map"),options);

        
        // // InfoWindow
        // const infowindow = new google.maps.InfoWindow({
        //     content: `<div class="pt-4 pb-3">
        //     <p>5012 Buchanon Trail E<br>Zullinger, PA 17272</p>
        //     <a href="https://goo.gl/maps/HM1nCJbxXdLiP6w69" target="_blank">Click Here for Address</a>
        //     </div>`,
        //     // ariaLabel: "First Address",
        // });

        // // Marker
        // const marker = new google.maps.Marker({
        //     position: {lat: 39.76786030574004, lng: -77.62187373050699},
        //     map:map,
        //     // title: "Uluru (Ayers Rock)",
        //     // icon:"https://img.icons8.com/nolan/2x/marker.png" // to add a custom marker
        // })

        // =============

        // Add Markers to Array
        let MarkerArray = [
            {
                location:{lat: 39.76786030574004, lng: -77.62187373050699},
                content:`<div class="pt-4 pb-3">
                <p>5012 Buchanon Trail E<br>Zullinger, PA 17272</p>
                <a href="https://goo.gl/maps/HM1nCJbxXdLiP6w69" target="_blank">Click Here for Address</a>
                </div>`
            },
            {
                location:{lat: 47.287253597995125, lng: -101.92411505529451},
                content:`<div class="pt-4 pb-3">
                <p>113 Main St<br>Zap, ND 58580</p>
                <a href="https://goo.gl/maps/rh5YjKNnJmeby4oV7" target="_blank">Click Here for Address</a>
                </div>`
            },
        ]

        // for loop
        for (i = 0; i < MarkerArray.length; i++) {
            addMarker(MarkerArray[i])
        }

        // Add Markers
        function addMarker(props){
            const marker = new google.maps.Marker({
                position:props.location,
                map:map,
                content:props.content,
                animation: google.maps.Animation.DROP
                // title: "Uluru (Ayers Rock)",
                // icon:"https://img.icons8.com/nolan/2x/marker.png" // to add a custom marker
            })
            const infowindow = new google.maps.InfoWindow({
                content: props.content,
                // ariaLabel: "First Address",
            });

            if(props.content){
                marker.addListener("click", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                    });
                });
            } // end of if statement for content

        } // addMarker function


        // addMarker({
        //     location:{lat: 39.76786030574004, lng: -77.62187373050699},
        //     content:`<div class="pt-4 pb-3">
        //     <p>5012 Buchanon Trail E<br>Zullinger, PA 17272</p>
        //     <a href="https://goo.gl/maps/HM1nCJbxXdLiP6w69" target="_blank">Click Here for Address</a>
        //     </div>`
        // });


    }
    window.initMap = initMap;
</script>

<?php
get_footer();
?>