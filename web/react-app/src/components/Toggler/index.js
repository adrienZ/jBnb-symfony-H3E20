import React from 'react'
import styled from 'styled-components'

const Container = styled.div`
  display: flex;
  width: 2.8125rem;
  height: 2.3125rem;
  justify-content: center;
  align-items: center;
  background-color: ${props => props.value === 0 ? '#FFFFFF' : props.color };
  color: ${props => props.value === 0 ? 'black' : 'white' }
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.50);
  border-radius: 5px;
  cursor: pointer;
  margin-top: .625rem;
`

const Toggler = (props) => <Container {...props} />

export default Toggler
