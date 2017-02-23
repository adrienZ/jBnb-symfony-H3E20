// @flow
import React, { Component } from 'react'
import { Link } from 'react-router'
import { connect } from 'react-redux'
import styled from 'styled-components'

import logo from '../../assets/logo.png'
import * as colorActions from '../../actions/colorActions'

const Container = styled.nav`
  display: flex;
  flex-flow: row;
  border-bottom: 3px solid black;
  box-shadow: 0 2px 6px 0 rgba(0,0,0,0.34);
  background-color: white;
  width: 100vw;
`

const Logo = styled.div`
  display: flex;
  align-items: center;
`

const Logotype = styled.img`
  height: 3rem;
  margin-left: 3rem;
`
const Title = styled.h2`
  margin-left: .5rem;
  color : ${props => props.color}
`
const MenuList = styled.ul`
  display: flex;
  flex-flow: row;
  justify-content: space-between;
  max-width: 30rem;
  flex: 1;
  margin: auto;
`
const MenuItem = styled.li`
  text-decoration: none;
  list-style-type: none;
  :hover {
    color: ${props => props.hoverColor};
    cursor: pointer;
  }
`

class Nav extends Component {
  render() {
    const { color } = this.props.color
    return (
      <Container>
        <Logo>
          <Logotype src={logo} alt=""/>
          <Title color={color}>楽しいです</Title>
        </Logo>
        <MenuList>
          <MenuItem hoverColor={color}>
            <Link to="/" activeStyle={{ color, textDecoration: 'none' }}>Accueil</Link>
          </MenuItem>
          <MenuItem hoverColor={color}>
            <Link to="/result" activeStyle={{ color, textDecoration: 'none' }}>Result</Link>
          </MenuItem>
          <MenuItem hoverColor={color}>
            <Link to="" activeStyle={{ color, textDecoration: 'none' }}>Menu Item</Link>
          </MenuItem>
          <MenuItem hoverColor={color}>
            <Link to="" activeStyle={{ color, textDecoration: 'none' }}>Menu Item</Link>
          </MenuItem>
        </MenuList>
      </Container>
    )
  }
}

const mapStateToProps = ({ color }) => ({ color })
const mapDispatchToProps = { ...colorActions }

export default connect(mapStateToProps, mapDispatchToProps)(Nav)
