import React, { Component } from 'react'
import styled from 'styled-components'

import Nav from '../../../../components/Nav'

const Container = styled.div`
  background-image: url('${props => props.url}');
  background-repeat: repeat;
`
class PostScene extends Component{
  render(){
    return(
      <Container>
        <Nav />
      </Container>
    )
  }
}

export default PostScene
