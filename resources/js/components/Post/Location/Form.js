import React from 'react';


const Form = props => {
  return (
    <React.Fragment>
      <div className="form-group">
        <label>Street</label>
        <input type="text" onBlur={props.update} name="street" className="form-control" />
        <label>Address number</label>
        <input type="text" onBlur={props.update} name="address_number" className="form-control" />
        <label>City</label>
        <input type="text" onBlur={props.update} name="city" className="form-control" />
        <label>Zip code</label>
        <input type="text" onBlur={props.update} name="zipcode" className="form-control" />
      </div>
      <input type="submit" onClick={props.checkValid} value="Save" className="btn btn-primary"/>
    </React.Fragment>
  );
}

export default Form;
