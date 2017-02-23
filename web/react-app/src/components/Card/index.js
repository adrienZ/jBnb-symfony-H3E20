import React from 'react'
import styled from 'styled-components'
import { Link } from 'react-router'

import Stars from '../Stars'

const Container = styled(Link)`
  background: #FFFFFF;
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.50);
  border-radius: 5px;
  position: relative;
  margin-top: 4rem;
  height: 14.0625rem;
  width: 15.625rem;
  text-decoration: none;
  color: black;
  transition: .1s ease-in;
  &:hover {
    box-shadow: 0 3px 6px 0 rgba(0,0,0,0.50);
    transform: scale(1.05);
  }
`

const Pastille = styled.div`
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  top: 0;
  left: 100%;
  transform: translate(-50%, -50%);
  color: white;
  background-color: ${props => props.color};
  width: 4.25rem;
  height: 4.25rem;
`

const Image = styled.div`
  background-image: url('${props => props.url}');
  background-size: cover;
  background-position: center;
  width: 15.625rem;
  height: 8.9375rem;
`
const Title = styled.h3`
  font-size: 1rem;
  margin: 0;
`
const Subtitle = styled.h4`
  font-size: .75rem;
  color: #9E9E9E;
  margin: 0;
`

const Card = ({ rooms, location, size, price, type, rating, img, color, link }) => {
  return (
    <Container to={link}>
      <Pastille color={ color }>{ type }</Pastille>
      <Image url={img}/>
      <Title>{ rooms } { location }</Title>
      <Subtitle>{ size } { price }</Subtitle>
      <Stars value={rating} color={color}/>
    </Container>
  )
}

export default Card
