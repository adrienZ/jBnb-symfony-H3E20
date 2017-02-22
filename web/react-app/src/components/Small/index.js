import React from 'react'
import styled from 'styled-components'
import { Link } from 'react-router'

const StyledLink = styled(Link)`
  display: flex;
  flex-flow: row;
  text-decoration: none;
  color: black;
  min-width: 15rem;
  background-color: white;
  margin-left: 1rem;
  box-shadow: 0 2px 4px black;
  border-radius: 5px;
  height: 5rem;
  transition: .1s ease-in;
  &:hover {
    box-shadow: 0 4px 6px black;
    transform: scale(1.05);
  }
`
const Image = styled.img`
  width: 5rem;
  height: 5rem;
`
const Title = styled.h3`
  font-size: 1rem;
`
const SubTitle = styled.h4`
  font-size: .75rem;
`
const Small = ({ rooms, location, size, price, link, img }) => (
  <StyledLink to={link}>
    <Image src={img} alt=""/>
    <div>
      <Title>{ rooms } • { location }</Title>
      <SubTitle>{ size }m2 • { price }¥ / J</SubTitle>
    </div>
  </StyledLink>
)

export default Small
