import React from 'react'
import styled from 'styled-components'

const Container = styled.div`
  display: flex;
  position: absolute;
  z-index: 100;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  flex-flow: column;
  justify-content: center;
  background-color: white;
  box-shadow: 3px 4px 13px 0 rgba(0,0,0,0.50);
  border-radius: 5px;
  width: 56.9375rem;
  height: 45.8125rem;
`

const Background = styled.div`
  &::before {
    content: '';
    position: absolute;
    z-index: 99;
    background-image: radial-gradient(51% 73%, #FFFFFF 43%, #000000 74%);
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    opacity: 0.35;
  }
`
const Modal = ({ children }) => (
  <Background>
    <Container>
      {children}
    </Container>
  </Background>
)

export default Modal
