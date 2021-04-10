import { Loader } from '@googlemaps/js-api-loader';

const contentString = `<div class="p-2 font-sans text-lg text-center">
<strong>Builders Trust Capital</strong>
<p>121 Johnson Road Suite 1, <br />
Turnersville, NJ 08012 <br />
<a href="https://www.google.com/maps/search/?api=1&query=121+Johnson+Rd+%231,+Turnersville,+NJ+08012" target="_blank">Get Directions</a>
</p>
</div>`;

export default {
  init() {
    // scripts here run on the DOM load event

    const loader = new Loader({
      apiKey: 'AIzaSyCwoMijRb0yHHZZjHEBJMh9MaWCruc6q-0',
      version: 'weekly',
      libraries: ['places'],
    });
    const latLong = {
      lat: 39.7480638,
      lng: -75.0461785,
    };
    const mapOptions = {
      center: latLong,
      zoom: 15,
    };
    loader
      .load()
      .then(() => {
        const map = new google.maps.Map(
          document.getElementById('map'),
          mapOptions
        );
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode(
          {
            address: '121 Johnson Road, Suite 1 Turnersville, NJ 08012',
          },
          function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
              const marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
                title: 'Builders Trust Capital',
              });
              map.setCenter(results[0].geometry.location);
              const infowindow = new google.maps.InfoWindow({
                content: contentString,
              });
              infowindow.open(map, marker);
            }
          }
        );
      })
      .catch((e) => {
        console.log(e);
      });
  },
  finalize() {
    // scripts here fire after init() runs
  },
};
