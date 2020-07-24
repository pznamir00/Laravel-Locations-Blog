import React, { memo } from 'react';
import { Redirect } from 'react-router-dom';
import {withRouter} from 'react-router';
import { Marker, Popup, Tooltip } from 'react-leaflet';
import markerIcon from './markerConfig';



const Picker = memo(({ locations }) => {
  return (
    <React.Fragment>
      {locations.map((loc, key) =>
        <Marker position={[loc.lat, loc.lon]} postId={loc.id} icon={markerIcon} key={key}>
          <Tooltip direction="top" permanent={true} offset={[0, -41]}>
           {loc.title}
          </Tooltip>
          <Popup>
            <h5><b>{loc.title}</b></h5>
            <hr/>
            <p>Address: {loc.address}</p>
            <p>Added at: {loc.added}</p>
            <a href={'/posts/' + loc.id}>Show post</a>
          </Popup>
        </Marker>
      )}
    </React.Fragment>
  );
});

export default withRouter(Picker);
