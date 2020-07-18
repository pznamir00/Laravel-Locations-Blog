import React from 'react';
import { Map, TileLayer } from 'react-leaflet';
import axios from 'axios';
import './style.css';
import Picker from './Picker';





export default class Home extends React.Component {

   constructor(){
     super();
     this.state = {
       position: [52, 15],
       zoom: 8,
       locations: [],
     };

     ((_this) => {
       navigator.geolocation.getCurrentPosition(function(position) {
          _this.setState({
            position: [position.coords.latitude, position.coords.longitude],
          });
       });
     })(this);
   }

   componentDidMount(){
     var _this = this;
     axios.post('/locations/all').then(function(response){
       response.data.forEach(i => {
          let loc = i.location;
          const API = `https://nominatim.openstreetmap.org/search?format=json&q=${loc.street+' '+loc.address_number+', '+loc.city+' '+loc.zipcode}`;
          fetch(API)
          .then(result => result.json())
          .then(res => {
            if(res.length > 0){
              let locations = _this.state.locations;
              locations.push({
                id: i.id,
                added: i.created_at,
                address: loc.street+' '+loc.address_number+', '+loc.city+' '+loc.zipcode,
                title: i.title,
                lat: res[0].lat,
                lon: res[0].lon
              });
              _this.setState({
                locations: locations,
              });
            }
          })
          .catch(error => console.log(error));
       });
     }).catch(function(error){
       console.log(error);
     })
   }

   render() {
     return (
       <Map className="map" center={this.state.position} zoom={this.state.zoom}>
         <TileLayer
          attribution='&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
          url='https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png'
        />
         <Picker locations={this.state.locations} />
       </Map>
     )
   }
}
