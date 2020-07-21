import React, { memo } from 'react';


const ValidMessage = memo(({ valid }) => {
  const message = valid ? 'Your address is valid' : 'Your address is not valid';
  return (
    <p>{message}</p>
  );
});

export default ValidMessage;
