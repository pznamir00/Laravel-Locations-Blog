import React from 'react';


const ValidMessage = props => {
  const message = props.valid ? 'Your address is valid' : 'Your address is not valid';
  return (
    <p>{message}</p>
  );
}

export default ValidMessage;
