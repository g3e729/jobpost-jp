import React, { useState } from 'react';
import { withScriptjs, withGoogleMap, GoogleMap, Marker } from 'react-google-maps';
import { compose, withProps, lifecycle } from 'recompose';

const apiKey = 'AIzaSyA2eYXOXNa6mbAJXrqgGul5qXP3Cpx_HIA';

const Mapped = (props) => {
  const {
    address,
    height,
    zoom
  } = props;
  const [status, setStatus] = useState(false);
  const [latitude, setLatitude] = useState(0);
  const [longitude, setLongitude] = useState(0);

  const MyMap = compose(
    withProps({
      googleMapURL: (`https://maps.googleapis.com/maps/api/js?key=${apiKey}`),
      loadingElement: (<div style={{ height: '100%' }} />),
      containerElement: (<div style={{ height: height }} />),
      mapElement: (<div style={{ height: '100%' }} />)
    }),
    withScriptjs,
    withGoogleMap,
    lifecycle({
      componentDidMount() {
        const geocoder = new window.google.maps.Geocoder();
        geocoder.geocode( { 'address': address }, (results, status) => {
          if (status == 'OK') {
            setStatus(true);
            setLatitude(results[0].geometry.location.lat());
            setLongitude(results[0].geometry.location.lng());
            console.log('[Geocode RESULT]', results);
          } else {
            console.log('[Geocode ERROR]' + status);
          }
        });
      }
    })
  )(_ => {
    return (
      status ?
        <GoogleMap
          isMarkerShown
          defaultZoom={zoom}
          defaultCenter={new window.google.maps.LatLng(latitude, longitude)}
        >
          <Marker
            position={{ lat: latitude, lng: longitude }}
          />
        </GoogleMap>
      : <GoogleMap
          defaultZoom={4}
          defaultCenter={new window.google.maps.LatLng(35.48847, 137.5263065)}
        />
    )
  });

  return (
    <MyMap />
  );
}

export default Mapped;
