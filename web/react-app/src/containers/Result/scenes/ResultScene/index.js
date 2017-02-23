import React, { Component } from 'react'
import { connect } from 'react-redux'
import styled from 'styled-components'

import Nav from '../../../../components/Nav'
import Result from '../../../../components/Result'
import RegionSwitcher from '../../../../components/RegionSwitcher'
import PrefectureSwitcher from '../../../../components/PrefectureSwitcher'
import Toggler from '../../../../components/Toggler'
import background from '../../../../assets/background.jpg'
import * as colorActions from '../../../../actions/colorActions'
import data from './data.json'

const Container = styled.section`
  background-image: url(${props => props.background});
  background-repeat: repeat;
  min-height: 100vh;
`
const Filter = styled.div`
  display: flex;
  flex-flow: column;
  width: 13.0625rem;
  position: relative;
  background-color: white;
  border: 2px solid #FFFFFF;
  box-shadow: 2px 2px 7px 0 rgba(0,0,0,0.36);
  padding: 1rem;
`

const FilterSection = styled.h3`
  font-size: .875rem;
  position: relative;
  text-align: center;
  &::after {
    content: '';
    position: absolute;
    bottom: -1rem;
    left: 50%;
    transform: translateX(-50%);
    width: 10%;
    height: 2px;
    background-color: black;
  }
`

const Togglers = styled.div`
  display: flex;
  flex-flow: row wrap;
  justify-content: space-around;
  width: 80%;
  margin: auto;
`

const ResultsContainer = styled.div`
  display: flex;
  flex-flow: column;
`

const InlineContainer = styled.div`
  display: flex;
  flex-flow: row nowrap;
`

const SearchButton = styled.div`
  display: flex;
  flex-flow: row;
  justify-content: center;
  align-items: center;
  min-height: 2rem;
  background: white;
  border: 1px solid ${props => props.color};
  box-shadow: 0 2px 4px 0 rgba(0,0,0,0.19);
  border-radius: 5px;
  font-size: 1rem;
  color: ${props => props.color};
  letter-spacing: 0;
  transition: all .3s ease;
  cursor: pointer;
  margin-top: 1rem;
  &:hover {
    background-color: ${props => props.color};
    color: white;
  }
`
const Crementer = styled.div`
  display: flex;
  justify-content: center;
  align-content: center;
  border: 1px solid black;
  font-size: .875rem;
  color: black;
  letter-spacing: 0;
  border-radius: 50%;
  width: 1.5rem;
  height: 1.5rem;
  cursor: pointer;
  margin-right: .7rem;
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
        room: '',
        area: '',
        child: 0,
        adults: 0,
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

  changeRoom(index){
    this.setState(() => ({filters: {...this.state.filters, room: index}}))
  }

  changeArea(index){
    this.setState(() => ({filters: {...this.state.filters, area: index}}))
  }
  crementAdults(sign){
    console.log(sign);
    if (sign === '+') {
      this.setState(() => ({filters: {...this.state.filters, adults: this.state.filters.adults + 1}}))
    } else {
      this.setState(() => ({filters: {...this.state.filters, adults: this.state.filters.adults - 1}}))
    }
  }
  crementChild(sign){
    if (sign === '+') {
      this.setState(() => ({filters: {...this.state.filters, child: this.state.filters.child + 1}}))
    } else {
      this.setState(() => ({filters: {...this.state.filters, child: this.state.filters.child - 1}}))
    }
  }
  logForm() {
    const { room, area, region, child, adults } = this.state.filters
    const minPrice = this.minPrice.value
    const maxPrice = this.maxPrice.value
    console.table([
      {room: data.filters.rooms[room]},
      {area: data.filters.areas[area]},
      {region},
      {child},
      {adults},
      {minPrice},
      {maxPrice}
    ])
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
        <Filter>
          <FilterSection>Voyageurs</FilterSection>
          <InlineContainer>
            <Crementer onClick={() => this.crementAdults('-')}>-</Crementer>
            <Crementer onClick={() => this.crementAdults('+')}>+</Crementer>
            <div>{filters.adults} Adulte{filters.adults > 0 ? 's' : ''}</div>
          </InlineContainer>
          <InlineContainer>
            <Crementer onClick={() => this.crementChild('-')}>-</Crementer>
            <Crementer onClick={() => this.crementChild('+')}>+</Crementer>
            <div>{filters.child} Enfant{filters.child > 0 ? 's' : ''}</div>
          </InlineContainer>
          <FilterSection>Nombre de pièces</FilterSection>
          <Togglers>
            {data.filters.rooms.map((room, index) => (
              <Toggler
                key={index}
                index={index}
                color={color}
                value={filters.room === index ? 1 : 0}
                onClick={() => this.changeRoom(index)}
              >
                { room }
              </Toggler>
            ))}
          </Togglers>
          <FilterSection>Superficié m2</FilterSection>
          <Togglers>
          {data.filters.areas.map((area, index) => (
            <Toggler
              key={index}
              index={index}
              color={color}
              value={filters.area === index ? 1 : 0}
              onClick={() => this.changeArea(index)}
              >
                { area }
              </Toggler>
            ))}
          </Togglers>
          <FilterSection>Prix</FilterSection>
          <label htmlFor="min-price">Prix min:</label>
          <input type="number" step="100" defaultValue="30000" ref={(input) => { this.minPrice = input}} id="min-price"/>
          <label htmlFor="max-price">Prix max:</label>
          <input type="number" step="100" defaultValue="1000000" ref={(input) => { this.maxPrice = input}} id="max-price"/>
          <FilterSection>Region</FilterSection>
          <div>{filters.region.length === 0 ? 'Choisissez une région sur la carte' : filters.region }</div>
          <SearchButton color={color} onClick={() => this.logForm()}>Rechercher</SearchButton>
        </Filter>
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
