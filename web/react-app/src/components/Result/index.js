import React from 'react'
import styled from 'styled-components'

import Stars from '../Stars'

const Container = styled.div`
  display: flex;
  position: relative;
  flex-flow: row nowrap;
  background: #FFFFFF;
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.50);
  border-radius: 5px;
  width: 37.5rem;
  height: 11.25rem;
  margin: auto;
  margin-top: 1rem;
`

const Image = styled.div`
  width: 19.75rem;
  height: 11.25rem;
  background-color: red;
  background-image: url('${props => props.image}');
  background-size: cover;
  background-repeat: no-repeat;
`

const Informations = styled.div`
  display: flex;
  flex-flow: column nowrap;
  margin-left: 1.5625rem;
`

const Title = styled.h2`
  margin-left: .5rem;
  color : ${props => props.color}
`
const Profile = styled.div`
  display: flex;
  flex-flow: row nowrap;
  align-items: center;
  font-size: .625rem;
 `

const Subtitle = styled.div`
  display: flex;
  flex-flow: nowrap;
  justify-content: space-between;
`

const Size = styled.div`
  color: #9E9E9E;
`
const Pp = styled.div`
  background-image: url('${props => props.pp}');
  background-position: center;
  width: 1.5rem;
  height: 1.5rem;
  border-radius: 50%;
  overflow: hidden;
  margin-right: 1rem;
`

const Raters = styled.div`
  font-size: .75rem;
  color: #9E9E9E;
`

const Result = ({size, state, prefecture, price, owner, rating, raters, image, color, pp}) => (
  <Container>
    <Image image={image}/>
    <Informations>
      <Title color={color}>{ size } { state } { prefecture }</Title>
      <Subtitle>
        <div>{ price }/ Jour</div>
        <Size>{ size }m2</Size>
      </Subtitle>
      <Profile>
        <Pp pp={pp}/>
        <div>Appartement loué par <strong>{ owner }</strong></div>
      </Profile>
      <div>
        <Raters>{ raters }avis</Raters>
        <Stars value={rating} color={color}/>
      </div>
    </Informations>
  </Container>
)

export default Result
