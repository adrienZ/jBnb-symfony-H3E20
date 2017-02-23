import React, { Component } from 'react'
import { connect } from 'react-redux'
import styled from 'styled-components'

import Nav from '../../../../components/Nav'
import Result from '../../../../components/Result'
import RegionSwitcher from '../../../../components/RegionSwitcher'
import PrefectureSwitcher from '../../../../components/PrefectureSwitcher'
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
      showMap: false,
      showPrefecture: false,
      filters: {
        region: '',
        prefectures: [0, 1, 2],
      }
    }
  }

  changeRegion(region){
    this.setState(({filters}) => ({filters: {...filters, region }}))
    this.hideMap()
  }
  addPrefecture(index){
    let prefectures = this.state.filters.prefectures
    prefectures.push(index)
    if (!this.state.filters.prefectures.includes(index)) {
      this.setState(({filters}) => (
        {filters: {
          ...filters,
          prefectures,
        }}
      ))
    }
    console.log(this.state.filters.prefectures);
  }
  removePrefecture(index){
    const prefectures = this.state.filters.prefectures.filter((i) => (i !== index))
    this.setState(({filters}) => ({filters: {...filters, prefectures }}))
  }

  showMap() {
    this.setState({showMap: true})
  }
  hideMap() {
    this.setState({showMap: false})
  }
  showPrefecture() {
    this.setState({showPrefecture: true})
  }
  hidePrefecture() {
    this.setState({showPrefecture: false})
  }
  render() {
    const { color } = this.props.color
    const { showMap, filters, showPrefecture } = this.state
    return (
      <Container background={background}>
        <Nav />
        {showMap && <RegionSwitcher color={color} onSelectRegion={(region) => this.changeRegion(region)}/>}
        {showPrefecture &&
          <PrefectureSwitcher
            color={color}
            prefectures={data.prefectures}
            activePrefecturesIndex={filters.prefectures}
            addPrefecture={(index) => this.addPrefecture(index)}
            removePrefecture={(index) => this.removePrefecture(index)}
          />
        }
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
        <div onClick={() => this.showMap()}>Region : { filters.region }</div>
        <div onClick={() => this.showPrefecture()}>
          Prefectures : { this.state.filters.prefectures.map((prefecture, index) => (
            <div key={index}>{prefecture}</div>
          )) }
        </div>
      </Container>
    )
  }
}

const mapStateToProps = ({ color }) => ({ color })
const mapDispatchToProps = { ...colorActions }

export default connect(mapStateToProps, mapDispatchToProps)(ResultScene)
