import React, { Component } from 'react'
import styled from 'styled-components'
import { connect } from 'react-redux'

import * as colorActions from '../../actions/colorActions'

const Container = styled.div`
display: flex;
`

const Color = styled.div`
  background: ${props => props.color};
  width: 1rem;
  height: 1rem;
  border-radius: .3125rem;
  margin: .2rem;
  border: ${props => props.activated ? '1px solid black' : ''}
`
const colors = ["#1B54FD", "#EDFF39", "#E40909", "#F83CB6"]

class Swatches extends Component {
  render(){
    return(
      <Container>
        { colors.map((color, key) => (
          <Color
            color={color}
            onClick={() => this.props.changeColor(color)}
            key={key}
            activated={color === this.props.color.color}
          />
        ))}
      </Container>
    )
  }
}

const mapStateToProps = ({ color }) => ({ color })
const mapDispatchToProps = { ...colorActions }

export default connect(mapStateToProps, mapDispatchToProps)(Swatches)
