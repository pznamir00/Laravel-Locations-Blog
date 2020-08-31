import React, { Component, Fragment } from 'react';
import Form from './Form';
import ValidMessage from './ValidMessage';
import actions from '../../../redux/locationManagement/actions';
import { connect } from 'react-redux';



class LocationHandle extends Component {

  constructor(props){
    super(props);
    this.inputHandle = this.inputHandle.bind(this);
    this.checkValid = this.checkValid.bind(this);
  }

  inputHandle(e){
    const { name, value } = e.target;
    this.props.setAddressField(name, value);
  }

  componentDidMount(){
    if(this.props.addressInstance !== undefined){
      this.props.setAddressField('street', this.props.addressInstance.street)
      this.props.setAddressField('address_number', this.props.addressInstance.address_number)
      this.props.setAddressField('city', this.props.addressInstance.city)
      this.props.setAddressField('zipcode', this.props.addressInstance.zipcode)
      this.props._switch(true);
    }
  }

  componentDidUpdate(prevProps){
    if(prevProps.address.street !== this.props.address.street ||
      prevProps.address.address_number !== this.props.address.address_number ||
      prevProps.address.city !== this.props.address.city ||
      prevProps.address.zipcode !== this.props.address.zipcode)
      {
        const API = `https://nominatim.openstreetmap.org/search?format=json&q=${
          this.props.address.street + ' ' +
          this.props.address.address_number + ', ' +
          this.props.address.city + ' ' +
          this.props.address.zipcode
        }`;
        fetch(API)
        .then(response => response.json())
        .then(res => this.props._switch(res.length > 0))
        .catch(err => console.log(err));
      }
  }

  checkValid(e){
    if(!this.props.valid)
      e.preventDefault();
  }

  render(){
    return (
      <Fragment>
        <Form
          address={this.props.address}
          update={this.inputHandle}
          checkValid={this.checkValid}
        />
        <ValidMessage
          valid={this.props.valid}
        />
      </Fragment>
    );
  }
}





const mapStateToProps = state => {
  return {
    valid: state.locationManagement.valid,
    address: state.locationManagement.address
  }
}

const mapDispatchToProps = dispatch => ({
  _switch: value => dispatch(actions._switch(value)),
  setAddressField: (field, value) => dispatch(actions.setAddressField(field, value))
})

export const LocationHandleContainer = connect(mapStateToProps, mapDispatchToProps)(LocationHandle)
