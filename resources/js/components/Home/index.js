import React from 'react';
import { Map, TileLayer } from 'react-leaflet';
import axios from 'axios';
import './style.css';
import Picker from './Picker';
import actions from '../../redux/homeMap/actions';
import { connect } from 'react-redux';




class Home extends React.Component {

   constructor(props){
     super(props);
     ((_props) => {
       navigator.geolocation.getCurrentPosition(pos => {
          _props.initPosition([pos.coords.latitude, pos.coords.longitude])
       });
     })(props);
   }

   componentDidMount(){
     var _this = this;
     axios.get('/posts/all').then(response => {
       response.data.forEach(i => {
          const loc = i.location;
          fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${loc.street+' '+loc.address_number+', '+loc.city+' '+loc.zipcode}`)
          .then(result => result.json())
          .then(res => {
            if(res.length > 0){
              let newLocation = {
                id: i.id,
                added: i.created_at,
                address: loc.street+' '+loc.address_number+', '+loc.city+' '+loc.zipcode,
                title: i.title,
                lat: res[0].lat,
                lon: res[0].lon
              }
              _this.props.addLocation(newLocation)
            }
          })
          .catch(error => console.log(error));
       });
     })
     .catch(error => console.log(error))
   }

   render() {
     return (
       <Map className="map" center={this.props.position} zoom={this.props.zoom}>
         <TileLayer
          attribution='&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
          url='https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png'
        />
         <Picker locations={this.props.locations} />
       </Map>
     )
   }
}



const mapStateToProps = state => {
  return {
    zoom: state.homeMap.zoom,
    position: state.homeMap.position,
    locations: state.homeMap.locations
  }
}

const mapDispatchToProps = dispatch => ({
  setZoom: zoom => dispatch(actions.setZoom(zoom)),
  initPosition: position => dispatch(actions.initPosition(position)),
  addLocation: location => dispatch(actions.addLocation(location))
})

export const HomeContainer = connect(mapStateToProps, mapDispatchToProps)(Home)
