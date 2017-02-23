import React, { Component } from 'react'
import { connect } from 'react-redux'
import styled from 'styled-components'

import Nav from '../../../../components/Nav'
import Result from '../../../../components/Result'
import RegionSwitcher from '../../../../components/RegionSwitcher'
import background from '../../../../assets/background.jpg'
import * as colorActions from '../../../../actions/colorActions'
import data from './data.json'

const Container = styled.section`
  background-image: url(${props => props.background});
  background-repeat: repeat;
  min-height: 100vh;
`

const ResultsContainer = styled.div`
  display: flex;
  flex-flow: column;
`

class ResultScene extends Component {
  constructor(props) {
    super(props)
    this.state = {
      showModal: false,
      filters: {
        region: '',
      }
    }
  }

  changeRegion(region){
    this.setState(({filters}) => ({filters: {...filters, region }}))
    this.hideModal()
  }

  showModal() {
    this.setState({showModal: true})
  }
  hideModal() {
    this.setState({showModal: false})
  }
  render() {
    const { color } = this.props.color
    const { showModal, filters } = this.state
    return (
      <Container background={background}>
        <Nav />
        { showModal && <RegionSwitcher color={color} onSelectRegion={(region) => this.changeRegion(region)}/>}
        <ResultsContainer>
          {data.results.map((result, key) => (
            <Result
              key={key}
              size={result.size}
              state={result.state}
              prefecture={result.prefecture}
              price={result.price}
              owner={result.owner}
              rating={result.rating}
              raters={result.raters}
              image={result.images[0]}
              pp={result.pp}
              color={color}
            />
          ))}
        </ResultsContainer>
        <div onClick={() => this.showModal()}>Region : { filters.region }</div>
      </Container>
    )
  }
}

const mapStateToProps = ({ color }) => ({ color })
const mapDispatchToProps = { ...colorActions }

export default connect(mapStateToProps, mapDispatchToProps)(ResultScene)
