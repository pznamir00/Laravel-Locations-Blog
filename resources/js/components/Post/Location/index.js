import React, { Component, Fragment } from 'react';
import Form from './Form';
import ValidMessage from './ValidMessage';


export default class LocationHandle extends Component {

  constructor(props){
    super(props);
    this.state = props.locationsData ? {
      street: props.locationsData.street,
      address_number: props.locationsData.address_number,
      city: props.locationsData.city,
      zipcode: props.locationsData.zipcode,
      valid: true,
    } : {
      street: '',
      address_number: '',
      city: '',
      zipcode: '',
      valid: false,
    };

    this.inputHandle = this.inputHandle.bind(this);
    this.checkValid = this.checkValid.bind(this);
  }

  inputHandle(e){
    switch(e.target.name){
      case 'street': this.setState({ street: e.target.value });                 break;
      case 'address_number': this.setState({ address_number: e.target.value }); break;
      case 'city': this.setState({ city: e.target.value });                     break;
      case 'zipcode': this.setState({ zipcode: e.target.value });               break;
    }
  }

  componentDidMount(){
    Object.entries(this.state).map((value) => {
      if(value[0] !== 'valid'){
        document.querySelector('input[name="' + value[0] + '"]').value = value[1];
      }
    });
  }

  componentDidUpdate(prevProps, prevState){
    if(prevState.street !== this.state.street || prevState.address_number !== this.state.address_number || prevState.city !== this.state.city || prevState.zipcode !== this.state.zipcode){
      const API = `https://nominatim.openstreetmap.org/search?format=json&q=${this.state.street+' '+this.state.address_number+', '+this.state.city+' '+this.state.zipcode}`;
      fetch(API)
      .then(response => response.json())
      .then(res => this.setState({ valid: (res.length > 0) }))
      .catch(err => console.log(err));
      }
  }

  checkValid(e){
    if(!this.state.valid)
      e.preventDefault();
  }

  render(){
    return (
      <Fragment>
        <Form
          state={this.state}
          update={this.inputHandle}
          checkValid={this.checkValid}
        />
        <ValidMessage
          valid={this.state.valid}
        />
      </Fragment>
    );
  }
}
