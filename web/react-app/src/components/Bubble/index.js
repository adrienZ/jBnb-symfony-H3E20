import React from 'react'
import styled from 'styled-components'

const Container = styled.div`
  position: absolute;
  top: ${props => props.top}px;
  left: ${props => props.left}px;
  border: 1px solid ${props => props.borderColor};
  transform: translate(-50%, -100%);
  transition: all .3s;
  background-color: white;
  padding: 1rem;
  border-radius: 5px;
  pointer-events: none;
`


const Bubble = ({alphName, japName, x, y, color}) => (
  <Container borderColor={color} left={x} top={y} >
    <div>{alphName}</div>
    <div>{japName}</div>
  </Container>
)

export default Bubble
