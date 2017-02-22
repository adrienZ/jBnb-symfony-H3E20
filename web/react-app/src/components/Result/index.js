import React from 'react'
import styled from 'styled-components'

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

const Title = styled.h2`
  margin-left: .5rem;
  color : ${props => props.color}
`
const Profile = styled.div`
  display: flex;
  flex-flow: row nowrap;
`

const Subtitle = styled.div`
  display: flex;
  flex-flow: nowrap;
  justify-content: space-between;
`

const Size = styled.div`
  color: #9E9E9E;
`
const ProfileImg = styled.div`
  background-image: url('${props =>  props.profilePic}');
  border-radius: 50%;
  width: 1.5rem;
  height: 1.5rem:
`

const Raters = styled.div`
  font-size: .75rem;
  color: #9E9E9E;
`

const Result = ({size, state, prefecture, price, owner, rating, raters, image, color, profilePic}) => (
  <Container>
    <Image image={image}/>
    <Title color={color}>{ size } { state } { prefecture }</Title>
    <Subtitle>
      <div>{ price }/ Jour</div>
      <Size>{ size }m2</Size>
    </Subtitle>
    {/* <Profile>
      <ProfileImg profilePic={profilePic}/>
      <div>Appartement loué par <strong>{ owner }</strong></div>
    </Profile> */}
    <div>
      <Raters>{ raters }</Raters>
      La note
    </div>
  </Container>
)

export default Result
